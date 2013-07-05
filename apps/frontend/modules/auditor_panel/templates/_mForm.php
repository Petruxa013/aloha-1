<style>
	.preview img {
		max-width: 300px;
		max-height: 300px;
	}

	.modal-gallery {
		width: 100%;
		height: 100%;
		margin-top: -50px !important;
	}
</style>
<!-- The file upload form used as target for the file upload widget -->
<form id="fileupload" action="<?php echo url_for('auditor_panel_disapprove_worksheet_audio', $outlet) ?>" method="POST"
      enctype="multipart/form-data">
	<!-- Redirect browsers with JavaScript disabled to the origin page -->
	<noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
	<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
	<div class="container">
	<?php if(($worksheet->getAudioStatus() < 20 && $worksheet->getPhotoStatus() < 20) && !sfConfig::get('app_static_mode')): ?>
		<div class="row fileupload-buttonbar">
			<div class="span9">
				<!-- The fileinput-button span is used to style the file input field as button -->
            <span class="btn btn-success fileinput-button">
                <i class="icon-plus icon-white"></i>
                <span>Добавить файлы...</span>
                <input type="file" name="files[]" multiple>
            </span>
			</div>
			<div class="span3">
				<button type="button" class="btn btn-danger delete">
					<i class="icon-trash icon-white"></i>
					<span>Удалить отмеченные</span>
				</button>

				<input type="checkbox" class="toggle">
				<!-- The loading indicator is shown during file processing -->
				<span class="fileupload-loading"></span>
			</div>
			<!-- The global progress information -->
		</div>
		<?php endif; ?>
		<div class="row pagination-centered">
			<div class="fileupload-progress fade">
				<!-- The global progress bar -->
				<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0"
				     aria-valuemax="100">
					<div class="bar" style="width:0%;"></div>
				</div>
				<!-- The extended global progress information -->
				<div class="progress-extended">&nbsp;</div>
			</div>
		</div>
		<!-- The table listing the files available for upload/download -->
		<table role="presentation" class="table table-striped">
			<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
		</table>
	</div>
</form>
<br>
<?php if(($worksheet->getAudioStatus() < 20 && $worksheet->getPhotoStatus() < 20) && !sfConfig::get('app_static_mode')): ?>
<div class="well container">
	<h3>Информация по загрузке файлов</h3>
	<ul>
		<li>Для изображений подерживаются форматы: <strong>jpeg, png, gif, tif</strong> объемом до <strong>10 МБ</strong></li>
		<li>Для аудио-файлов поддерживаются форматы: <strong>Mp3, Wma, Waw, Mov, Amr (частично), Aif, ogg, 3gp</strong> объемом до <strong>100 МБ</strong></li>
		<li>Вы можете перетащить файлы (<strong>drag &amp; drop</strong>) прямо из папки в область загрузки в броузерах Google Chrome, Mozilla
			Firefox and Apple Safari.
		</li>
		<li>Если загрузчик работает некорректно, то перейдите к <a href="<?php echo url_for('auditor_panel_worksheet_additional_files', $outlet) ?>">старой версии</a></li>
	</ul>
</div>
<?php endif ?>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery modal-fullscreen modal-fullscreen-stretch hide fade" data-filter=":odd" tabindex="-1">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>

		<h3 class="modal-title"></h3>
	</div>
	<div class="modal-body">
		<div class="modal-image"></div>
	</div>
	<div class="modal-footer">
		<a class="btn modal-download" target="_blank">
			<i class="icon-download"></i>
			<span>Загрузить</span>
		</a>
		<a class="btn btn-info modal-prev">
			<i class="icon-arrow-left icon-white"></i>
			<span>Предыдущая</span>
		</a>
		<a class="btn btn-primary modal-next">
			<span>Следующая</span>
			<i class="icon-arrow-right icon-white"></i>
		</a>
	</div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-upload fade">
		<td>
			<span class="preview"></span>
		</td>
		<td>
			<p class="name">{%=file.name%}</p>
			{% if (file.error) { %}
			<div><span class="label label-important">Ошибка</span> {%=file.error%}</div>
			{% } %}
		</td>
		<td>
			<p class="size">{%=o.formatFileSize(file.size)%}</p>
			{% if (!o.files.error) { %}
			<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0"
			     aria-valuemax="100" aria-valuenow="0">
				<div class="bar" style="width:0%;"></div>
			</div>
			{% } %}
		</td>
		<td>
			{% if (!o.files.error && !i && !o.options.autoUpload) { %}
			<button class="btn btn-primary start">
				<i class="icon-upload icon-white"></i>
				<span>Загрузить</span>
			</button>
			{% } %}
			{% if (!i) { %}
			<button class="btn btn-warning cancel">
				<i class="icon-ban-circle icon-white"></i>
				<span>Отменить</span>
			</button>
			{% } %}
		</td>
	</tr>
	{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
	<tr class="template-download fade">
		<td>
        <span class="preview">
            {% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="gallery" download="{%=file.name%}"><img
			                src="{%=file.thumbnail_url%}"></a>
            {% } %}
        </span>
		</td>
		<td>
			<p class="name">
				<a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}"
				   download="{%=file.name%}">{%=file.name%}</a>
			</p>
			{% if (file.error) { %}
			<div><span class="label label-important">Ошибка</span> {%=file.error%}</div>
			{% } %}
		</td>
		<td>
			<span class="size">{%=o.formatFileSize(file.size)%}</span>
		</td>
		<td>
			<?php if(($worksheet->getAudioStatus() < 20 && $worksheet->getPhotoStatus() < 20) && !sfConfig::get('app_static_mode')): ?>
			{% if (!file.error) { %}
			<button class="btn btn-danger delete" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"
			{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
			<i class="icon-trash icon-white"></i>
			<span>Удалить</span>
			</button>
			<input type="checkbox" name="delete" value="1" class="toggle">
			{% } %}
			<?php endif ?>
		</td>
	</tr>
	{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="/js/fileUpload/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/bootstrap-image-gallery.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="/js/fileUpload/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="/js/fileUpload/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="/js/fileUpload/jquery.fileupload-process.js"></script>
<!-- The File Upload image resize plugin -->
<script src="/js/fileUpload/jquery.fileupload-resize.js"></script>
<!-- The File Upload validation plugin -->
<script src="/js/fileUpload/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="/js/fileUpload/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script type="text/javascript">
	$(function () {
		'use strict';

		// Initialize the jQuery File Upload widget:
		$('#fileupload').fileupload({
			// Uncomment the following to send cross-domain cookies:
			autoUpload: true,
			singleFileUploads: false,
			url: '<?php echo url_for('@cs_attachable_m_file?object_id=' . $form->getObject()->getId().'&table='.get_class($form->getObject())) ?>',
		});

		// Load existing files:
		$('#fileupload').addClass('fileupload-processing');
		$.ajax({
			// Uncomment the following to send cross-domain cookies:
			//xhrFields: {withCredentials: true},
			url: $('#fileupload').fileupload('option', 'url'),
			dataType: 'json',
			context: $('#fileupload')[0]
		}).always(function (result) {
					$(this).removeClass('fileupload-processing');
				}).done(function (result) {
					$(this).fileupload('option', 'done')
							.call(this, null, {result: result});
				});
	});
</script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]>
<script src="/js/fileUpload/cors/jquery.xdr-transport.js"></script><![endif]-->
