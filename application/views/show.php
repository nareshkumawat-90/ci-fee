  <?php include('header.php') ?>
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
                                             <div id="container">
                                              <p>Note:- Please start typing surname as "Chavan", "Patil"</p>
                                              <input type="text" name="search" id="search" />
                                              <ul id="finalResult"></ul>
                                         </div>
                                         <br />
                                         <table width="600" border="0" cellspacing="5" cellpadding="5" class="table table-striped table-bordered bulk_action">
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
                                             <?php
                                             foreach($students as $row)
                                             {
                                             ?>
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
                                                  </td><?php
                                                  echo "</tr>";
                                             }
                                             ?>
                                         </table>
                                         <div class="pagination_links"> 
                                             <?php echo $links; ?> 
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
     <script>
         $(document).ready(function()
         {
           $("#search").keyup(function()
           {
               if($("#search").val().length>3)
               {
                    $.ajax({
                        type: "post",
                        url: "http://localhost/technicalkeeda/index.php/employee",
                        cache: false,    
                        data:'search='+$("#search").val(),
                        success: function(response)
                        {
                            $('#finalResult').html("");
                            var obj = JSON.parse(response);
                            if(obj.length>0)
                            {
                                try
                                {
                                   var items=[];
                                   $.each(obj, function(i,val)
                                   {           
                                      items.push($('<li/>').text(val.FIRST_NAME + " " + val.LAST_NAME));
                                   }); 
                                   $('#finalResult').append.apply($('#finalResult'), items);
                                }
                                catch(e)
                                {
                                   alert('Exception while request..');
                                }
                            }
                            else
                            {
                                $('#finalResult').html($('<li/>').text("No Data Found"));
                            } 
                        },
                        error: function()
                        {
                             alert('Error while request..');
                        }
                   });
               }
               return false;
            });
          });
     </script>
