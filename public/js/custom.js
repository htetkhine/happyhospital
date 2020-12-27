jQuery(function($) {

    var homeslide = new Swiper('.home-slide', {
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $('.stellarnav').stellarNav({
        theme: 'plain',
        breakpoint: 767,
        position: 'right',
        menuLabel: '',
    });

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
});


var btn = document.querySelector('button[type="submit"]');
var form = document.forms[0];
var email = document.querySelector('[name="email"]');
var password = document.querySelector('[name="password"]');
btn.addEventListener('click', function(ev) {
    if (form.checkValidity()) {
        btn.querySelector('.signingin').className = 'signingin';
        btn.querySelector('.signin').className = 'signin hidden';
    } else {
        ev.preventDefault();
    }
});
email.focus();
document.getElementById('emailGroup').classList.add("focused");

// Focus events for email and password fields
email.addEventListener('focusin', function(e) {
    document.getElementById('emailGroup').classList.add("focused");
});
email.addEventListener('focusout', function(e) {
    document.getElementById('emailGroup').classList.remove("focused");
});

password.addEventListener('focusin', function(e) {
    document.getElementById('passwordGroup').classList.add("focused");
});
password.addEventListener('focusout', function(e) {
    document.getElementById('passwordGroup').classList.remove("focused");
});