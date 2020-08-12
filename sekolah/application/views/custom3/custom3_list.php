
    <body>
        <h2 style="margin-top:0px">Custom3 List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('custom3/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('custom3/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('custom3'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Status</th>
		<th>Angka</th>
		<th>Teks</th>
		<th>Action</th>
            </tr><?php
            foreach ($custom3_data as $custom3) {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $custom3->status ?></td>
			<td><?php echo $custom3->angka ?></td>
			<td><?php echo $custom3->teks ?></td>
			<td style="text-align:center" width="200px">
				<?php
                echo anchor(site_url('custom3/read/'.$custom3->id), 'Read');
                echo ' | ';
                echo anchor(site_url('custom3/update/'.$custom3->id), 'Update');
                echo ' | ';
                echo anchor(site_url('custom3/delete/'.$custom3->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
 