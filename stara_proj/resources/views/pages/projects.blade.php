@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Projects')])

@section('content')
<?php $project_data = json_decode($project_data); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Projects</h4>
            <p class="card-category">List of the latest projects</p>
          </div>
          <div class="card-body">
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Project name</th>
                  <th>Short description</th>
                  <th>Customer</th>
                  <th>Cost estimation</th>
                  <th>Status</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                @foreach ($project_data as $project)
                  <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="td-actions text-right">
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('project.edit', $project->id) }}" data-original-title="" title="">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                      </a>
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('project.view', $project->id) }}" data-original-title="" title="">
                        <i class="material-icons">content_paste</i>
                        <div class="ripple-container"></div>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection