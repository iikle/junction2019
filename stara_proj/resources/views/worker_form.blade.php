@extends('layouts.app', ['activePage' => 'worker_form', 'titlePage' => __('Worker form')])

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
              <h4 class="card-title ">Inventory</h4>
              <p class="card-category">List of own inventory items</p>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Item</th>
                  <th>Code</th>
                  <th>Amount</th>
                  <th>Actions</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Lightbulb</td>
                    <td>ABDF324324</td>
                    <td>4</td>
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
                  <tr>
                    <td>
                      <input type="text" value="" class="form-control" placeholder="Item...">
                    </td>
                    <td>
                      <input type="text" value="" class="form-control" placeholder="Code...">
                    </td>
                    <td>
                      <input type="text" value="" class="form-control" placeholder="Amount...">
                    </td>
                    <td class="td-actions text-right">
                      <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                        <i class="material-icons">add</i>
                        <div class="ripple-container"></div>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Tasks on the map</h4>
              <p class="category"></p>
            </div>
            <div class="card-body">
              <iframe width="500" height="400" style="border:0; width:500px !important; height:400px !important;" frameborder="0" src="https://kartta.hel.fi/embed.aspx?&minimap=1&legend=1&maptools=1&maplink=1&e=25497337.73&n=6672726.47&r=2&setlanguage=fi&w=**&l=Karttasarja%2Crakennukset_sql%2CKioskit&o=100%2C100%2C100&swtab=kaikki"></iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title ">Tasks</h4>
              <p class="card-category"></p>
            </div>
            @include('layouts.modals.modify_task')
            <div class="card-body">
              <div class="card-body table-responsive">
              <table class="table table-hover">
                  <thead class="text-warning">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th class="text-right">Actions</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Fix light</td>
                      <td>Fix the light already</td>
                      <td>Espoo</td>
                      <td class="td-actions text-right">
                        <button class="btn btn-primary btn-success" type="button" data-toggle="modal" data-target="#modify_task_modal">
                          <i class="material-icons">done</i>
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

      <!-- <div class="row">
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
                    <th class="text-right">Actions</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Irina</td>
                      <td>+358408538672</td>
                      <td></td>
                      <td>Director</td>
                      <td>
                     
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
      </div> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection