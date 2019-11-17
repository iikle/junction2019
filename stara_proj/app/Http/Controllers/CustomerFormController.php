<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerFormController extends Controller
{
    /**
     * Show the form for editing the project.
     *
     * @return \Illuminate\View\View
     */
    // public function edit(Request $request, $id)
    // {
    //     $url = env("NODE_API") . 'project/'.$id;
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     $project_data = curl_exec($ch);
    //     curl_close($ch);
    //     if (!$project_data) {
    //         $project_data = "[]";
    //     }
    //     return view('project.edit', ['project_data' => $project_data]);
    // }

    /**
     * Show the form for editing the project.
     *
     * @return \Illuminate\View\View
     */
    // public function view($id)
    // {
    //     $url = env("NODE_API") . 'project/'.$id;
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     $project_data = curl_exec($ch);
    //     curl_close($ch);
    //     return view('project.view', ['project_data' => $project_data]);
    // }

    // public function index() {
    //     $url = env("NODE_API") . 'project';
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     $project_data = curl_exec($ch);
    //     curl_close($ch);
    //     return view('pages.projects', ['project_data' => $project_data]);
    // }

    /**
     * Update the project
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function update(Request $request)
    // {
    //     // auth()->user()->update($request->all());

    //     return back()->withStatus(__('Project successfully updated.'));
    // }

    /**
     * Update the project
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        // auth()->user()->update($request->all());

        return back()->withStatus(__('Project successfully updated.'));
    }
}
