<div class="col-sm-12">


    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>-->
    <script>
        function suggest(inputString,type){
            /*var msgs='<div class="" id="fan_inner" style="height:auto; background-color:#ffffff;border:#ccc 1px solid;padding:5px"><a href="'+base_url+'product/fan"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'imageresize/index/noimage/80/80"/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Fan Club</div></div></a><div style="clear:both;min-height: 4px"></div><a href="'+base_url+'product/price"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'imageresize/index/noimage/80/80"/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Price</div></div></a><div style="clear:both;min-height: 4px"></div><a href="'+base_url+'product/cat"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'imageresize/index/noimage/80/80"/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Item Category</div></div></a><div style="clear:both;min-height: 4px"></div><a href="'+base_url+'product"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'imageresize/index/noimage/80/80"/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Keyword</div></div></a><div style="clear:both;min-height: 4px"></div></div>'; */

            var msgs='<div class="" id="fan_inner" style="height:auto; background-color:#ffffff;border:#ccc 1px solid;padding:5px"><a href="'+base_url+'product/fan"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'images/front/fan-group.png "/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Fan Club</div></div></a><div style="clear:both;min-height: 4px"></div><a href="'+base_url+'product/cat"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'images/front/category.png "/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Item Category</div></div></a><div style="clear:both;min-height: 4px"></div><a href="'+base_url+'product"><div style="width:100%"><div class="" style="float:left;width:20%"><img style="height:50px;width:50px" src="'+base_url+'images/front/by-keyword.png"/></div><div class="" style="float:left;width:70%;margin: 5px 0px 0px 10px">Serach by Keyword</div></div></a><div style="clear:both;min-height: 4px"></div></div>';

            if(inputString.length == 0) {
                $('#suggestions').fadeIn();
                $('#suggestionsList').html(msgs);

            } else {
                $.ajax({
                    type: "POST",
                    url: base_url+'product/ajax_serach_suggest',
                    data: 'search_name='+inputString+'&type='+type,
                    success: function(msg){
                        if(msg.length >0) {
                            $('#suggestions').fadeIn();
                            $('#suggestionsList').html(msg);
                            $('#country').removeClass('load');
                        }
                    }
                });
            }
        }
        function fill(thisValue) {
            $('#country').val(thisValue);
            setTimeout("$('#suggestions').fadeOut();", 600);
        }
        function fillId(thisValue) {
            setTimeout("$('#suggestions').fadeOut();", 600);
        }
        function serach_value()
        {
            var suggestionbox=document.getElementById('country').value;
            if(suggestionbox!='')
            {
                document.frm_small.submit();
            }
            else
            {
                alert('please enter some keyword');
            }

        }

    </script>
    <!--
    <style>
    #nwaswrap {
    width:415px; /*follow your image's size*/
    height:30px;/*follow your image's size*/
    background-repeat:no-repeat; /*important*/
    padding:0px;
    margin:0px;
    position:relative; /*important*/
    background:#fff;
    /*border:#b1aaaa 1px solid;*/
    border:#b1aaaa 1px solid;
    border-radius:30px;
    color:#737373;
    }




    #nwaswrap form { display:inline ; }

    .searchboxnws {
    border:0px; /*important*/
    background-color:transparent; /*important*/
    position:absolute; /*important*/
    top:0px;
    left:0px;
    width:365px;
    height:30px;
    color:#737373;

    border-radius:30px;
    padding:0px 0px 0px 10px;
    }




    .searchboxnws_submit {
     /*background-image:url(images/searchicon5.png);*/
     background-repeat:no-repeat;
    border:0px; /*important*/
    background-color:transparent; /*important*/
    position:absolute; /*important*/
    top:2px;
    left:380px;
    width:32px;
    height:28px;
    color:#737373;
    }
    </style>
    -->

    <div class="titelzone">
        <h2>Merchandise <span  class="pull-right"> <a href="http://club.411fan.com/product/all">All Product</a>&nbsp; | &nbsp;
            <a href="http://club.411fan.com/product/up"><i class="fa fa-plus-circle"></i> Upload Your Product</a></span>
        </h2>
    </div>



    <div id="stream" class="thumbnail">


        <h3>
            Your fan clubs does not have any merchandising product for you.If you want to see all the merchandising products of all fan clab<br>
            <a href="http://club.411fan.com/product/all"> please click here</a>
        </h3>

    </div>




</div>