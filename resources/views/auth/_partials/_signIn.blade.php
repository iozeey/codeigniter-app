<style>
    .reset-password-link{
        font-size:small;
    }
</style>
{!! Form::open(array('route' => 'sign-in','name'=>'loginform')) !!}
<div class="form-group">

    {!! Form::label('fan_tag', 'Fan Tag') !!}

    {!! Form::text('fan_tag', '', array('class' => 'form-control', 'placeholder'=>'Fan Tag',
    'data-bv-trigger'=>'keyup', 'data-bv-notempty-message'=>'Fan Tag is required')) !!}
    <p class="text-muted text-small-register-help">If you forgot your Tag name, your e-mail address works as well.</p>
    {{--, 'required'--}}
</div>

<div class="form-group">
    {!! Form::label('pw', 'PW') !!}
    {!! Form::password('password', array('class' => 'form-control', 'placeholder'=>'Enter Your Password',
    'data-toggle'=>"password",'data-bv-trigger'=>'keyup','data-bv-notempty-message'=>'Password is required')) !!}
    <p  class="text-muted text-small-register-help">If you have entered the wrong PW an e-mail and text has already been sent to you. It will have a five digit code that you must type in to
        <b>{!! HTML::link('reset-password', 'change your information',['class'=>'reset-password-link'])!!}</b>
         .</p>
</div>

<div class="form-group">
    {!!  Form::checkbox('remember', null, 'Keep me logged In', ['class' => 'field'])  !!}
    {!! Form::label('remember', 'Keep me logged In') !!}
</div>

<div class="form-group">
    {!! Form::submit('Log In', array('class' => 'btn btn-lg btn-primary btn-block')) !!}
</div>

{!! Form::close() !!}

