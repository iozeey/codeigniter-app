<!-- HEADER START -->

<header>

    <div class="container" >

        @if(isset($isIncludeHeaderMenuBar))
            @include('includes.menus.headerMenuBar')
        @endif

            <div class="col-xs-12 text-center banner-content">

            <h1>{{ Config::get('labelDescription.fan_club.search_bar.top_title')}}</h1>

            <div class="row">
                <h3>{!! Config::get('labelDescription.fan_club.search_bar.top_sub_title')!!}</h3>
                <div class="col-lg-4 col-lg-offset-4">

                    @include('partials._fanClubSearchBar')

                    <p class="white-color">
                        {!! Config::get('labelDescription.fan_club.search_bar.bottom_title')!!}
                    </p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div>
        <div class="col-xs-12 text-center">
            <p><a href="#" class="scroll-more"><i class="fa fa-angle-down"></i></a></p>
        </div>
    </div>

</header>
<!-- HEADER END -->
