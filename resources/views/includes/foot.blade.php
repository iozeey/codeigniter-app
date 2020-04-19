
<script type = "text/javascript"
        src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

{!! Html::script('salientMenu/js/prettyPhoto.js') !!}
{!! Html::script('salientMenu/js/isotope.min.js') !!}
{!! Html::script('salientMenu/js/superfish.js') !!}
{!! Html::script('salientMenu/js/init.js') !!}
{!! Html::script('salientMenu/js/ajaxify.js') !!}

{!! Html::script('js/vendor/bootstrap.js') !!}
{!! Html::script('js/vendor/bootstrapValidator.js') !!}
{!! Html::script('js/vendor/hideShowPassword.min.js') !!}

{!! Html::script('js/jquery.flexslider-min.js') !!}
{!! Html::script('js/jquery.bgswitcher.js') !!}
{!! Html::script('js/socialLogin.js') !!}



@include('includes.modals')

<script>

    var  width = $('#registerFormBtn').width();
    var  height = $('#registerFormBtn').height();

    function pulse() {
        $('#registerFormBtn').animate({
            width:  width, height:height,
            opacity: 0.5
        }, 700, function() {
            $('#registerFormBtn').animate({
                width:  width+30, height:  height+20,
                opacity: 1
            }, 700, function() {
                pulse();
            });
        });
    };

    var btn_getMine = $('#registerFormBtn').val();

//    $('#registerFormBtn').addClass('childTransparentImage',function(){
//        $('#registerFormBtn').val('');
//    });

    var pw = '{{ $pw or 'undefined'}}';
    var pw_bool = false;

    $(document).ready(function () {

        $( "#registerForm").submit(function( event ) {

            $('#password').hideShowPassword(false);

            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serializeArray(),
                beforeSend: function () {
                    $('#childTransparent').addClass('child');
                    $(".parent :input").attr("disabled", true);
                    $('#registerFormBtn').val('Processing...');
                   // pulse();
                },
                complete: function () {
                    $('#childTransparent').removeClass('child');
                    $(".parent :input").attr("disabled", false);
                    $(".parent :input").removeAttr("disabled", false);
                    $('#registerFormBtn').val(btn_getMine);
                },
                success: function (data) {
                    json = jQuery.parseJSON(data);
                    $('#registerFormBtn').val(btn_getMine);
                    window.location.href = json.redirectToPath;
                },
                error: function(data){

                    $(this).val(btn_getMine);

                    var errors = data.responseJSON;
                    console.log(errors);

                    errorsHtml = '<div class="alert alert-danger"><ul>';

                    $.each( errors, function( key, value ) {
                        if(value != 'undefined')
                            errorsHtml += '<li>' + value + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul></di>';

                    $( '.errors' ).html( errorsHtml );
                }
            }); //ends ajax call*/

            event.preventDefault(); //STOP default action
          //  event.unbind(); //unbind. to stop multiple form submit.
        });

        $('#password').hideShowPassword(true);

        $('#show-password').on('click', function () {
            if (pw_bool == true) {
                $('#password').hideShowPassword(true);
                $(this).children().removeClass('icon-eye-open glyphicon glyphicon-eye-open').addClass('icon-eye-open glyphicon glyphicon-eye-close');
                pw_bool = false;
            }
            else {
                $('#password').hideShowPassword(false);
                $(this).children().removeClass('icon-eye-open glyphicon glyphicon-eye-close').addClass('icon-eye-open glyphicon glyphicon-eye-open');
                pw_bool = true;
            }
        });

        randomPasswordString(pw); // first time setting password

        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 160,
            itemMargin: 5,
            controlNav: true,
            directionNav: false
        });

        $('#pulse').on('click', function (e) {
            $('#heartBox').slideDown();
        });

        $('#loginForm, #signupform').bootstrapValidator();
    })

    function randomString() {
        // var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
        //  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var chars = "0123456789100000";
        var string_length = 6;
        var randomstring = '';
        for (var i = 0; i < string_length; i++) {
            var rnum = Math.floor(Math.random() * chars.length);
            randomstring += chars.substring(rnum, rnum + 1);
        }
        registerForm.fan_tag.value = randomstring;
    }

    function randomPasswordString(pw) {

        var randomstring = (typeof pw !== 'undefined') ? (pw) : (null);
        if (randomstring !== null) {
            pw = randomstring;
        }
        else {
            randomstring = '';
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>1234567890";
            var string_length = 6;

            for (var i = 0; i < string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum, rnum + 1);
            }
            pw = randomstring;
        }
        pw = randomstring;
        $('#password').val(pw);
    }
</script>


