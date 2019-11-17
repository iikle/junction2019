
<?php $project_data = json_decode($project_data, true) ? json_decode($project_data, true)[0] : array(); ?>
<?php $attachments = json_decode($attachments, true); ?>
@extends('layouts.app', ['activePage' => 'project', 'titlePage' => $project_data['title']])

@section('content')
@include('layouts.modals.file_upload')
<style>
  input, label {
  margin: 5px 5px;
}
#inputStreet {
  width: 100%;
}

#inputCity {
  width: 50%;
}

#inputZip {
  width: 28%;
}

</style>
<div class="content">
  <div class="container-fluid">
    <form method="post" action="{{ route('project.update') }}" autocomplete="off" class="form-horizontal">
    @csrf
    @method('put')
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Customer</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="customer_name">Customer name</label>
                <input type="text" class="form-control" id="customer_name" placeholder="Enter name" value="Junction">
              </div>
              <div class="form-group">
                <label for="customer_email">Email address</label>
                <input type="email" class="form-control" id="customer_email" placeholder="Enter email" value="junction@j.com">
              </div>
              <div class="form-group">
                <input type="street" 
                      class="form-control" 
                      id="autocomplete" 
                      placeholder="Street" value="{{ $project_data['address'] }}">
                
                <input type="city" 
                      class="form-control" 
                      id="inputCity" 
                      placeholder="City" value="{{ $project_data['city'] }}">
                
                <input type="zip" 
                      class="form-control" 
                      id="inputZip" 
                      placeholder="Zip" value="{{ $project_data['postal'] }}">
              </div>
              <div class="form-check">
                  <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value="">
                      Option one is this
                      <span class="form-check-sign">
                          <span class="check"></span>
                      </span>
                  </label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title ">Request</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <p>{{ $project_data["description"] }}</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Attachments</h4>
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#images" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Images
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#plans" data-toggle="tab">
                        <i class="material-icons">code</i> Plans
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#documents" data-toggle="tab">
                        <i class="material-icons">cloud</i> Documents
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="images">
                  <div class="input-group no-border">
                    <!-- <i class="material-icons">add</i> 
                    <a href="">Add image...</a> -->
                    <button type="button" class="btn" data-toggle="modal" data-target="#image_modal">
                      <i class="material-icons">add</i> Add image...
                    <div class="ripple-container"></div></button>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th class="td-actions text-right">Actions</th>
                      </thead>
                      <tbody>
                      @foreach ($attachments as $attachment)
                        <tr>
                          <td>{{ $attachment['id'] }}</td>
                          <td>{{ $attachment['name'] }}</td>
                          <td>
                            <img src="{{ $attachment['webPath'] }}" style="max-width: 100px; max-height: 100px; height: auto; width: auto;"/>
                          </td>
                          <td class="td-actions text-right">
                          
                            @include('layouts.modals.image')
                            <button class="btn btn-primary btn-success" type="button" data-toggle="modal" data-target="#image_show_modal{{ $attachment['id'] }}">
                              <i class="material-icons">zoom_in</i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="plans">
                  <div class="input-group no-border">
                    <i class="material-icons">add</i> 
                    <a href="">Add plan...</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @if (array_key_exists('attachments', $project_data))
                        @foreach ($project_data['attachments'] as $attachment)
                          <tr>
                            <td>{{ $attachment->id }}</td>
                            <td>{{ $attachment->title }}</td>
                            <td>{{ $attachment->description }}</td>
                            <td></td>
                            <td class="td-actions text-right">
                              <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                              <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                                <i class="material-icons">zoom_in</i>
                                <div class="ripple-container"></div>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane" id="documents">
                  <div class="input-group no-border">
                    <i class="material-icons">add</i> 
                    <a href="">Add document...</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                      </thead>
                      <tbody>
                      @if (array_key_exists('attachments', $project_data))
                        @foreach ($project_data['attachments'] as $attachment)
                          <tr>
                            <td>{{ $attachment->id }}</td>
                            <td>{{ $attachment->title }}</td>
                            <td>{{ $attachment->description }}</td>
                            <td></td>
                            <td class="td-actions text-right">
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('project.edit') }}/{{ $project->id }}/edit" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('project.view') }}/{{ $project->id }}" data-original-title="" title="">
                                <i class="material-icons">zoom_in</i>
                                <div class="ripple-container"></div>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Activity</h4>
              <p class="category">Latest activity on the project</p>
            </div>
            <div class="card-body">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>User</th>
                  </thead>
                  <tbody>
                  @if (array_key_exists('activity', $project_data))
                    @foreach ($project_data['activity'] as $message)
                      <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->title }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->user }}</td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          @include('layouts.modals.send_message')
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title">Contact persons</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th class="text-right">Actions</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Irina</td>
                      <td>+358408538672</td>
                      <td></td>
                      <td>Director</td>
                      <td>
                        {{ $project_data['address'] }}
                      </td>
                      <td class="td-actions text-right">
                        <button class="btn btn-primary btn-success" type="button" data-toggle="modal" data-target="#send_message_modal">
                          <i class="material-icons">email</i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection