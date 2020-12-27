@extends('slider.master')
{{-- @extends('layouts.app') --}}

@section('content')
    
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="imgae-upload-form">
                    <h4 style="padding:15px 0">Upload Your Slider image</h4>
                    {{-- <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data" id="dropzoneForm" class="dropzone">
                        @csrf                       
                       
                    </form> --}}
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Select Image</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data" id="dropzoneForm" class="dropzone">
                        @csrf
                      </form>
                      <div class="text-center" style="margin:10px 0;">
                        <button type="button" class="btn btn-info" id="submit-all">Upload</button>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Uploaded Image</h3>
                    </div>
                    <div class="panel-body" id="uploaded_image">
                       
                    </div>
                  
                  </div>
            </div>
            <div class="col-md-3"></div>
        </div>

@stop

@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script type="text/javascript">
  Dropzone.options.dropzoneForm = {
      autoProcessQueue: false,
      acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",

      init: function() {
          var submitButton = document.querySelector("#submit-all");
          myDropzone = this;

          submitButton.addEventListener('click', function() {
              myDropzone.processQueue();
          });

          this.on("complete", function() {
              if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                  var _this = this;
                  _this.removeAllFiles();
              }
              load_images();
          });

      }

  };

  load_images();

  function load_images() {
      $.ajax({
          url: "{{ route('image.fetch') }}",
          success: function(data) {
              $('#uploaded_image').html(data);
          }        
      })
  }

  $(document).on('click', '.remove_image', function() {
      var name = $(this).attr('id');
      $.ajax({
          url: "{{ route('image.delete') }}",
          data: { name: name },
          success: function(data) {
              load_images();
          }
      })
  });
</script>
@stop