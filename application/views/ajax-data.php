<!-- Display posts list -->
<?php if(!empty($fees)){ foreach($fees as $row){ ?>
	<div class="list-item"><a href="#"><?php echo $row["amount"]; ?></a>
	<a href="#"><?php echo $row["paid_date"]; ?></a>
    <a href="#"><?php echo $row["description"]; ?></a>
	<a href="#"><?php echo $row["fname"]; ?></a>
    <a href="#"><?php echo $row["lname"]; ?></a>
</div>
<?php } }else{ ?>
	<p>Data not found...</p>
<?php } ?>

<!-- Render pagination links -->
<?php echo $this->ajax_pagination->create_links(); ?>