<form name="frm" id="frm" method="post" action="" autocomplete="off">
    <div class="input-group">
        <input type="text" class="form-control"
               placeholder="{!! Config::get('labelDescription.fan_club.search_bar.placeholder')!!}"/>
            <span class="input-group-btn">
               <button class="btn btn-success searchbtn" id="mainSearchBtn"
                       type="button">{{Config::get('labelDescription.fan_club.search_bar.button_title')}} </button>
            </span>
    </div>
    <!-- /input-group -->

</form>

