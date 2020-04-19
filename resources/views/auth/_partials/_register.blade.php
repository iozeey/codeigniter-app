<style>
    input[type="text"]{
        color: #c7d1cb ;
    }

    div.parent {
        position: relative;
    }

    /* this div is a descendent of the div above */
    div.child {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        opacity: .6;
        background: #fff;
    }

    .heartBtn
    {
        /*background-image: url("images/heart.gif");*/
        background-image: url("images/heart-line.gif");
        background-size:cover;
        /*background-repeat: no-repeat;*/
        /*border: none;*/
    }

    .childTransparentImage
    {
        /*background-image: url("images/heart.gif");*/
        background-image: url("images/heart-line.gif");
        background-size:contain;
        align-content: center;
        /*background-size:cover;*/
        background-repeat: no-repeat;
        /*border: none;*/
        opacity: .8;
        border-radius:5px ;
        /*width:500px;*/
        height:50px;
        margin:0; /* If you want no margin */
        padding:0; /*if your want to padding */

        /*position: absolute;*/
        /*top: 50%;*/
        /*left: 0;*/
        /*right: 0;*/
        /*bottom: 0;*/
/*vertical-align: 50%;*/
        z-index: 10;
        background-repeat: no-repeat;
        background-size: contain;
    }

</style>
<div class="parent">
    {!! Form::open(array('route' => 'sign-up','name'=>'loginform','id'=>'registerForm')) !!}

    {{--<input name="_method" value="PUT/PATCH"  type="hidden">--}}
    <input type="hidden" name="token" value="{{ csrf_token() }}">

    <div class="form-group">
    {!! Form::label('fan_tag', 'Fan Tag') !!}
    <div class="input-group">
        <a href="#" onClick="randomString();" title="Get a Fan Tag" class="input-group-addon"><i
                    class="glyphicon glyphicon-hand-up"></i></a>

        {!! Form::text('fan_tag', $fan_tag, array('class' => 'form-control', 'placeholder'=>'Fan Tag',
        'data-bv-trigger'=>'keyup','data-bv-notempty-message'=>'Fan Tag is required'))
        !!}
    </div>
    <p id="fanTag" class="text-muted text-small-register-help">Pick a Tag or don't and keep the
        auto-assigned Tag#.</p>
</div>
    <div class="form-group">

        {!! Form::label('email', 'Email') !!}
        <div class="input-group">
            <a href="#" title="Email Address" class="input-group-addon"><i
                        class="glyphicon glyphicon-envelope"></i></a>
            {!! Form::email('email', null, array('class' => 'form-control', 'placeholder'=>'Enter Your Email',
            'data-bv-trigger'=>'keyup', 'data-bv-notempty-message'=>'Email is required'))
            !!}
        </div>
        <p id="emailBox" class="text-muted text-small-register-help" style=" ">
            Our system always lets you through unless you enter an e-mail that does not have an @
            symbol or domain. You must make sure to enter your correct email. As, unless you update
            your profile with a text-able phone number, this is the only way we have to verify you
            so that you can make changes to your account.
        </p>
    </div>
    <div class="form-group passgroup">
        {!! Form::label('pw', 'PW') !!}


        <figure>

                <div class="input-group">

                    <a href="#" id="pw_generator" onClick="randomPasswordString();" title="Generate Password"
                       class="input-group-addon"><i class="glyphicon glyphicon-lock"></i>
                    </a>

                        {!! Form::password('password', array('id'=>'password', 'class' => 'ab login-field  login-field-password form-control col-xs-3', 'placeholder'=>'Enter Your Password',
                        'data-toggle'=>"password",'data-bv-trigger'=>'keyup','data-bv-notempty-message'=>'Password is required',
                        'data-message'=>'Show/Hide Password')) !!}


                       <span class = "input-group-addon">
                        <a  id="show-password">
                            <i class="icon-eye-open glyphicon glyphicon-eye-open"></i>
                        </a>
                    </span>

            </div>
            <div class="login-footer">

            </div>
        </figure>

        <p id="pwBox" class="text-muted text-small-register-help">Pick a Password or don't and keep the
            auto-assigned
            Password.</p>
    {{--//, 'required'--}}
    </div>
    <div class="form-group">
        {!! Form::submit('Get Mine!', array('id'=>'registerFormBtn' ,'class' => 'btn btn-lg btn-primary btn-block')) !!}
        <p id="pwBox" class="help-block text-small-register-help"> By clicking the "Get Mine!" button
            you agree to our
            {!! Html::linkAction('AboutController@getTOS', 'Terms of Service') !!}.
        </p>
    </div>

    <div class="heartBtn" id="childTransparent">
    </div>

    {!! Form::close() !!}
</div>
