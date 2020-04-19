<!DOCTYPE html>

<html>

<head>

    @include('includes.head')

    {{--@include('includes.menus.headerMenuBar',['isIncludeRightMenuBar'=>false,'isIncludeAffix'=>false])--}}

</head>

<body class="page-login bg-image1" style="min-height:800px;margin-top:10% ">

@include('includes.menus.salientMenu',['isIncludeRightMenuBar'=>false,'isIncludeAffix'=>false,'isIncludeHeaderMenuBar'=>false])

<div class="container min-height">

    <div class="row">

        <div class="col-sm-5 ">

            <div class="errors">
                @include('partials._flash')
                @include('partials._flash',['key'=>Config::get('appKeys.validation')])
                @include('partials._flash',['key'=>Config::get('appKeys.postRegister')])
                @include('partials._flash',['key'=>Config::get('appKeys.passwordReset')])


            </div>
            @if(!is_null($signInDisplay))

                <div id="loginbox" class="panel panel-primary" style="display: {{$signInDisplay}};">
                    <div class="panel-heading">
                        <div class="panel-title"><b>
                            Log In </b>
                            {!! HTML::link('sign-up', 'Register Here',['class'=>'btn pull-right'])!!}
                        </div>
                    </div>
                    <div class="panel-body">

                        @include('auth._partials._signIn')

                    </div>
                    <div class="panel-footer">
                        <div class="container">
                            @include('includes.menus.socialMenuBar')
                        </div>
                    </div>
                </div>

            @elseif(!is_null($signUpDisplay))

                <div id="signupbox" class="panel panel-primary" style="display: {{$signUpDisplay}};">
                    <div class="panel-heading">
                        <div class="panel-title"><b>Register
                            {{--<a id="signinlink" href="#" class="pull-right"--}}
                            {{--onclick="$('#signupbox').hide(); $('#loginbox').show();  $('#state').val('signIn'); ">Sign--}}
                            {{--In</a>--}}
                            </b>
                            {!! HTML::link('sign-in', 'Sign In',['class'=>'btn pull-right'])!!}
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('auth._partials._register',['$an_tag'=>$fan_tag,'pw'=>$pw])
                    </div>
                    <div class="panel-footer">
                        <div class="container">
                            @include('includes.menus.socialMenuBar')
                        </div>
                    </div>
                </div>

            @elseif(!is_null($resetPasswordDisplay))


                <div id="signupbox" class="panel panel-primary" style="display: {{$signUpDisplay}};">
                    <div class="panel-heading">
                        <div class="panel-title"><b>Enter Security Code</b>
                            {{--<a id="signinlink" href="#" class="pull-right"--}}
                            {{--onclick="$('#signupbox').hide(); $('#loginbox').show();  $('#state').val('signIn'); ">Sign--}}
                            {{--In</a>--}}

                            {{--{!! HTML::link('sign-in', 'Sign In',['class'=>'btn pull-right'])!!}--}}
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('auth._partials._resetPassword',['email'=>$email])
                    </div>
                    <div class="panel-footer">
                        <div class="container">
                            {{--@include('includes.menus.socialMenuBar')--}}
                            {!! HTML::link('sign-in', 'Didn\'t get a code?',['class'=>'link'])!!}
                        </div>
                    </div>
                </div>

            @endif


        </div>

        <div class="col-sm-6 pull-right right">
            <div class="pull-right login-page-right-side">
                <h1 class="login-page-right-side-heading">{!!
                    Config::get('labelDescription.login_page.right_side_content.title')!!}</h1>

                <p class="login-page-right-side-detail ">{!!
                    Config::get('labelDescription.login_page.right_side_content.description')!!}</p>
            </div>
        </div>
        <div class="clearfix"></div>

    </div>
    <!-- /row -->
</div>
<!-- /container -->
<footer>
    @include('includes.footer')
</footer>
@include('includes.foot')

<script>
    $(document).ready(function () {
        $('input[type="text"]').focus(function () {
            $(this).css('color', '#000');
        });
    });
</script>

</body>

</html>


