<div class="row">
	<div class="col">
		<div class="card border border-1">
			<div class="card-body">
				<div class="d-flex justify-content-start mb-3">
					<a href="<?= base_url('kontakperson/add') ?>"><button class="btn btn-primary">Tambah Data</button></a>
				</div>
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Jenis</th>
							<th>Username</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($kontak as $data) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data->jenis_cp ?></td>
								<td><?= $data->isi_cp ?></td>
								<td>
									<div class="btn-group mb-1">
										<div class="dropdown">
											<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="bi bi-menu-down"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="<?= base_url('kontakperson/edit/') . $data->id_contact_person ?>"><i class="bi bi-check-square-fill text-primary"></i> Edit</a>
												<span role="button" class="dropdown-item delete" data-id="<?= $data->id_contact_person ?>" data-name="<?= $data->isi_cp ?>"><i class="bi bi-x-square-fill text-danger"></i> Hapus</span>
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