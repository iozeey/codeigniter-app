
@if($isIncludeHeaderMenuBar)

<div class="container">

    <div class="col-xs-12 text-center banner-content">

        <h1>{{ Config::get('labelDescription.fan_club.search_bar.top_title')}}</h1>

        <div class="row">
            <h3>{!! Config::get('labelDescription.fan_club.search_bar.top_sub_title')!!}</h3>

            <div class="col-lg-4 col-lg-offset-4">

                @include('partials._fanClubSearchBar')

                <p class="white-color">
                    {!! Config::get('labelDescription.fan_club.search_bar.bottom_title')!!}
                </p>
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>

    <div class="col-xs-12 text-center">
        <p><a href="#" class="scroll-more"><i class="fa fa-angle-down"></i></a></p>
    </div>

</div>

@endif

<div id="header-outer" data-has-menu="true" data-transparent-header="true" data-remove-border="false" class="transparent"
     data-mobile-fixed="1" data-user-set-bg="#ffffff" data-format="default" data-permanent-transparent="false"
     data-cart="false" data-transparency-option="1" data-shrink-num="10" data-full-width="false" data-using-secondary="0"
     data-using-logo="1" data-logo-height="40" data-padding="15" data-header-resize="1"
     style="transition: background-color 0.4s ease, box-shadow 0.4s ease, border-color 0.4s ease;" >

    <header id="top" >

        <div class="container" style="visibility: visible;">

            <div class="row">

                <div class="col span_3">

                    <a id="logo" href="http://beta.411fan.com/">

                        {{--*/$imageUrl1 = URL::asset('images/411fan_logo.png');/*--}}
                        {{--*/$imageUrl2 = URL::asset('images/411fan_logo_BLACK-final-PNG800x400.png');/*--}}
                        {{--*/$imageUrl3 = URL::asset('images/411fan_logo_white.png');/*--}}

                        <img class="stnd default-logo dark-version" alt="411 Fan" src="{{$imageUrl1}}" style="height: 30px; margin-top: 10px;">
                        <img class="retina-logo  dark-version" alt="411 Fan" src="{{$imageUrl2}}" style="height: 30px; margin-top: 10px;display: inline-block;">
                        <img class="starting-logo default-logo" alt="411 Fan" src="{{$imageUrl3}}" style="height: 30px;margin-top: 10px;">

                    </a>

                </div><!--/span_3-->

                <div class="col span_9 col_last" style=" margin-top: -12px;">

                    <div class="slide-out-widget-area-toggle">
                        <div> <a href="http://beta.411fan.com/#sidewidgetarea" class="closed"> <i class="icon-reorder"></i> </a> </div>
                    </div>

                    <nav style="margin-top: -10px;">
                        {{--<ul class="buttons" data-user-set-ocm="1">--}}
                            {{--<li id="search-btn" style="padding-bottom: 8px; padding-top: 8px;"><div><a href="http://beta.411fan.com/#searchbox">--}}
                                        {{--<span class="icon-salient-search" aria-hidden="true"></span></a></div> </li>--}}

                            {{--<li class="slide-out-widget-area-toggle" style="padding-bottom: 8px; padding-top: 8px;">--}}
                                {{--<div> <a href="http://beta.411fan.com/#sidewidgetarea" class="closed"> <span> <i class="lines-button x2"> <i class="lines"></i> </i> </span> </a> </div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}

                        <ul class="buttons" data-user-set-ocm="1" style=" margin-top: -12px;">
                            {{--<li id="search-btn" style="padding-bottom: 8px; padding-top: 8px;"><div><a href="#searchbox"><span class="icon-salient-search" aria-hidden="true"></span></a></div> </li>--}}

                            <li class="slide-out-widget-area-toggle" style="padding-bottom: 8px; padding-top: 8px;">
                                <div> <a href="#sidewidgetarea" class="closed"> <span> <i class="lines-button x2"> <i class="lines"></i> </i> </span> </a> </div>
                            </li>
                        </ul>

                        <ul class="sf-menu sf-js-enabled sf-arrows" >
                            <li id="menu-item-4568" class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4568">
                                <a href="{{Url::to('fan-club')}}" style="padding-bottom: 38.5px; padding-top: 10.5px;">Fan Clubs</a>
                            </li>
                            <li id="menu-item-4567" class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4567">
                                <a href="http://beta.411fan.com/411on411/" style="padding-bottom: 38.5px; padding-top: 10.5px;">411on411</a>
                            </li>
                            <li id="menu-item-4569" class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4569">
                                <a href="http://beta.411fan.com/411fan-insider-dope-report/" style="padding-bottom: 38.5px; padding-top: 10.5px;">InsideDope</a>
                            </li>
                            <li id="menu-item-4571" class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4571">

                                @if(Auth::check())
                                    {!! HTML::link('auth/logout', 'Logout', array('style' => 'padding-bottom: 38.5px; padding-top: 10.5px;'))!!}
                                @else
                                    <a href="{{URL::to('sign-up')}}" style="padding-bottom: 38.5px; padding-top: 10.5px;">Sign-Up Don’t Line-Up</a>
                                @endif
                            </li>
                            <li id="menu-item-4572" class="megaMenu menu-item menu-item-type-custom menu-item-object-custom menu-item-4572">
                                <a href="tel:+1-423-6-411Fan(326)" style="padding-bottom: 38.5px; padding-top: 10.5px;">+1-423-6-411Fan (326)</a>
                            </li>
                        </ul>

                    </nav>

                </div><!--/span_9-->

            </div><!--/row-->

        </div><!--/container-->

    </header>

</div><!--/header-outer-->
<div id="slide-out-widget-area-bg" class="fullscreen light"></div>
<div id="slide-out-widget-area" class="fullscreen" data-back-txt="Back">

    <div class="inner-wrap">
        <div class="inner" style="transform: translate(0px, 0px);">

            <a class="slide_out_area_close" href="./411 Fan_files/411 Fan.html"><span class="icon-salient-x icon-default-style"></span></a>

            <div class="off-canvas-menu-container">
                <div class="menu-wrap menuwrapper"><ul class="menu menuopen">
                        <li class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4568"><a href="{{Url::to('fan-club')}}">Fan Clubs</a></li>
                        <li class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4567"><a href="http://beta.411fan.com/411on411/">411on411</a></li>
                        <li class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4569">
                            <a href="http://beta.411fan.com/411fan-insider-dope-report/">Inside Dope</a></li>

                        <li class="megaMenu menu-item menu-item-type-post_type menu-item-object-page menu-item-4571">

                        @if(Auth::check())
                            {!! HTML::link('auth/logout', 'Logout')!!}
                        @else
                               <a href="{{URL::to('sign-up')}}">Sign-Up Don’t Line-Up</a>
                        @endif

                        </li>
                        {{--<a href="{{URL::to('sign-up')}}">Sign-Up Don’t Line-Up</a></li>--}}
                        <li class="megaMenu menu-item menu-item-type-custom menu-item-object-custom menu-item-4572"><a href="tel:+1-423-6-411Fan(326)">+1-423-6-411Fan (326)</a></li>

                    </ul></div>
            </div>


        </div>

    </div> <!--/inner-wrap-->
</div>

{{--</body>--}}
{{--</html>--}}