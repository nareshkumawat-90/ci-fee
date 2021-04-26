<?php include('header.php') ?>
<style>
.row{position: relative;}
.post-list{ 
    margin-bottom:20px;
}
div.list-item {
    border-left: 4px solid #7ad03a;
    margin: 5px 15px 2px;
    padding: 1px 12px;
    background-color:#F1F1F1;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    height: 60px;
}
div.list-item p {
    margin: .5em 0;
    padding: 2px;
    font-size: 13px;
    line-height: 1.5;
}
.list-item a {
    text-decoration: none;
    padding-bottom: 2px;
    color: #0074a2;
    -webkit-transition-property: border,background,color;
    transition-property: border,background,color;-webkit-transition-duration: .05s;
    transition-duration: .05s;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
}
.list-item a:hover{text-decoration:underline;}
.list-item h2{font-size:25px; font-weight:bold;text-align: left;}

/* search & filter */
.post-search-panel input[type="text"]{
	width: 220px;
    height: 28px;
    color: #333;
    font-size: 16px;
}
.post-search-panel select{
    height: 34px;
    color: #333;
    font-size: 16px;
}

/* Pagination */
div.pagination {
	font-family: "Lucida Sans Unicode", "Lucida Grande", LucidaGrande, "Lucida Sans", Geneva, Verdana, sans-serif;
	padding:2px;
	margin: 20px 10px;
    float: right;
}

div.pagination a {
	margin: 2px;
	padding: 0.5em 0.64em 0.43em 0.64em;
	background-color: #FD1C5B;
	text-decoration: none; /* no underline */
	color: #fff;
}
div.pagination a:hover, div.pagination a:active {
	padding: 0.5em 0.64em 0.43em 0.64em;
	margin: 2px;
	background-color: #FD1C5B;
	color: #fff;
}
div.pagination span.current {
		padding: 0.5em 0.64em 0.43em 0.64em;
		margin: 2px;
		background-color: #f6efcc;
		color: #6d643c;
	}
div.pagination span.disabled {
		display:none;
	}
.pagination ul li{display: inline-block;}
.pagination ul li a.active{opacity: .5;}

/* loading */
.loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
.loading .content {
    position: absolute;
    transform: translateY(-50%);
     -webkit-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
</style>
<script>
function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Students/ajaxPaginationData/'); ?>'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function(){
            $('.loading').show();
        },
        success: function(html){
            $('#dataList').html(html);
            $('.loading').fadeOut("slow");
        }
    });
}
</script>
  <body class="nav-md">
     <div class="container body">
          <div class="main_container">
               <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                         <div class="navbar nav_title" style="border: 0;">
                              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                         </div>
                         <div class="clearfix"></div>

                         <!-- menu profile quick info -->
                         <div class="profile clearfix">
                              <div class="profile_pic">
                                   <img src="<?php echo base_url('assets/images/img.jpg'); ?>" alt="..." class="img-circle profile_img">
                              </div>
                              <div class="profile_info">
                                   <span>Welcome,</span>
                                   <h2>John Doe</h2>
                              </div>
                         </div>

                         <!-- /menu profile quick info -->
                         <br />

                         <!-- sidebar menu -->
                         <?php include('sidebar.php') ?>
                         <!-- /sidebar menu -->

                         <!-- /menu footer buttons -->
                         <div class="sidebar-footer hidden-small">
                              <a data-toggle="tooltip" data-placement="top" title="Settings">
                                   <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                   <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Lock">
                                   <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                   <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                              </a>
                         </div>
                         <!-- /menu footer buttons -->
                    </div>
               </div>

               <!-- top navigation -->
               <?php include('top.php') ?>
               <!-- /top navigation -->

               <!-- page content -->
               <div class="right_col" role="main">
                    <div class="">
                         <div class="page-title">
                              <div class="title_left">
                                   <h3>Student Form</h3>
                              </div>

                              <div class="title_right">
                                   <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                        <div class="input-group">
                                             <input type="text" class="form-control" placeholder="Search for...">
                                             <span class="input-group-btn">
                                                  <button class="btn btn-default" type="button">Go!</button>
                                             </span>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="clearfix"></div>

                         <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                   <div class="x_panel">
                                        <div class="x_title">
                                             <h2>Student Form </small></h2>
                                             <ul class="nav navbar-right panel_toolbox">
                                                  <li><a href= "http://localhost/fee/Students/savedata" class="btn btn-primary"> Add records</a></li>
                                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                  <li class="dropdown">
                                                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                       <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a></li>
                                                            <li><a href="#">Settings 2</a></li>
                                                       </ul>
                                                  </li>
                                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                  </li>
                                             </ul>
                                             <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                        <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-6 navbar-right">
                      <div class="input-group float-right">
                        <input type="text" id="keywords" placeholder="search" onkeyup="searchFilter();" class="form-control col-md-12 col-xs-12"  />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                      </div>
                    </div>
                    <select id="sortBy" onchange="searchFilter();">
		<option value="">Sort by Name</option>
		<option value="asc">Ascending</option>
		<option value="desc">Descending</option>
	</select>
                  </div>
