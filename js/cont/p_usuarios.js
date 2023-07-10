

	function buscarUsuario(pu_id)
	{
		
		$('#pu_id').val(pu_id);
		$.getJSON( "server.php?k=8", { "id": pu_id, "f": "puo" },function( data ) {

	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  $('#pue_indicador').val(data[0]['indicador']);
		  $('#pue_clave').val(data[0]['clave']); 
		  
		  if(data[0]['admin']==1)
		      $('#pue_admin').prop('checked', true);
		  else
		    $('#pue_admin').prop('checked', false);
		  
		  if($('#user').val()==data[0]['indicador'])
		    $('#pue_admin').prop('readonly', true);
		  else
		    $('#pue_admin').prop('readonly', false);
		  
		  $('#pu_editar').modal('show');
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function buscarUsuarioFiltro()
	{
		
		
		  	
		  uTabla.api().ajax.url( 'server.php?k=8&f=pub&indicador='+$('#pub_indicador').val()).load();
		

		$('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_buscar .close').click();
	          //uTabla.api().ajax.reload(null, false);

		
	}

	function agregarUsuario()
	{
		admin_val='0';
		if($('#pue_admin').is(":checked"))
		    admin_val='1';
		
		
		$.getJSON( "server.php?k=8", { "indicador": $('#pua_indicador').val(),"clave": $('#pua_clave').val(),"admin": admin_val, "f": "pua" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_agregar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function eliminarUsuario()
	{
		if($('#user').val()==$('#pue_indicador').val())
		  alert('No es posible eliminar el usuario actual');
		else
		{
		  
		  
		 strId = $('#pu_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "f": "pux" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de eliminar: "+data[2]);	
		   }	
		else{ 	
		  alert("Borrado exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_editar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		}
	}

	function editarUsuario()
	{
		admin_val='0';
		if($('#pue_admin').is(":checked"))
		    admin_val='1';
		
		
		 strId = $('#pu_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "indicador": $('#pue_indicador').val(),"clave": $('#pue_clave').val(),"admin": admin_val, "f": "pue" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pu_editar .close').click();
	          uTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}


uTabla = $('#pu_tabla').dataTable({"ajax": "server.php?k=8&f=pul", "sAjaxDataProp": ""});
	
	$('#pu_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            uTabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		jData = uTabla.fnGetData(this);
	    if(null!=jData)
		buscarUsuario(jData[0]);
        }
    } );
