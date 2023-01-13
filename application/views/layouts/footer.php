</section>
</div>
</div>
</div>
</div>
<script src="<?= base_url('public/assets/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('public/assets/js/app.js') ?>"></script>
<script src="<?= base_url('public/assets/extensions/jquery/jquery.min.js') ?>"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="<?= base_url('public/assets/js/pages/datatables.js') ?>"></script>
<script src="<?= base_url('node_modules/filepond/dist/filepond.js') ?>"></script>
<script src="<?= base_url('node_modules/jquery-filepond/filepond.jquery.js') ?>"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script>
	$.fn.filepond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFilePoster, FilePondPluginFileEncode, FilePondPluginFileValidateSize, FilePondPluginImageCrop, FilePondPluginImageTransform);
	$('.my-pond').filepond({
		'credits': false,
		'allowMultiple': true,
		'instantUpload': false,
		'maxFiles': 2,
		'labelFileLoading': 'Yoi'
	});
	$('.my-pond')
		.filepond('processFiles')
		.then((files) => {

		});
</script>
</body>

</html>
