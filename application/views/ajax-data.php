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