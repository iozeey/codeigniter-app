@extends('layouts.clientIndexPage')

@section('content')
<style>
.fan-event
{

}
.page-event-listing
{
    padding: 15px;
}
.border-right
{
    border-right: 1px solid #c7d1cb;
}
.border-bottom
{
    border-bottom: 1px solid #c7d1cb;
}
.border-left
 {
     border-left: 1px solid #c7d1cb;
 }
.event-header
{
    padding-bottom: 5px;
    margin-bottom: 5px;
}
.event-listing-date
{
    font-weight: bold;
}
</style>
<div class="container fan-event">

<div class="col-md-9">
    <section class="fan-events-view">

        <div class="col-md-12  event-header border-bottom">
            <div class="heading">
                Events near <span class="location-text city-location-text">Los Angeles, CA
                    <div class="location-selector">
                        <div class="location-title">Find Events outside Los Angeles, CA</div>
                        <div id="location-autocomplete"></div>
                    </div>
                    </span>
            </div>
        </div>

        <div class="col-md-12 page-event-listing border-bottom" >

            <div class="col-md-2 event-listing-datetime border-right">
                <div class="event-listing-date" itemprop="startDate" content="2015-11-10">
                    Nov 10
                </div>
                <div class="event-listing-time text-muted" title="2015-11-10T03:30"
                     datetime="2015-11-10T03:30">
                    Tue TBD
                </div>
            </div>

            <div class="col-md-8 event-listing-details flex-child border-right">

                <div class="event-listing-location" itemprop="location" itemscope="" itemtype="http://schema.org/Place">
                    <span class="event-listing-location-text">
                        <a class="event-listing-venue-link" href="#" data-slug="stadthalle-offenbach" itemprop="url">
                            <span itemprop="name">Stadthalle Offenbach</span>
                        </a>
                        –
                        <span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                        <a class="event-listing-location-link"  href="#"><span class="locality" itemprop="addressLocality">
                                Offenbach am Main</span>, <span class="country" itemprop="addressCountry">Germany</span></a>
                        </span>
                    </span>
                </div>
                <a class="event-listing-title" itemprop="url" href="#"> <span itemprop="name">Editors</span></a>
            </div>

            <div class="col-md-2 event-listing-datetime flex-child">
                <a href="#"  class="btn btn-success event-listing-button">
                    <span class="subtitle">Find Tickets</span>
                </a>
            </div>

        </div>
        <div class="col-md-12 page-event-listing border-bottom" >

            <div class="col-md-2 event-listing-datetime border-right">
                <div class="event-listing-date" itemprop="startDate" content="2015-11-10">
                    Nov 10
                </div>
                <div class="event-listing-time text-muted" title="2015-11-10T03:30"
                     datetime="2015-11-10T03:30">
                    Tue TBD
                </div>
            </div>

            <div class="col-md-8 event-listing-details flex-child border-right">

                <div class="event-listing-location" itemprop="location" itemscope="" itemtype="http://schema.org/Place">
                    <span class="event-listing-location-text">
                        <a class="event-listing-venue-link" href="#" data-slug="stadthalle-offenbach" itemprop="url">
                            <span itemprop="name">Stadthalle Offenbach</span>
                        </a>
                        –
                        <span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                        <a class="event-listing-location-link"  href="#"><span class="locality" itemprop="addressLocality">
                                Offenbach am Main</span>, <span class="country" itemprop="addressCountry">Germany</span></a>
                        </span>
                    </span>
                </div>
                <a class="event-listing-title" itemprop="url" href="#"> <span itemprop="name">Editors</span></a>
            </div>

            <div class="col-md-2 event-listing-datetime flex-child">
                <a href="#"  class="btn btn-success event-listing-button">
                    <span class="subtitle">Find Tickets</span>
                </a>
            </div>

        </div>
        <div class="col-md-12 page-event-listing border-bottom" >

            <div class="col-md-2 event-listing-datetime border-right">
                <div class="event-listing-date" itemprop="startDate" content="2015-11-10">
                    Nov 10
                </div>
                <div class="event-listing-time text-muted" title="2015-11-10T03:30"
                     datetime="2015-11-10T03:30">
                    Tue TBD
                </div>
            </div>

            <div class="col-md-8 event-listing-details flex-child border-right">

                <div class="event-listing-location" itemprop="location" itemscope="" itemtype="http://schema.org/Place">
                    <span class="event-listing-location-text">
                        <a class="event-listing-venue-link" href="#" data-slug="stadthalle-offenbach" itemprop="url">
                            <span itemprop="name">Stadthalle Offenbach</span>
                        </a>
                        –
                        <span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                        <a class="event-listing-location-link"  href="#"><span class="locality" itemprop="addressLocality">
                                Offenbach am Main</span>, <span class="country" itemprop="addressCountry">Germany</span></a>
                        </span>
                    </span>
                </div>
                <a class="event-listing-title" itemprop="url" href="#"> <span itemprop="name">Editors</span></a>
            </div>

            <div class="col-md-2 event-listing-datetime flex-child">
                <a href="#"  class="btn btn-success event-listing-button">
                    <span class="subtitle">Find Tickets</span>
                </a>
            </div>

        </div>
    </section>
</div>

<div class="col-md-3 border-left">
    <section class="sidebar-search">
        <div class="sidebar-section-header"><h3>About {{ Config::get('appMeta.411fan.title')}}</h3></div>
        <p>
            {{ Config::get('appMeta.411fan.about')}}
        </p>
    </section>
</div>

</div>

@stop
