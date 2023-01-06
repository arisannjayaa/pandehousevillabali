<div class="row">
	<div class="col">
		<div class="card border border-1">
			<div class="card-body">
				<div class="d-flex justify-content-start mb-3">
					<a href="<?= base_url('villa/add') ?>"><button class="btn btn-primary">Tambah Data</button></a>
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
						<?php
						$no = 1;
						foreach ($villa as $data) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data->nama ?></td>
								<td><?= $data->deskripsi ?></td>
								<td><?= $data->harga ?></td>
								<td>
									<div class="btn-group mb-1">
										<div class="dropdown">
											<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="bi bi-menu-down"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="#"><i class="bi bi-check-square-fill text-primary"></i> Edit</a>
												<a class="dropdown-item" href="#"><i class="bi bi-x-square-fill text-danger"></i> Hapus</a>
												<a class="dropdown-item" href="#"><i class="bi bi-eye-fill text-secondary"></i> Detail</a>
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
