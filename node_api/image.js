const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 9001;
const path = require('path');
const formidable = require('formidable');
const bodyParser =	require("body-parser");
const jimp = require("jimp");
const webHost = "http://example.com:9000";
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

const pool  = mysql.createPool({
  connectionLimit : 1,
  host            : '',
  user            : '',
  password        : '',
  database        : ''
});

app.get('/', (req, res) => res.sendFile(path.join(__dirname, 'image.html')));
app.post('/upload', (req, res) => {
    let uploadPath = "";
    let fileName = "";
    var form = new formidable.IncomingForm();
    form.on('fileBegin', function (name, file){
        file.path = __dirname + '/uploads/' + file.name;
    });

    form.on('file', function (name, file){
        console.log('Uploaded ' + file.name);
        uploadPath = file.path;
        fileName = file.name;
    });
    form.on('progress', function(bytesReceived, bytesExpected) {
        console.log("progress", bytesReceived,"/",bytesExpected);
    });
    form.on('aborted', function() {
        console.log("aborted");
    });
    form.on('error', function(err) {
        console.log("error");
        console.log(err);
    });
    form.on("end", () => {
        res.redirect("/");
        // TODO: Memory leak
        jimp.read(uploadPath, (err, image) => {
            if (err) { console.log(err); return; }
            image.scaleToFit(600, 600)
            .quality(60)
            .write(uploadPath);
        });

    });
    form.parse(req, (err, fields, files) => {
        if (err) {
            console.error('Error', err)
            throw err
        }
        console.log('fields', fields);
        const id = fields && fields.id ? fields.id : 0;
        console.log("id", id, "path", uploadPath);
        if (!id || !uploadPath) {
            return;
        }

        pool.query("INSERT INTO attachment (path, name) VALUES(?, ?)", [uploadPath, fileName], function(err, results) {
            if (err) { return console.log(err); }
            let attachmentId = results && results.insertId ? results.insertId : false;
            console.log(attachmentId);
            console.log(results);
            if (!attachmentId) { console.log("No attachment id"); return; }
            pool.query("INSERT INTO project_attachment (projectId, attachmentId) VALUES(?, ?)", [id, attachmentId], (err) => {
                if (err) {
                    console.log("project attachment error");
                    console.log(err);
                }
            });
            let webPath = webHost + "/attachment/" + attachmentId;
            console.log({attachmentId, webPath});
            pool.query("UPDATE attachment SET webPath = ? WHERE id = ?", [webPath, attachmentId], (err) => {
                if (err) {
                    console.log(err);
                }
            });
        });
    });
});

app.listen(port, () => console.log(`Image app listening on port ${port}!`));