<?php echo base_url('header.php');?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php echo base_url('sidebar.php');?>
        <!-- top navigation -->
        <?php echo base_url('top.php');?>
        <!-- /top navigation -->
       
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Student Mangement</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Student Form</small></h2>

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                   

                    <form id="my" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fnameid">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fnameid" required="required" name="fname" class="form-control col-md-7 col-xs-12" value="<?php echo $set_fname;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lnameid">LastName <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="lnameid" required="required" name="lname" value="<?php echo $set_lname;?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="emailid" >Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" data-validate-linked="email" required="required"  value="<?php echo $set_email;?>" class="form-control col-md-7 col-xs-12">
                          <span class="err-msg">
                             <?php if($emailErr!=1){ echo $emailErr; } ?>
                          </span>
                        </div>
                      </div>
                     <div class="form-group">
                        <label for="gender"   class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                              <input type="radio"  name="gender" value="Male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-primary">
                              <input type="radio"  name="gender" value="Female"> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="contactid" class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="contactid" class="form-control col-md-7 col-xs-12" value="<?php echo $set_contact;?>" required="required" name="contact" type="text">
                        </div>
                      </div>
                     <div class="form-group">
                        <label for="dobid" class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="dobid" name="dob" class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $set_dob;?>" required="required" type="date">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="addid" class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="addid" class="form-control col-md-7 col-xs-12" value="<?php echo $set_add;?>" required="required" name="add" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="total_feeid" class="control-label col-md-3 col-sm-3 col-xs-12">Total Fee<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="total_feeid" class="form-control col-md-7 col-xs-12" value="0" required="required" name="total_fee" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button type="submit" name="save" class="btn btn-success" id="btnadd">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            

           
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php echo base_url('footer.php');?>