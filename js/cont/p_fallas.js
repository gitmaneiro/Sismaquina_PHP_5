

	function buscarFalla(pu_id)
	{
		
		$('#pf_id').val(pu_id);
		$.getJSON( "server.php?k=8", { "id": pu_id, "f": "pfo" },function( data ) {

	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  $('#pfe_nombre').val(data[0]['nombre_falla']);
		  $('#pfe_detalles').val(data[0]['detalles']);  
		  $('#pf_editar').modal('show');
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function buscarFallaFiltro()
	{
		
		
		  	
		  uTabla.api().ajax.url( 'server.php?k=8&f=pfb&nombre_falla='+$('#pfb_nombre').val()+'&detalles='+$('#pfb_detalles').val()).load();
		

		$('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pf_buscar .close').click();
	          //uTabla.api().ajax.reload(null, false);

		
	}

	function agregarFalla()
	{
		
		
		$.getJSON( "server.php?k=8", { "nombre_falla": $('#pfa_nombre').val(),"detalles": $('#pfa_detalles').val(), "f": "pfa" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pf_agregar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function eliminarFalla()
	{
		
		 strId = $('#pf_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "f": "pfx" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de eliminar: "+data[2]);	
		   }	
		else{ 	
		  alert("Borrado exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pf_editar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function editarFalla()
	{
		
		 strId = $('#pf_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "nombre_falla": $('#pfe_nombre').val(),"detalles": $('#pfe_detalles').val(), "f": "pfe" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pf_editar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}


uTabla = $('#pf_tabla').dataTable({"ajax": "server.php?k=8&f=pfl", "sAjaxDataProp": ""});
	
	$('#pf_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            uTabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		jData = uTabla.fnGetData(this);
	    if(null!=jData)
		buscarFalla(jData[0]);
        }
    } );
