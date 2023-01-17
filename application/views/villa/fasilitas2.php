<div class="row">
	<div class="col">
		<div class="card border border-1">
			<div class="card-body">
				<div class="d-flex justify-content-start mb-3">
					<a href="<?= base_url('AdminVilla/fasilitas_tambah/').$id ?>"><button class="btn btn-primary">Tambah Data</button></a>
				</div>
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Fasilitas</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($fasilitas->result_array() as $fasilitas_data){ ?>
						<tr>
							<td><?php echo $no++ ;?></td>
							<td><?php echo $fasilitas_data['fasilitas'] ;?></td>
							<td style="width: 55%;"><?php echo $fasilitas_data['deskripsi'] ;?></td>
							<td>
								<div class="btn-group mb-1">
									<div class="dropdown">
										<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-menu-down"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="<?= base_url('AdminVilla/fasilitas_edit/').$fasilitas_data['id_detail_villa']; ?>"><i class="bi bi-check-square-fill text-primary"></i> Edit</a>
											<a class="dropdown-item" href="<?= base_url('AdminVilla/AksiDeletefasilitas/').$fasilitas_data['id_detail_villa']; ?>"><i class="bi bi-x-square-fill text-danger"></i> Hapus</a>
											<a class="dropdown-item" href="<?= base_url('public/template_user/images/').$fasilitas_data['foto']; ?>" target="_blank"><i class="bi bi-eye-fill text-secondary"></i> Lihat Sampul</a>
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
