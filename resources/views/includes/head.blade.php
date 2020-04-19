<title>{{ Config::get('appMeta.411fan.title')}}</title>

<meta charset="utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<meta name="author" content="{{ Config::get('appMeta.411fan.company_name')}}" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta name="keywords" content="{{ Config::get('appMeta.411fan.meta_tag_keywords')}}" />

<meta name="description" content="{{ Config::get('appMeta.411fan.description')}}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>

<link rel="shortcut icon" href="http://beta.411fan.com/wp-content/uploads/2015/10/newsmall-logo.ico">

<link rel="shortcut icon" href="{!! URL::asset('images/favicon.png') !!}"/>

{{--<meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />--}}

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- JQuery Latest compiled and minified CSS -->
{!! Html::style('css/app.css') !!}
{!! Html::style('css/vendor/bootstrap.css') !!}
{!! Html::style('css/vendor/bootstrapValidator.css') !!}
{!! Html::style('css/vendor/flexslider.css') !!}
{{--{!! Html::style('font-awesome/css/font-awesome.min.css') !!}--}}
{!! Html::style('css/style.css') !!}
{!! Html::style('css/SocialStyle.css') !!}
{!! Html::style('css/custom.css') !!}

{{--salient menu css--}}
{!! Html::style('salientMenu/css/rgs.css') !!}
{!! Html::style('salientMenu/css/style.css') !!}
{!! Html::style('salientMenu/css/responsive.css') !!}
{!! Html::style('salientMenu/css/style(1).css') !!}

{{--{!! Html::script('js/vendor/modernizr.custom.js') !!}--}}
{!! Html::script('salientMenu/js/modernizr.js') !!}


{!! Html::script('js/vendor/jquery.js') !!}

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700,700italic,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
{{--<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">--}}
{{--<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">--}}

<script type="text/javascript">
    // Test for the ugliness.
    if (window.location.hash == '#_=_'){
        // Check if the browser supports history.replaceState.
        if (history.replaceState) {
            // Keep the exact URL up to the hash.
            var cleanHref = window.location.href.split('#')[0];
            // Replace the URL in the address bar without messing with the back button.
            history.replaceState(null, null, cleanHref);
        } else {
            // Well, you're on an old browser, we can get rid of the _=_ but not the #.
            window.location.hash = '';
        }
    }
    if (window.location.hash == '/fan-club#_=_'){
        // Check if the browser supports history.replaceState.
        if (history.replaceState) {
            // Keep the exact URL up to the hash.
            var cleanHref = window.location.href.split('#')[0];
            // Replace the URL in the address bar without messing with the back button.
            history.replaceState(null, null, cleanHref);
        } else {
            // Well, you're on an old browser, we can get rid of the _=_ but not the #.
            window.location.hash = '';
        }
    }
</script>


<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-XSRF-Token': $('meta[name="_token"]').attr('content')
            }
        });
    });
</script>
