
        <h2 style="margin-top:0px">Custom1 <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Teksh5 <?php echo form_error('teksh5') ?></label>
            <input type="text" class="form-control" name="teksh5" id="teksh5" placeholder="Teksh5" value="<?php echo $teksh5; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Teksp <?php echo form_error('teksp') ?></label>
            <input type="text" class="form-control" name="teksp" id="teksp" placeholder="Teksp" value="<?php echo $teksp; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('custom1') ?>" class="btn btn-default">Cancel</a>
	</form>
