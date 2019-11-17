<div class="modal fade" id="image_show_modal{{ $attachment['id'] }}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">{{ $attachment['name']}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 mr-auto">
              
                <div class="card-body text-center">
                 <img src="{{ $attachment['webPath'] }}" style="max-width: 100%; max-height: 400px; height: auto; width: auto;" />
                </div>
              <div class="modal-footer justify-content-center">
              <button type="button" data-toggle="modal" data-target="#image_show_modal{{ $attachment['id'] }}" class="btn btn-primary btn-success">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>