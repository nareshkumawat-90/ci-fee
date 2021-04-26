<table width="600" border="0" cellspacing="5" cellpadding="5" class="table table-striped table-bordered bulk_action">
     <tr >
                                                  <th>Sr No</th>
                                                  <th>First Name</th>
                                                  <th>Last Name</th>
                                                  <th>Amount </th>
                                                  <th>Paid Date</th>
                                                  <th>Descriptionr</th>                  
                                             </tr>
                                             <?php if(!empty($fees)){ foreach($fees as $row){ ?>
                                                  <tr>
                                                  <td><?php echo $row["id"] ;?></td>
                                                  <td><?php echo $row["fname"] ;?></td>
                                                  <td><?php echo $row["lname"] ;?></td>
                                                  <td><?php echo $row["amount"] ;?></td>
                                                  <td><?php echo $row["paid_date"] ;?></td>
                                                  <td><?php echo $row["description"] ;?></td>
                                                  </tr>                         
                                                  <?php
                                                 
                                                } }else{
                                             ?>
                                             <p>Data not found...</p>
                                             <?php } ?>
                                         </table>
                                         <?php echo $this->ajax_pagination->create_links(); ?>