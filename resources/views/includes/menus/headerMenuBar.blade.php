{{--

header setting options

1) all these would in in boolean form
    true => yes include this component
    false => no do not include this component
2) by default every thing(component) would be included

--}}

<?php
    $isIncludeRightMenuBar = isset($isIncludeRightMenuBar) ? $isIncludeRightMenuBar : true;
    $isIncludeAffix = isset($isIncludeAffix) ? $isIncludeAffix : true;
    $isIncludeGetAccessNowBtn = isset($isIncludeGetAccessNowBtn) ? $isIncludeGetAccessNowBtn : true;
?>

<nav class="navbar megamenu  navbar-static-top" {{$isIncludeAffix ? 'data-spy=affix data-offset-top=60 data-offset-bottom=200 ' :""}}>
    <div class="container">
        <div class="navbar-header">
            @if($isIncludeRightMenuBar)
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            @endif
            <a class="navbar-brand" href="/">

                {{--*/$imageUrl = URL::asset('images/411fan_logo_white_400_200.png');/*--}}

                <img src="{{$imageUrl}}" width="110" height="45" alt="logo">

            </a>
        </div>

        @if(Auth::check())
            @if($isIncludeRightMenuBar)
                <div class="collapse navbar-collapse nav-collapse" id="main-menu">

                    <ul class="nav navbar-right navbar-nav ">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button"
                               data-toggle="dropdown" title="Friends Group">
                                <i class="fa fa-group fa-lg"></i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">There is no friend request found</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('fan-list')}}" title="Fan Club">Find Friends</a></li>
                            </ul>
                        </li>

                        <li><a href="#" title="Notifications"><i class="fa fa-globe fa-lg"></i></a></li>
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button"
                               data-toggle="dropdown" title="Setting">
                                <i class="fa fa-cog fa-lg"></i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://club.411fan.com/user_profile/index/63">My Profile Setting</a></li>
                                <li><a href="#">Fan Club Setting</a></li>
                                <li><a href="/security">Security Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li>{!! HTML::link('auth/logout', 'Logout')!!}</li>
                                {{--, array('class' => 'fa fa-sign-out fa-fw')--}}
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" aria-expanded="false" aria-haspopup="true" role="button"
                               data-toggle="dropdown" title="Help">
                                <i class="fa fa-info-circle fa-lg"></i><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/report">Report a Problem</a></li>
                                <li><a href="/help">Help</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('fan-club')}}" title="Fan Club"><i class="fa fa-home fa-lg"></i></a></li>
                    </ul>

                </div>
            @endif
        @else
            @if($isIncludeRightMenuBar)
                <div class="collapse navbar-collapse nav-collapse" style="margin-top:1% ;margin-right: 3%;">
                    <ul class="nav navbar-right navbar-nav ">
                        <li> {!! HTML::link('sign-up', 'Get Access Now',['class'=>'btn btn-small btn-success'])!!}</li>
                    </ul>
                </div>
            @endif
        @endif

    </div>
</nav>
