
        <h2 style="margin-top:0px">Custom2 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Angka <?php echo form_error('angka') ?></label>
            <input type="text" class="form-control" name="angka" id="angka" placeholder="Angka" value="<?php echo $angka; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Teks <?php echo form_error('teks') ?></label>
            <input type="text" class="form-control" name="teks" id="teks" placeholder="Teks" value="<?php echo $teks; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('custom2') ?>" class="btn btn-default">Cancel</a>
	</form>