<div class="post-list" id="dataList">
	<!-- Display posts list -->
	<table class="table table-striped table-bordered">
                                             <tr >
                                                  <th>Sr No</th>
                                                  <th>First Name</th>
                                                  <th>Last Name</th>
                                                  <th>Contact </th>
                                                  <th>Email</th>
                                                  <th>Gender</th>                  
                                                  <th>Date of Birth</th>
                                                  <th>Subject </th>
                                                  <th>Class </th>
                                                  <th>Total fees</th>
                                                  <th>Amount </th> 
                                                  <th>Due Amount </th>                 
                                                  <th>Address</th>
                                                  <th>Action </th>
                                             </tr>
                                             <?php if(!empty($student)){ foreach($student as $row){ ?>
												<tr>
                                                  <td><?php echo $row['id'] ;?></td>
                                                  <td><?php echo $row['fname'] ;?></td>
                                                  <td><?php echo $row['lname'] ;?></td>
                                                  <td><?php echo $row['contactno'] ;?></td>
                                                  <td><?php echo $row['email'] ;?></td>
                                                  <td><?php echo $row['gender'] ;?></td>                         
                                                  <td><?php echo $row['dob'] ;?></td>
                                                  <td><?php echo $row['class'] ;?></td>
                                                  <td><?php echo $row['subject'] ;?></td>
                                                  <td><?php echo $row['total_fee'] ;?></td>
                                                  <td><?php echo $row['amount'] ;?></td> 
                                                  <td><?php echo $row['total_fee']-$row['amount'] ;?></td>
                                                  <td><?php echo $row['address'] ;?></td>
                                                  <td><?php echo anchor("Students/delStudent/{$row['id']}","Delete",['class'=>'btn btn-danger','onclick'=>'return ConfirmDialog();']); ?>
                                                      <?php echo anchor("Students/paydata/{$row['id']}","Pay",['class'=>'btn btn-success']); ?>
                                                      <?php echo anchor("Students/editStudent/{$row['id']}","Update",['class'=>'btn btn-success']); ?>
                                                  </td>
												  </tr>                         
                                                  <?php
                                                 
                                                } }else{
                                             ?>
                                             <tr>
                                             <td colspan="15" align="center">Data not found...</td>
                                             </tr>
                                             <?php } ?>
                                         </table>
<!-- Render pagination links -->
<?php echo $this->ajax_pagination->create_links(); ?>
</div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
        <!-- /page content -->

     <!-- footer content -->
     <?php include('footer.php') ?>
     <script type="text/javascript">
            function ConfirmDialog() 
            {
               var x=confirm("Are you sure to delete record?")
               if (x) 
               {
                    return true;
               } else 
               {
                    return false;
               }
           }
     </script>
     