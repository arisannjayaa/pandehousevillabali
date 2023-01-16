<div class="row">
	<div class="col-4">
		<div class="card">
			<div class="card-body">
				<div class="d-flex justify-content-center mb-2">
					<div class="initial-avatar fs-1 bg-primary">A</div>
				</div>
				<div class="text-center">@admin</div>
				<div class="d-grid mt-3 gap-2">
					<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editprofil">Edit Profil</button>
					<button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editsandi">Ubah Sandi</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-2">
						<label for="">Nama</label>
					</div>
					<div class="col-10 mb-3">
						<span class="form-control">Admin</span>
					</div>
					<div class="col-2">
						<label for="">Username</label>
					</div>
					<div class="col-10 mb-3">
						<span class="form-control">Admin</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade text-left modal-borderless" id="editprofil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Profil</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<form action="<?= base_url('') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" id="nama" placeholder="Masukkan nama" value="Admin" name="nama">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Masukkan username" value="Admin" name="username">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Simpan</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade text-left modal-borderless" id="editsandi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Sandi</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<form action="<?= base_url('') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Sandi lama</label>
						<input type="text" class="form-control" id="nama" placeholder="Masukkan sandi lama" name="lama">
					</div>
					<div class="form-group">
						<label for="username">Sandi baru</label>
						<input type="text" class="form-control" id="username" placeholder="Masukkan sandi baru" name="baru">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Simpan</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
