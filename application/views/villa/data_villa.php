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
					<a href="<?= base_url('AdminVilla/datavilla_tambah') ?>"><button class="btn btn-primary">Tambah Data</button></a>
				</div>
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($villa->result_array() as $villa_data){ ?>
						<tr>
							<td><?php echo $no++ ;?></td>
							<td><?php echo $villa_data['nama'] ;?></td>
							<td><?php echo $villa_data['deskripsi'] ;?></td>
							<td>Rp.<?php echo $villa_data['harga'] ;?></td>
							<td>
								<div class="btn-group mb-1">
									<div class="dropdown">
										<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-menu-down"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="<?= base_url('AdminVilla/datavilla_edit/').$villa_data['id_villa']; ?>"><i class="bi bi-check-square-fill text-primary"></i> Edit</a>
											
											<a class="dropdown-item" href="<?= base_url('public/template_user/images/').$villa_data['sampul']; ?>" target="_blank"><i class="bi bi-eye-fill text-secondary"></i> Lihat Sampul</a>
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
