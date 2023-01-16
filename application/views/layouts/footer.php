</section>
</div>
</div>
</div>
</div>
<script src="<?= base_url('public/assets/extensions/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('public/assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('public/assets/js/app.js') ?>"></script>
<script src="<?= base_url('public/assets/extensions/jquery/jquery.min.js') ?>"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url('public/assets/js/pages/datatables.js') ?>"></script>
<script type="text/javascript">
	$(".delete").click(function() {
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-name');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Data dengan nama " + nama + " akan dihapus",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?= base_url('kontakperson/delete/') ?>" + id + "";
			}
		})
	});

	$(".edit").click(function() {
		var idpasien = $(this).attr('data-id');
		window.location.href = "<?= base_url('pasien/edit?id=') ?>" + idpasien + "";
	});
</script>
</body>

</html>
