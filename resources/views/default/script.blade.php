<script src="{{ asset('js/app.js') }}" defer></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>

<!-- bootstrap file-->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{url('https://unpkg.com/swiper/swiper-bundle.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/stellarnav.min.js') }}"></script>
     
 <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/fontawesome.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

 
 
 {{-- <script type="text/javascript">
     $('#file-1').fileinput([
         theme:'fa',
         uploadExtraData:function() {
             return{
                 _token:$("input[name='_token']").val()
             };
         },
         allowedFileExtensions:['jpg','png','gif'],
         overwriteInitial:false,
         maxFileSize:2000,
         maxFileNum:8,
         slugCallback:function (filename) {
             return filename.replace('(','_').replace(']','_'));
         }
     ])
 
 </script> --}}
 
