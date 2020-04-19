<div class="col-sm-12">


    <div class="page-title"><h1>Complaints</h1></div>



        <!-------------------->
        <div class="col-sm-6">
            <form class="form-horizontal" name="frm_post" id="frm_post" action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="col-sm-12 control-label">Subject </label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" name="subject" id="subject" onkeypress="checkTab(event)">
            </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 control-label">Email</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" name="opt_email" id="opt_email" onkeypress="checkTab(event)" value="zshan63@gmail.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 control-label">Phone No</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" name="phone" id="phone" onkeypress="checkTab(event)">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 control-label">Complaint Details (more info the better for you) </label>
                    <div class="col-sm-12">
                    <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                <div class="col-sm-12 text-right">
                    <input type="button" name="" onclick="check_validation()" class="btn btn-primary" value="Submit">&nbsp;
                </div>
                </div>

            </form>
        </div>
        <!-------------------->



</div>