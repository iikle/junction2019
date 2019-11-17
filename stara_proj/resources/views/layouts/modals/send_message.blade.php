<div class="modal fade" id="send_message_modal" tabindex="-1" role="dialog">

<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Send message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mr-auto">
            <div class="form-check">
              <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="" checked>
                  <span class="form-check-sign">
                      <span class="check"></span>
                  </span>
                  Text message
              </label>
              <label class="form-check-label">
                  <input class="form-check-input" type="checkbox" value="">
                  <span class="form-check-sign">
                      <span class="check"></span>
                  </span>
                  Email
              </label>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-md-12 mr-auto">
              <div class="card-body text-center">
                <textarea data-mesg="1" class="form-control" placeholder="Enter message..." rows="3"></textarea>
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" data-send-message="1" class="btn btn-primary btn-success">Send</button>
                <button type="button" data-toggle="modal" data-target="#send_message_modal" class="btn btn-primary">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('button[data-send-message]').on('click', function() {
    $.post({
      url: "{{ route('send_message') }}",
      data: {
        to: '+358408538672',
        message: $('[data-mesg]').val(),
        from: 'Manager'
      },
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      }
    })
    .done(function(data) {
      if (!data.error) {
        $('#send_message_modal').modal('hide');
      } else {
        alert(data.error);
      }
    })
  })
})
</script>