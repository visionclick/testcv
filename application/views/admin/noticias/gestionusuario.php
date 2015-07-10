<form enctype="multipart/form-data" action="<?=site_url('admin/noticias/guardarUsuario')?>" method="post">
<?/*Mostramos el formulario*/?>
<div class="content-box ">
		
	<div class="content-box-header">					
		<h3><?=($usuario->id ? "Edición de usuario $usuario->nombre" : "Nuevo usuario") ?></h3>					
	</div> <!-- End .content-box-header -->				
	<div class="content-box-content">					
		<div class="tab-content default-tab">

			<input type="hidden" name="idusuario" value="<?=$usuario->id?>" />
			<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->		
				<p>
					<div>
					<label>Nombre del usuario</label>
					<input class="text-input medium-input" type="text" id="nombre" name="nombre" value="<?=$usuario->nombre?>" placeholder="Campo obligatorio" />
					</div>
				</p>
				<p>
					<div>
					<label>Descripción del Usuario</label>
					<textarea  class="text-input textarea" id="textoss" name="description" cols="79" rows="8"><?=$usuario->description?></textarea>
					</div>
				</p>

				<p>
					<label>Foto Categoría</label>
					<?
					
					   if(file_exists($foto->ruta))
						{?>
							<p><img style="max-width:150px" src="<?=site_url($foto->ruta)?>" /></p>
							<input type="hidden" name="idfoto" value="<?=$foto->id?>" />
						<?}?>
					
					<input type="file" name="imagen">
					
				</p>

				<p>
					<input class="button" type="submit" name="guardar" value="Guardar" />
					<input class="button botones" name="volver" type="submit" value="Guardar y Volver" />
					
				</p>
				<?if ($usuario->id){?>
					<input type="hidden" name="id" value="<?=$usuario->id?>" />
				<?}?>
			</fieldset>	

			<div class="clear"></div><!-- End .clear -->

		</div>
	</div>
</div>
<script>
$(document).ready(function(event){


var name = 'textoss';
//var iframe = editor.getFrame();

//CKEDITOR.config.contentsCss = '<?=site_url('css/style.css')?>';
CKEDITOR.config.forcePasteAsPlainText = true;
CKEDITOR.config["ForcePasteAsPlainText"] = true;
//CKEDITOR.config.pasteFromWordPromptCleanup = true;
CKEDITOR.config.pasteFromWordRemoveFontStyles = true;
//CKEDITOR.config.autoParagraph=true;

CKEDITOR.config.enterMode = CKEDITOR.ENTER_P;
CKEDITOR.config.shiftEnterMode= CKEDITOR.ENTER_P;
CKEDITOR.config.ignoreEmptyParagraph = true;
CKEDITOR.config.removeFormatAttributes = true;

//CKEDITOR.config.protectedSource.push( /<\?[\s\S]*?\?>/g );   // PHP code
CKEDITOR.config.format_tags = 'h3;h4;p';

CKEDITOR.config.language = 'es';
//CKEDITOR.config.uiColor = '#eee';
CKEDITOR.config.extraPlugins = 'mediaembed'; 

CKEDITOR.replace(name,
{
	
	toolbar : [ [ 'Source', '-', 'Cut', 'Copy', 'Paste', '-', 'TextColor', 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', 'Outdent', 'Indent', '-', 'Link', 'Unlink', 'Anchor', '-' ],
	['Styles', 'Format', 'Font', 'FontSize', '-', 'Image', 'Flash', 'Table', 'HorizontalRule']
	 ],
	height:250,
	width:'100%',
	//filebrowserBrowseUrl : dominio + 'js/filemanager/index.php'
   filebrowserBrowseUrl : dominio + 'js/ckfinder/ckfinder.html',
   filebrowserImageBrowseUrl : dominio + 'js/ckfinder/ckfinder.html?type=Images',
   filebrowserFlashBrowseUrl : dominio + 'js/ckfinder/ckfinder.html?type=Flash',
   filebrowserUploadUrl : dominio + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
   filebrowserImageUploadUrl: dominio + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
   filebrowserFlashUploadUrl : dominio + 'js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',


});


});
</script>     
	

</form>
<div class="clear"></div><!-- End .clear -->