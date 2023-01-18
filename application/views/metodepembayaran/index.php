<?php
    if (null !==($this->session->userdata("alert_home"))) { ?>
        <div class="alert alert-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
            <?php echo $this->session->userdata("alert_home"); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
<?php } ?>
<div class="row">
	<div class="col">
		<div class="card border border-1">
			<div class="card-body">
				<div class="d-flex justify-content-start mb-3">
					<a href="<?= base_url('AdminMetodePembayaran/tambah') ?>"><button class="btn btn-primary">Tambah Data</button></a> 
				</div>
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis Pembayaran</th>
							<th>Isi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($metodepembayaran->result_array() as $metodepembayaran_data){ ?>
						<tr>
							<td style="width: 6%;"><?php echo $no++ ;?></td>
							<td><?php echo $metodepembayaran_data['jenis_pembayaran'] ;?></td>
							<td style="width: 50%;"><?php echo $metodepembayaran_data['isi'] ;?></td>
							<td>
								<div class="btn-group mb-1">
									<div class="dropdown">
										<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-menu-down"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="<?php echo base_url('AdminMetodePembayaran/edit/').$metodepembayaran_data['id_metode_pembayaran'];?>"><i class="bi bi-check-square-fill text-primary"></i> Edit</a>
											<a class="dropdown-item" href="<?php echo base_url('AdminMetodePembayaran/aksi_delete/').$metodepembayaran_data['id_metode_pembayaran'];?>"><i class="bi bi-x-square-fill text-danger"></i> Hapus</a>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php
						}
						?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
