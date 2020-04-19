<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    Hello {{{$to}}},

    <p> You are receiving this email because you recently requested to change password
        at {{ Config::get('appMeta.411fan.company_name')}}.</p>

    <p> You can enter the following password reset code:
        {{{$code}}}
        </p>
    {{--Didn't request this change?--}}
    {{--If you didn't request a new password, let us know immediately.--}}
    <br/><br/>

    Warm Regards,<br/>

    <b>{{ Config::get('appMeta.411fan.company_name')}} Team</b>

</body>
</html>
