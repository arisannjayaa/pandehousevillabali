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
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
					</thead>
						<tbody>
						<?php $no = 1; ?>
						<?php foreach ($villa->result_array() as $villa_data){ ?>
						<tr>
							<td><?php echo $no++ ;?></td>
							<td style="width: 70%;"><?php echo $villa_data['nama'] ;?></td>
							<td>
								<div class="d-flex justify-content-start mb-3">
									<a href="<?php echo base_url('AdminVilla/detail_ketersediaan/').$villa_data['id_villa'];?>"><button class="btn btn-primary">Lihat Ketersediaan</button></a>
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
