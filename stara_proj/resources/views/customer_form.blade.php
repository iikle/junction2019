@extends('layouts.app', ['activePage' => 'customer_form', 'titlePage' => __('Customer form')])

@section('content')
@include('layouts.modals.file_upload')
<div class="content">
  <div class="container-fluid">
    <form method="post" action="{{ route('customer_form.save') }}" autocomplete="off" class="form-horizontal">
    @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Basic information</h4>
              <p class="card-category">Customer information</p>
            </div>
            <div class="card-body">
              <div class="form-group">
                <input type="text" class="form-control" id="customer_name" placeholder="Enter name">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="customer_email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <input type="street" 
                      class="form-control" 
                      id="autocomplete" 
                      placeholder="Street">
                
                <input type="city" 
                      class="form-control" 
                      id="inputCity" 
                      placeholder="City">
                
                <input type="zip" 
                      class="form-control" 
                      id="inputZip" 
                      placeholder="Zip">
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Property details</h4>
              <p class="category">Get the property ID from the map</p>
            </div>
            <div class="card-body">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="button" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
              <iframe width="500" height="400" style="border:0; width:500px !important; height:400px !important;" frameborder="0" src="https://kartta.hel.fi/embed.aspx?&minimap=1&legend=1&maptools=1&maplink=1&e=25497337.73&n=6672726.47&r=2&setlanguage=fi&w=**&l=Karttasarja%2Crakennukset_sql%2CKioskit&o=100%2C100%2C100&swtab=kaikki"></iframe>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title ">Request</h4>
              <p class="card-category">Describe the issue in as much detail as possible</p>
            </div>
            <div class="card-body">
              <div class="form-group">
                <textarea class="form-control" rows=10 placeholder="Request details..."></textarea>
              </div>
            </div>
          </div>
        </div>
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
                </div>
                <div class="tab-pane" id="plans">
                  <div class="input-group no-border">
                    <i class="material-icons">add</i> 
                    <a href="">Add plan...</a>
                  </div>
                </div>
                <div class="tab-pane" id="documents">
                  <div class="input-group no-border">
                    <i class="material-icons">add</i> 
                    <a href="">Add document...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title ">Contact persons</h4>
              <p class="card-category"></p>
            </div>
            <div class="card-body">
              <div class="card-body table-responsive">
                <table class="table table-hover">
                  <thead class="text-warning">
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Actions</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <input type="text" value="" class="form-control" placeholder="Name...">
                      </td>
                      <td>
                        <input type="text" value="" class="form-control" placeholder="Phone number...">
                      </td>
                      <td>
                        <input type="text" value="" class="form-control" placeholder="Email...">
                      </td>
                      <td>
                        <input type="text" value="" class="form-control" placeholder="Job title...">
                      </td>
                      <td>
                        <input type="text" value="" class="form-control" placeholder="Address...">
                      </td>
                      <td class="td-actions text-right">
                        <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                          <i class="material-icons">add</i>
                          <div class="ripple-container"></div>
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-link" href="" data-original-title="" title="">
                          <i class="material-icons">delete</i>
                          <div class="ripple-container"></div>
                        </a>
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