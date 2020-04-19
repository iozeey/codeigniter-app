{{--http://www.kodingmadesimple.com/2014/02/how-to-create-round-social-media-icon.html--}}
{{--{!! URL::to('login') !!}--}}
{{--<a class="facebookBtn smGlobalBtn" href="{!! URL::to('fAuth') !!}" data-social-login1="facebook" id="facebook"></a>--}}

{!! Html::linkRoute('sAuth', '', array( Config::get('enum.socialDrivers.f')),array('class' => 'facebookBtn smGlobalBtn')) !!}
{!! Html::linkRoute('sAuth', '', array( Config::get('enum.socialDrivers.g')),array('class' => 'googleplusBtn smGlobalBtn')) !!}
{!! Html::linkRoute('sAuth', '', array( Config::get('enum.socialDrivers.t')),array('class' => 'twitterBtn smGlobalBtn')) !!}

{{--<a class="googleplusBtn smGlobalBtn" href="{!! URL::to('gAuth') !!}" data-social-login="googleplus" id="googleplus" ></a>--}}
{{--<a class="twitterBtn smGlobalBtn" href="{!! URL::to('tAuth') !!}" data-social-login="twitter" id="twitter"></a>--}}
{{--<a class="linkedinBtn smGlobalBtn" href="#" data-social-login="linkedin" id="linkedin"></a>--}}
{{--<a class="pinterestBtn smGlobalBtn" href="#" data-social-login="pinterest" id="pinterest"></a>--}}
{{--<a class="tumblrBtn smGlobalBtn" href="#" data-social-login="tumblr" id="tumblr"></a>--}}
{{--<a class="rssBtn smGlobalBtn" href="#" data-social-login="rssBtn" id="rssBtn"></a>--}}



