
    <body>
        <h2 style="margin-top:0px">Menu <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Menu <?php echo form_error('nama_menu') ?></label>
            <input type="text" class="form-control" name="nama_menu" id="nama_menu" placeholder="Nama Menu" value="<?php echo $nama_menu; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status Menu <?php echo form_error('status_menu') ?></label>
            <input type="text" class="form-control" name="status_menu" id="status_menu" placeholder="Status Menu" value="<?php echo $status_menu; ?>" />
        </div>
	    <input type="hidden" name="kd_menu" value="<?php echo $kd_menu; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
	</form>
   