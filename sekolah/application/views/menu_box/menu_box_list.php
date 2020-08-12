
    <body>
        <h2 style="margin-top:0px">Menu_box List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('menu_box/create'), 'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('menu_box/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '') {
                                    ?>
                                    <a href="<?php echo site_url('menu_box'); ?>" class="btn btn-default">Reset</a>
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
		<th>Status Box</th>
		<th>Nama Box</th>
		<th>Ket Box</th>
		<th>Action</th>
            </tr><?php
            foreach ($menu_box_data as $menu_box) {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $menu_box->status_box ?></td>
			<td><?php echo $menu_box->nama_box ?></td>
			<td><?php echo $menu_box->ket_box ?></td>
			<td style="text-align:center" width="200px">
				<?php
                echo anchor(site_url('menu_box/read/'.$menu_box->id), 'Read');
                echo ' | ';
                echo anchor(site_url('menu_box/update/'.$menu_box->id), 'Update');
                echo ' | ';
                echo anchor(site_url('menu_box/delete/'.$menu_box->id), 'Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); ?>
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
 