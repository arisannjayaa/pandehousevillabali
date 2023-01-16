<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<form class="form form-horizontal" method="post" action="<?= base_url('kontakperson/update') ?>">
					<div class="form-body">
						<?php
						foreach ($kontak as $data) { ?>
							<input type="text" value="<?= $data->id_contact_person ?>" hidden name="id">
							<div class="row">
								<div class="col-md-4">
									<label>Jenis</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" id="jenis" class="form-control" name="jenis" placeholder="Contoh: Twitter" value="<?= $data->jenis_cp ?>">
								</div>
								<div class="col-md-4">
									<label>Username</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" id="username" class="form-control" name="username" placeholder="Contoh: elonmask" value="<?= $data->isi_cp ?>">
								</div>
								<div class="col-sm-12 d-flex justify-content-end">
									<button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
									<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
