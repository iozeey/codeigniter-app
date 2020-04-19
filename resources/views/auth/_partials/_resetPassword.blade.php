<div class="row">

    <div class="col-xs-12">
        Please check your email for a message with your code. Your code is 5 numbers long.
    </div>

    <div class="col-xs-12">

        {!! Form::open(array('route' => 'reset-password','name'=>'reset-password')) !!}
        <div class="form-group">

            {!! Form::text('code', '', array('class' => 'form-control', 'placeholder'=>'#####',
            'data-bv-trigger'=>'keyup', 'data-bv-notempty-message'=>'Reset Code is required')) !!}

            {!! Form::hidden('email', $email, array('class' => 'form-control', 'placeholder'=>'#####',
            'data-bv-trigger'=>'keyup', 'data-bv-notempty-message'=>'Reset Code is required')) !!}

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
            {!! Form::submit('Continue', array('class' => 'btn btn-lg btn-primary btn-block')) !!}
        </div>

        {!! Form::close() !!}


    </div>
    <div class="col-xs-12">
        <b>We sent your code to:</b>
        {{$email}}
    </div>
</div>




