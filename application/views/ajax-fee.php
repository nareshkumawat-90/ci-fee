<table class="table table-striped table-bordered">
     <tr >
                                                  <th>Sr No</th>
                                                  <th>First Name</th>
                                                  <th>Last Name</th>
                                                  <th>Amount </th>
                                                  <th>Paid Date</th>
                                                  <th>Descriptionr</th>
                                                  <th>Action </th>                  
                                             </tr>
                                             <?php if(!empty($fees)){ foreach($fees as $row){ ?>
                                                  <tr>
                                                  <td><?php echo $row["id"] ;?></td>
                                                  <td><?php echo $row["fname"] ;?></td>
                                                  <td><?php echo $row["lname"] ;?></td>
                                                  <td><?php echo $row["amount"] ;?></td>
                                                  <td><?php echo $row["paid_date"] ;?></td>
                                                  <td><?php echo $row["description"] ;?></td>
                                                  <td><?php echo anchor("Students/delFee/{$row['id']}","Delete",['class'=>'btn btn-danger','onclick'=>'return ConfirmDialog();']); ?>
                                                      <?php echo anchor("Students/editFee/{$row['id']}","Update",['class'=>'btn btn-success']); ?>
                                                  </td>
                                                  </tr>                         
                                                  <?php
                                                 
                                                } }else{
                                             ?>
                                             <tr>
                                             <td colspan="7" align="center">Data not found...</td>
                                             </tr>
                                             <?php } ?>
                                         </table>
                                         <?php echo $this->ajax_pagination->create_links(); ?>