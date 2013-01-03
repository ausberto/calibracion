		$(document).ready(function() {
			$(".draggable").draggable();
		});
		function recarga(){
			window.location=window.location;
		}
		function guarda(){
			contenido=$("#anverso").html();
			contenido1=$("#reverso").html();
			$.ajax({
					url: 'ajax',
					type: "POST",
					cache: false,
					data: "anverso="+contenido+"&reverso="+contenido1+"&hs="+$("#hs").val()+'&vs='+$("#vs").val()+'&ms='+$("#ms").val(),
					success: function(data) {
					}
				});
		}
		function resetD(){
			$.ajax({
					url: 'ajax/',
					type: "POST",
					cache: false,
					data: "reset=1",
					success: function(data) {
						recarga();
					}
				});
		}
		function imprime(){
			guarda();
			Shadowbox.open({
				content:    'printpage',
				player:     "iframe",
				title:      'Imprimir',
				height:     430,
				width:      750
			});
		}
		function exportar(){
			guarda();
			window.location='ajax/exportar/1';
		}