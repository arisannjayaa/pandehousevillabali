<div class="row">
	<div class="col">
		<div class="card border border-1">
			<div class="card-body">
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($ketersediaan->result_array() as $ketersediaan_data){ ?>
						<tr>
							<td><?php echo $no++ ;?></td>
							<td><?php echo $ketersediaan_data['tanggal'] ;?></td>
							<td style="width: 55%;"><?php echo $ketersediaan_data['status'] ;?></td>
							<td>
								<div class="btn-group mb-1">
									<div class="dropdown">
										<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-menu-down"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="<?= base_url('AdminVilla/UbahKetersediaanKeTersedia/').$ketersediaan_data['id_ketersediaan']; ?>"><i class="bi bi-check-square-fill text-primary"></i> Ubah Ketersediaan Ke Tersedia</a>
											<a class="dropdown-item" href="<?= base_url('AdminVilla/UbahKetersediaanKeKosong/').$ketersediaan_data['id_ketersediaan']; ?>"><i class="bi bi-x-square-fill text-danger"></i> Ubah Ketersediaan Ke Kosong</a>
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
