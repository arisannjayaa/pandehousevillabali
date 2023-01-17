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
				<table class="table" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Tipe</th>
							<th>Nama</th>
							<th>Check-In</th>
							<th>Check-Out</th>
							<th>Villa</th>
							<th>Waktu Transaksi</th>
							<th>Status Pesanan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($transaksi->result_array() as $transaksi_data){ ?>
						<tr>
							<td><?php echo $no++ ;?></td>
							<td><?php echo $transaksi_data['tipe_transaksi'] ;?></td>
							<td><?php echo $transaksi_data['nama_customer'] ;?></td>
							<td><?php echo $transaksi_data['tgl_checkin'] ;?></td>
							<td><?php echo $transaksi_data['tgl_checkout'] ;?></td>
							<td><?php echo $transaksi_data['nama_villa'] ;?></td>
							<td><?php echo $transaksi_data['waktu_transaksi'] ;?></td>
							<td><?php echo $transaksi_data['status_pesanan'] ;?></td>
							<td>
								<div class="btn-group mb-1">
									<div class="dropdown">
										<button class="btn btn-primary  me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="bi bi-menu-down"></i>
										</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
											<a class="dropdown-item" href="<?php echo base_url('AdminPemesanan/konfirmasiTransaksi/').$transaksi_data['id_transaksi'];?>"><i class="bi bi-check-square-fill text-primary"></i> Terima Pesanan</a>
											<a class="dropdown-item" href="<?php echo base_url('AdminPemesanan/batalkanTransaksi/').$transaksi_data['id_transaksi'];?>"><i class="bi bi-x-square-fill text-danger"></i> Batalkan Pesanan</a>
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
