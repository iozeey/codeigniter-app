<!DOCTYPE html>

<html>

<head>

    @include('includes.head')

</head>

<body  style="min-height:800px;margin-top:10% ">

@include('includes.menus.salientMenu',['isIncludeRightMenuBar'=>false,'isIncludeAffix'=>false,'isIncludeHeaderMenuBar'=>false])

<div id="container" class="bg-white">

    {{--<header>--}}

        {{--<div class="container">--}}

            {{--@include('includes.menus.headerMenuBar')--}}

        {{--</div>--}}

    {{--</header>--}}

    <div id="content">

        @yield('flash')

        @yield('content')

    </div>

    <footer>

        @include('includes.footer')

        @include('includes.foot')

    </footer>

</div>

</body>

</html>
