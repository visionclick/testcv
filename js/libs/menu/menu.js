jQuery(function($) {

	/* highlight current menu group
	------------------------------------------------------------------------- */
	$('#menu-group li[id="group-' + current_group_id + '"]').addClass('current');

	/* global ajax setup
	------------------------------------------------------------------------- */
	$.ajaxSetup({
		type: 'GET',
		datatype: 'json',
		timeout: 20000
	});
	$('#loading').ajaxStart(function() {
		$(this).show();
	});
	$('#loading').ajaxStop(function() {
		$(this).hide();
	});

	/* modal box
	------------------------------------------------------------------------- */
	gbox = {
		defaults: {
			autohide: false,
			buttons: {
				'Close': function() {
					gbox.hide();
				}
			}
		},
		init: function() {
			var winHeight = $(window).height();
			var winWidth = $(window).width();
			var box =
				'<div id="gbox">' +
					'<div id="gbox_content"></div>' +
				'</div>' +
				'<div id="gbox_bg"></div>';

			$('body').append(box);

			$('#gbox').css({
				top: '15%',
				left: winWidth / 2 - $('#gbox').width() / 2
			});

			$('#gbox_close, #gbox_bg').click(gbox.hide);
		},
		show: function(options) {
			var options = $.extend({}, this.defaults, options);
			switch (options.type) {
				case 'ajax':
					$.ajax({
						type: 'GET',
						datatype: 'html',
						url: options.url,
						success: function(data) {
							options.content = data;
							gbox._show(options);
						}
					});
					break;
				default:
					this._show(options);
					break;
			}
		},
		_show: function(options) {
			$('#gbox_footer').remove();
			if (options.buttons) {
				$('#gbox').append('<div id="gbox_footer"></div>');
				$.each(options.buttons, function(k, v) {
					$('<button></button>').text(k).click(v).appendTo('#gbox_footer');
				});
			}

			$('#gbox, #gbox_bg').fadeIn();
			$('#gbox_content').html(options.content);
			$('#gbox_content input:first').focus();
			if (options.autohide) {
				setTimeout(function() {
					gbox.hide();
				}, options.autohide);
			}
		},
		hide: function() {
			$('#gbox').fadeOut(function() {
				$('#gbox_content').html('');
				$('#gbox_footer').remove();
			});
			$('#gbox_bg').fadeOut();
		}
	};
	gbox.init();

	/* same as site_url() in php
	------------------------------------------------------------------------- */
	function site_url(url) {
		return _BASE_URL + 'index.php?act=' + url;
	}

	/* nested sortables
	------------------------------------------------------------------------- */
	var menu_serialized;
	var fixSortable = function() {
		if (!$.browser.msie) return;
		//this is fix for ie
		$('#easymm').NestedSortableDestroy();
		$('#easymm').NestedSortable({
			accept: 'sortable',
			helperclass: 'ns-helper',
			opacity: .8,
			handle: '.ns-title',
			onStop: function() {
				fixSortable();
			},
			onChange: function(serialized) {
				menu_serialized = serialized[0].hash;
				$('#btn-save-menu').attr('disabled', false);
			}
		});
	};
	$('#easymm').NestedSortable({
		accept: 'sortable',
		helperclass: 'ns-helper',
		opacity: .8,
		handle: '.ns-title',
		onStop: function() {
			fixSortable();
		},
		onChange: function(serialized) {
			menu_serialized = serialized[0].hash;
			$('#btn-save-menu').attr('disabled', false);
		}
	});

	/* edit menu
	------------------------------------------------------------------------- */
	$('.edit-menu').live('click', function() {
		var menu_id = $(this).next().next().val();
		var menu_div = $(this).parent().parent();
		gbox.show({
			type: 'ajax',
			url: dominio + 'admin/menus/edit/' + menu_id,
			buttons: {
				'Save': function() {
					$.ajax({
						type: 'POST',
						url: $('#gbox form').attr('action'),
						data: $('#gbox form').serialize(),
						success: function(data) {
							switch (data.status) {
								case 1:
									gbox.hide();
									menu_div.find('.ns-title').html(data.menu.title);
									menu_div.find('.ns-url').html(data.menu.url);
									menu_div.find('.ns-class').html(data.menu.klass);
									break;
								case 2:
									gbox.hide();
									break;
							}
						}
					});
				},
				'Cancel': gbox.hide
			}
		});
		return false;
	});

	/* delete menu
	------------------------------------------------------------------------- */
	$('.delete-menu').live('click', function() {
		var li = $(this).closest('li');
		var param = { id : $(this).next().val() };
		var menu_title = $(this).parent().parent().children('.ns-title').text();
		gbox.show({
			content: '<h2>Eliminar Menu</h2>Estas seguro que quieres eliminar el Menu?<br><b>'
				+ menu_title +
				'</b><br><br>Esto eliminara tambien todos los submenus.',
			buttons: {
				'Yes': function() {
					$.post(dominio + 'admin/menus/delete', param, function(data) {
						if (data.success) {
							gbox.hide();
							li.remove();
						} else {
							gbox.show({
								content: 'Fallo al Eliminar el Menu.'
							});
						}
					});
				},
				'No': gbox.hide
			}
		});
		return false;
	});

	/* add menu
	------------------------------------------------------------------------- */
	$('#form-add-menu').submit(function() {
		if ($('#menu-title').val() == '') {
			$('#menu-title').focus();
		} else {
			var url=$(this).attr('action');
			var data=$(this).serialize();
	
			$.ajax({
				type: 'POST',
				url: url,
				data: data,
				error: function(xhr,err) {

					gbox.show({
						content: 'Error al añadir el Menu. Intentelo de Nuevo',
						autohide: 1000000
					});
				},
				success: function(data) {
					switch (data.status) {
						case 1:
							$('#form-add-menu')[0].reset();
							$('#easymm')
								.append(data.li)
								.SortableAddItem($('#'+data.li_id)[0]);
							break;
						case 2:
							gbox.show({
								content: data.msg,
								autohide: 1000
							});
							break;
						case 3:
							$('#menu-title').val('').focus();
							break;
					}
				}
			});
		}
		return false;
	});

	$('#gbox form').live('submit', function() {
		return false;
	});

	/* add menu group
	------------------------------------------------------------------------- */
	$('#add-group a').click(function() {
		gbox.show({
			type: 'ajax',
			url: $(this).attr('href'),
			buttons: {
				'Save': function() {
					var group_title = $('#menu-group-title').val();
					if (group_title == '') {
						$('#menu-group-title').focus();
					} else {
						//$('#gbox_ok').attr('disabled', true);
						$.ajax({
							type: 'POST',
							url: dominio +'admin/menu_groups/add',
							data: 'title=' + group_title,
							error: function() {
								//$('#gbox_ok').attr('disabled', false);
							},
							success: function(data) {
								//$('#gbox_ok').attr('disabled', false);
								switch (data.status) {
									case 1:
										gbox.hide();
										$('#menu-group').append('<li><a href="' + dominio + 'admin/menus/menu/'+ data.id + '">' + group_title + '</a></li>');
										break;
									case 2:
										$('<span class="error"></span>')
											.text(data.msg)
											.prependTo('#gbox_footer')
											.delay(1000)
											.fadeOut(500, function() {
												$(this).remove();
											});
										break;
									case 3:
										$('#menu-group-title').val('').focus();
										break;
								}
							}
						});
					}
				},
				'Cancel': gbox.hide
			}
		});
		return false;
	});

	/* update menu / save menu position
	------------------------------------------------------------------------- */
	$('#btn-save-menu').attr('disabled', true);
	$('#form-menu').submit(function() {
		$('#btn-save-menu').attr('disabled', true);
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: menu_serialized,
			error: function() {
				$('#btn-save-menu').attr('disabled', false);
				gbox.show({
					content: '<h2>Error</h2>Error al salvar el menu. Por favor intentelo de Nuevo.',
					autohide: 1000
				});
			},
			success: function(data) {
				gbox.show({
					content: '<h2>Success</h2>Posicion del menu guardado',
					autohide: 1000
				});
			}
		});
		return false;
	});

	/* edit group
	------------------------------------------------------------------------- */
	$('#edit-group').click(function() {
		var sgroup = $('#edit-group-input');
		var group_title = sgroup.text();
		sgroup.html('<input value="' + group_title + '">');
		var inputgroup = sgroup.find('input');
		inputgroup.focus().select().keydown(function(e) {
			if (e.which == 13) {
				var title = $(this).val();
				if (title == '') {
					return false;
				}
				$.ajax({
					type: 'POST',
					url: dominio+'admin/menu_groups/edit',
					data: 'id=' + current_group_id + '&title=' + title,
					success: function(data) {
						if (data.success) {
							sgroup.html(title);
							$('#group-' + current_group_id + ' a').text(title);
						}
					}
				});
			}
			if (e.which == 27) {
				sgroup.html(group_title);
			}
		});
		return false;
	});

	/* delete menu group
	------------------------------------------------------------------------- */
	$('#delete-group').click(function() {
		var group_title = $('#menu-group li.current a').text();
		var param = { id : current_group_id };
		gbox.show({
			content: '<h2>Eliminar Gurpo</h2>Estas seguro que quieres eliminar el grupo?<br><b>'
				+ group_title +
				'</b><br><br>Esto eliminara todo el menu del grupo.',
			buttons: {
				'Yes': function() {
					$.post(dominio + 'admin/menu_groups/delete', param, function(data) {
						if (data.success) {
							window.location = dominio+'admin/menus/';
						} else {
							gbox.show({
								content: 'Fallo al eliminar el grupo.'
							});
						}
					});
				},
				'No': gbox.hide
			}
		});
		return false;
	});

	///menus
	$("#main-nav li ul").hide(); // Hide all sub menus
		$("#main-nav li a.current").parent().find("ul").slideToggle("slow"); // Slide down the current menu item's sub menu
		
		$("#main-nav li a.nav-top-item").click( // When a top menu item is clicked...
			function () {
				$(this).parent().siblings().find("ul").slideUp("normal"); // Slide up all sub menus except the one clicked
				$(this).next().slideToggle("normal"); // Slide down the clicked sub menu
				return false;
			}
		);
		
		$("#main-nav li a.no-submenu").click( // When a menu item with no sub menu is clicked...
			function () {
				window.location.href=(this.href); // Just open the link instead of a sub menu
				return false;
			}
		); 

    // Sidebar Accordion Menu Hover Effect:
		
		$("#main-nav li .nav-top-item").hover(
			function () {
				$(this).stop().animate({ paddingRight: "25px" }, 200);
			}, 
			function () {
				$(this).stop().animate({ paddingRight: "15px" });
			}
		);


  /*function mostrarLocalidades(tipo)
{
	if(!tipo) tipo = null;
	if($("#idprovincia option:selected").val())
	{
		var provincia = $("#idprovincia option:selected").val();
		$.post(dominio+'mostrar-localidades.php/',{provincia:provincia, tipo: tipo},function(data){
			if(data)
			{
				$('#tridlocalidad').show();
				$("#idlocalidad option[value!=0]").remove();
				$("#idlocalidad").append(data);
				mostrarZonas();
			}
			else
			{
				$('#tridlocalidad').hide();
				$("#idlocalidad option[value!=0]").remove();
				$('#tridzona').hide();
				$("#idzona option[value!=0]").remove();
			}
		});
	}
}*/
 $('.traerurl').change(function(){
      var valor = $(this).val();

      //console.log(valor);
	switch (valor) {
		case 'paginas':
				$.post(
					dominio+'admin/menus/paginas/',{valor:valor}
					,function(data){
							if(data)
							{
							   if(!$(".page").length){
								 $(".perso").remove();
								 $(".traerurl").parent().next().slideDown('slow').append(data);
					
								}

							}
							else
							{

								//$(".traerurl").next().append(data);
								
							}
				});
			break;
		case 'personalizada':

		var input="<p class='perso'><label for='menu-url'>URL</label><input type='text' name='url' id='menu-url'></p>";	
		
		if(!$(".perso").length){
			$(".traerurl").parent().next().slideDown('slow').append(input);
			$(".page").remove();

		}

			break;

	case 'seleccion':	
		
			 $(".perso").remove();
			 $(".page").remove();
			
		break;		
	}

		//$('.traerurl').trigger('change');
	});    

});