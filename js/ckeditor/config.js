/*$(document).ready(function(){
$('textarea#editor').ckeditor();
});*/

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	//console.table(config);
	// config.uiColor = '#AADC6E';
	//config.bodyClass = 'mibody';
	//config.contentsCss ='/css/css-editor.php?idcliente='+idcliente;
	config.contentsCss ='/css/email.css';
	//config.allowedContent=true;
	config.fullPage = false;
	//config.fillEmptyBlocks = true;
	//config.extraAllowedContent = '*{*}';
	config.forcePasteAsPlainText = true;
	config.extraPlugins = 'scayt';
	//config.removePlugins = 'contextmenu,liststyle,tabletools';
	//config["ForcePasteAsPlainText"] = true;
	//config.pasteFromWordPromptCleanup = true;
	config.pasteFromWordRemoveFontStyles = true;
  config.disableNativeSpellChecker = false;
	//config.autoParagraph  =false;
	config.enterMode      = CKEDITOR.ENTER_P;
	config.shiftEnterMode = CKEDITOR.ENTER_P;
	//config.forceEnterMode = true;
	config.entities       = false;
	//config.ignoreEmptyParagraph = true;
	//config.removeFormatAttributes = true;
	//config.protectedSource.push( /<\?[\s\S]*?\?>/g );   // PHP code
	config.format_tags = 'p;h2;h3';
	config.language = 'es'; 
	config.height='250px';
	config.toolbar = [ [ 'Maximize','Source', '-', 'Undo', 'Redo', '-','Cut', 'Copy', 'Paste', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-','Table','Iframe', 'NumberedList', 'BulletedList', 'Outdent', 'Indent', '-', 'Link', 'Unlink',
		'Format','-','TextColor', 'BGColor']

		];
};

CKEDITOR.on('instanceReady', function(ev) {
		ev.editor.on('paste', function(evt) { 
		evt.data.dataValue = evt.data.dataValue.replace(/<br \/>/g,'');
		//evt.data.dataValue = evt.data.dataValue.replace(/<br>/g,'<p>&nbsp;</p>');
		evt.data.dataValue = evt.data.dataValue.replace(/<p><\/p>/g,'');
		//evt.data.dataValue = evt.data.dataValue.replace(/<p>&nbsp;<\/p>/g,'');
		console.log(evt.data.dataValue);
		}, null, null, 9);
});






