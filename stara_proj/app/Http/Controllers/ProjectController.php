<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProjectController extends Controller
{
    /**
     * Show the form for editing the project.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        // main project data
        $url = env("NODE_API") . 'project/'.$id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $project_data = curl_exec($ch);
        curl_close($ch);
        if (!$project_data) {
            $project_data = "[]";
        }

        // project attachments
        $attachment_url = env("NODE_API") . 'project/'.$id.'/attachment';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $attachment_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $attachments = curl_exec($ch);
        curl_close($ch);
        if (!$attachments) {
            $attachments = "[]";
        }
        return view('project.edit', ['project_data' => $project_data, 'attachments' => $attachments]);
    }

    /**
     * Show the form for editing the project.
     *
     * @return \Illuminate\View\View
     */
    public function view($id)
    {
        $url = env("NODE_API") . 'project/'.$id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $project_data = curl_exec($ch);
        curl_close($ch);
        return view('project.view', ['project_data' => $project_data]);
    }

    public function index() {
        $url = env("NODE_API") . 'project';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $project_data = curl_exec($ch);
        curl_close($ch);
        return view('pages.projects', ['project_data' => $project_data]);
    }

    /**
     * Update the project
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // auth()->user()->update($request->all());

        return back()->withStatus(__('Project successfully updated.'));
    }

    public function send_message(Request $request) {
        $to = $request->get('to');
        $from = $request->get('from');
        $message = $request->get('message');
        if (!$message || !$to || !$from) {
            return response()
            ->json(['error' => 'Data is missing']);
        }

        // sends the message to the user
        $mesg_url = env('SMS_API', null);
        $mesg_user = env('SMS_USER', null);
        $mesg_pass = env('SMS_PASS', null);

        if (!$mesg_url || !$mesg_user ||!$mesg_pass) {
            return response()
            ->json(['error' => 'Config data is missing']);
        }
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $mesg_url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['from' => $from, 'to' => $to, 'message' => $message]));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'Authorization: Basic '.base64_encode($mesg_user.':'.$mesg_pass),
        //     'Content-Type: application/x-www-form-urlencoded'
        // ]);
        // $response_data = curl_exec($ch);
        // $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close($ch);
        $m = array(
            'from' => $from, 'to' => $to, 'message' => $message
        );
        $mesg = $this->sendSMS($m);
        return response()
            ->json(['success' => $mesg]);
    }

    private function sendSMS ($sms) {
        $mesg_url = env('SMS_API', null);
        $username = env('SMS_USER', null);
        $password = env('SMS_PASS', null);
        $context = stream_context_create(array(
          'http' => array(
            'method' => 'POST',
            'header'  => 'Authorization: Basic '.
                        base64_encode($username.':'.$password). "\r\n".
                        "Content-type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($sms),
            'timeout' => 10
        )));
        $response = file_get_contents($mesg_url,
          false, $context);
      
        if (!strstr($http_response_header[0],"200 OK"))
          return $http_response_header[0];
        return $response;
    }
}
