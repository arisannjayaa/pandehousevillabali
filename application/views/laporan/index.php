<form class="form form-horizontal" action="<?php echo base_url('AdminLaporan/cetakLaporan')?>" method="post" enctype="multipart/form-data">
	<div class="row mb-3 gap-3 gap-lg-0">
	<div class="col-12 col-lg">
		<div class="form-floating">
			<input type="month" class="form-control" id="dari" placeholder="" value="<?= date("Y-m") ?>" name="date">
			<label for="dari">Pilih Bulan Tahun</label>
		</div>
	</div>
	<div class="col-12 col-lg-1 d-grid">
		<button type="submit" id="print" class="btn btn-primary"><i class="bi bi-printer-fill"></i></button>
	</div>
</div>
</form>

