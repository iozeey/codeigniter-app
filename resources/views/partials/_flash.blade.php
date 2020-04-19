@if(isset($key))
    @if(Session::has($key))
        {!!Session::pull($key)!!}
        {{--{{Session::flush()}}--}}
    @endif
@else
    @if(Session::has(Config::get('messages.default.errorKey')))
        {!!Session::pull(Config::get('messages.default.errorKey'))!!}
        {{--{{Session::flush()}}--}}
    @endif
@endif


