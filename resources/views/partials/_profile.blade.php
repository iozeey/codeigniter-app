

{{--{{dd($user)}}--}}
    <div class="container">
        <div class="row">

            {!! Form::model($user, array('route' => array('edit-user-profile', $user->id))) !!}
            <!-- name -->

            {!!  Form::label('first_name', 'First Name') !!}
            {!!  Form::text('first_name',$user->first_name) !!}

            {!!"<br/>"!!}

            {!!  Form::label('last_name', 'Last Name') !!}
            {!!  Form::text('last_name',$user->last_name) !!}

            {!!"<br/>"!!}

            {!!  Form::label('gender', 'Gender') !!}
            {!!  Form::text('gender',$user->gender) !!}

            {!!"<br/>"!!}

            {!!  Form::label('photo_path', 'Photo') !!}
            {!!  Form::text('photo_path',$user->photo_path) !!}

            {!!"<br/>"!!}

            {!!  Form::label('dob', 'Date of birth') !!}
            {!!  Form::text('dob',$user->dob) !!}

            {!!"<br/>"!!}
            <!-- email -->
            {{--{!!  Form::label('email', 'Email') !!}--}}
            {{--{!!  Form::email('email') !!}--}}

            {!! Form::submit('Update Nerd!') !!}

            {!!Form::close() !!}


            <div class="col-sm-8 table-responsive">
                <table class="table" style="margin-top: 10px;">
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            {{$user['gender']}}
                        </td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td>
                            <span style="color:red">Date Of Birth Not Configured</span></td>
                    </tr>
                    <tr>
                        <td>Primary Email</td>
                        <td>JhoneCena@411fan.com</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Zip/Postal Code</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>About me</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>What I do for Fun</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
