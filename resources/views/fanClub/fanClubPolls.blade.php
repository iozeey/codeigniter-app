@extends('...layouts.client')

@section('content')
    <style>

    </style>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @include('...includes.menus.leftSideMenuBar')
            </div>

            <div class="col-md-9">

                <div class="col-md-12" >
                    <div class="text-center"><h1> {{ Config::get('labelDescription.fan_club.search_bar.top_title')}}</h1></div>
                </div>

                <div class="col-md-12 fan-club-index-page-search">

                    <div class="col-md-6 fan-club-index-page-title pull-left">
                        <div style="font-size:16px;font-weight:bold;">
                            <a href="http://club.411fan.com/fan_clubs/more_artist">What To Join Other {{ Config::get('appMeta.411fan.title')}} Clubs?</a>
                        </div>
                    </div>

                    <div class="col-md-6 pull-right">
                        @include('...partials._fanClubSearchBar')
                    </div>

                </div>

                <div class="col-md-6 fan-club-index-page-title">
                    <div class="page-title"><h1>My Profile Setting</h1></div>
                </div>

                <div class="col-md-12 fan-club-container border-gray">
                    @include('fanClub.partials._fanClubPolls')
                </div>
            </div>

        </div>
    </div>

@stop
