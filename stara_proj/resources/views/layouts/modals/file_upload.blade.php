<div class="modal fade" id="image_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card card-signup card-plain">
        <div class="modal-header">
          <h5 class="modal-title card-title">Upload image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 mr-auto">
              <form class="form" method="post" action="">
                <div class="card-body">
                  <div class="form-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose image</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Description...">
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-center">
                <button type="button" data-toggle="modal" data-target="#image_modal" class="btn btn-primary btn-success">Upload</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>