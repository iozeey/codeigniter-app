<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
    Hello {{{$to}}},

    <p> You are receiving this email because you recently created a new account
        at {{ Config::get('appMeta.411fan.company_name')}}.</p>

    <br/><br/>

    Warm Regards,<br/>

    <b>{{ Config::get('appMeta.411fan.company_name')}} Team</b>

</body>
</html>
