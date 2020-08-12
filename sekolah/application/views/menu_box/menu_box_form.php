
    <body>
        <h2 style="margin-top:0px">Menu_box <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Status Box <?php echo form_error('status_box') ?></label>
            <input type="text" class="form-control" name="status_box" id="status_box" placeholder="Status Box" value="<?php echo $status_box; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Box <?php echo form_error('nama_box') ?></label>
            <input type="text" class="form-control" name="nama_box" id="nama_box" placeholder="Nama Box" value="<?php echo $nama_box; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket Box <?php echo form_error('ket_box') ?></label>
            <input type="text" class="form-control" name="ket_box" id="ket_box" placeholder="Ket Box" value="<?php echo $ket_box; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('menu_box') ?>" class="btn btn-default">Cancel</a>
	</form>
   