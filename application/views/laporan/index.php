<div class="row mb-3 gap-3 gap-lg-0">
	<div class="col-12 col-lg">
		<div class="form-floating">
			<input type="month" class="form-control" id="dari" placeholder="" value="<?= date("Y-m") ?>" name="dari">
			<label for="dari">Pilih Bulan Tahun</label>
		</div>
	</div>
	<div class="col-12 col-lg-1 d-grid">
		<button type="submit" id="print" class="btn btn-primary"><i class="bi bi-printer-fill"></i></button>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card border border-1">
			<div class="card-body">
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No Transaksi</th>
							<th>Nama Villa</th>
							<th>Check-In</th>
							<th>Check-out</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
