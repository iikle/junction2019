const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 9000;

const pool  = mysql.createPool({
  connectionLimit : 10,
  host            : '',
  user            : '',
  password        : '',
  database        : ''
});

app.get("/project/:projectId/attachment", (req, res) => {
    let query = `SELECT attachment.id, attachment.name, attachment.webPath FROM project_attachment
    LEFT JOIN attachment ON attachment.id = project_attachment.attachmentId
    WHERE projectId = ? AND webPath != ""`;
    pool.query(query, [req.params.projectId], (err, results) => {
        if (!results) {
            results = [];
        }
        res.send(results);
    });
});

app.get("/attachment/:id", (req, res) => {
    pool.query("SELECT path FROM attachment WHERE id = ?", [req.params.id], (err, results) => {
        let path = results && results[0] ? results[0].path : "";
        if (!path) {
            return res.send("No file found");
        }
        res.sendFile(path);
    });
});

// just for poc, such vulnerability
app.get('/:table/:id?', (req, res) => {
    let table = req.params.table;
    table = table ? table.replace(/[^A-z]/g,"") : "";
    if (!table) { return res.send("Invalid table"); }
    let id = req.params.id;
    id = id && parseInt(id) ? parseInt(id) : 0;
    let query = `SELECT * FROM \`${table}\``;
    if (id) {
        query += " WHERE id = " + id;
    } 
    pool.query(query, (err, results) => {
        if (err) {
            console.log(err);
            res.send(err)
            return;
        }
        if (!results) {
            results = [];
        }
        res.send(results);
    })
});

app.listen(port, () => console.log(`Stara app listening on port ${port}!`));