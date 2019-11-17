<div class="modal fade" id="modify_task_modal" tabindex="-1" role="dialog">

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Modify task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 mr-auto">
              
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mr-auto">
              <div class="card-body text-center">
                <textarea data-mesg="1" class="form-control" placeholder="Enter message..." rows="3"></textarea>
              </div>
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
              <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    Completed
                </label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mr-auto">
              <div class="modal-footer justify-content-center">
                <button type="button" data-send-message="1" class="btn btn-primary btn-success">Send</button>
                <button type="button" data-toggle="modal" data-target="#modify_task_modal" class="btn btn-primary">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// $(document).ready(function() {
//   $('button[data-send-message]').on('click', function() {
//     $.post({
//       url: "{{ route('send_message') }}",
//       data: {
//         to: '+358408538672',
//         message: $('[data-mesg]').val(),
//         from: 'Manager'
//       },
//       headers: {
//         'X-CSRF-TOKEN': "{{ csrf_token() }}"
//       }
//     })
//     .done(function(data) {
//       if (!data.error) {
//         $('#modify_task_modal').modal('hide');
//       } else {
//         alert(data.error);
//       }
//     })
//   })
// })
</script>