@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Project')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Project overview</h4>
            <p class="card-category"> Basic information about the project</p>
          </div>
          <div class="card-body">
          <h2>Customer</h2>
          <form>
            <div class="form-group">
              <label for="customer_name">Customer name</label>
              <input type="text" class="form-control" id="customer_name" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="customer_email">Email address</label>
              <input type="email" class="form-control" id="customer_email" placeholder="Enter email">
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

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Table on Plain Background</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection