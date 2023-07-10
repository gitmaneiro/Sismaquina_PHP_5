

	function buscarUsuario(pu_id)
	{
		
		$('#pu_id').val(pe_id);
		$.getJSON( "server.php?k=8", { "id": pe_id, "f": "puo" },function( data ) {

	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  $('#pue_indicador').val(data[0]['indicador']);
		  $('#pue_clave').val(data[0]['clave']);  
		  $('#pu_editar').modal('show');
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function buscarUsuarioFiltro()
	{
		
		
		  	
		  jTable.api().ajax.url( 'server.php?k=8&f=peb&indicador='+$('#pub_indicador').val()+'&clave='+$('#pub_clave').val() ).load();
		

		$('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_buscar .close').click();
	          //jTable.api().ajax.reload(null, false);

		
	}

	function agregarUsuario()
	{
		
		
		$.getJSON( "server.php?k=8", { "indicador": $('#pua_indicador').val(),"clave": $('#pua_clave').val(), "f": "pua" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_agregar .close').click();
	          jTable.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function eliminarUsuario()
	{
		
		 strId = $('#pu_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "f": "pex" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de eliminar: "+data[2]);	
		   }	
		else{ 	
		  alert("Borrado exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_editar .close').click();
	          jTable.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function editarUsuario()
	{
		
		 strId = $('#pu_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "indicador": $('#pue_indicador').val(),"clave": $('#pue_clave').val(), "f": "pee" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_editar .close').click();
	          jTable.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}


jTable = $('#pu_tabla').dataTable({"ajax": "server.php?k=8&f=pul", "sAjaxDataProp": ""});
	
	$('#pu_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            jTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		jData = jTable.fnGetData(this);
	    if(null!=jData)
		buscarUsuario(jData[0]);
        }
    } );
