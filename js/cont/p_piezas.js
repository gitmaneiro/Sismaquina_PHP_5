

	function buscarPieza(pu_id)
	{
		
		$('#pp_id').val(pu_id);
		$.getJSON( "server.php?k=8", { "id": pu_id, "f": "ppo" },function( data ) {

	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  $('#ppe_nombre').val(data[0]['nombre']);
		  $('#ppe_detalles').val(data[0]['descripcion']);  
	          $('#ppe_cantidad').val(data[0]['cantidad']); 		
		  $('#pp_editar').modal('show');
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function buscarPiezaFiltro()
	{
		
		
		  	
		  uTabla.api().ajax.url( 'server.php?k=8&f=ppb&nombre='+$('#ppb_nombre').val()+'&detalles='+$('#ppb_detalles').val()).load();
		

		$('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pp_buscar .close').click();
	          //uTabla.api().ajax.reload(null, false);

		
	}

	function agregarPieza()
	{
		
		
		$.getJSON( "server.php?k=8", { "nombre": $('#ppa_nombre').val(),"detalles": $('#ppa_detalles').val(),"cantidad": $('#ppa_cantidad').val(), "f": "ppa" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pp_agregar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function eliminarPieza()
	{
		
		 strId = $('#pp_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "f": "ppx" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de eliminar: "+data[2]);	
		   }	
		else{ 	
		  alert("Borrado exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pp_editar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function editarPieza()
	{
		
		 strId = $('#pp_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "nombre": $('#ppe_nombre').val(),"detalles": $('#ppe_detalles').val(),"cantidad": $('#ppe_cantidad').val(), "f": "ppe" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pp_editar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}


uTabla = $('#pp_tabla').dataTable({"ajax": "server.php?k=8&f=ppl", "sAjaxDataProp": ""});
	
	$('#pp_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            uTabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		jData = uTabla.fnGetData(this);
	    if(null!=jData)
		buscarPieza(jData[0]);
        }
    } );
