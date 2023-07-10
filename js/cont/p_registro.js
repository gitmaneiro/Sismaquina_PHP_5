

	function buscarRegistro(pu_id)
	{
		
		$('#pr_id').val(pu_id);
		$.getJSON( "server.php?k=8", { "id": pu_id, "f": "pro" },function( data ) {

	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  $('#pre_equipo').val(data[0]['equipo']);
		  $('#pre_fecha').val(data[0]['fecha_falla']); 
		  $('#pre_falla').val(data[0]['tipo']);  
		  $('#pre_observaciones').val(data[0]['observaciones']); 	
		  $('#pr_editar').modal('show');
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function buscarRegistroFiltro()
	{
		
		
		  	
		  rTabla.api().ajax.url( 'server.php?k=8&f=prb&equipo='+$('#prb_equipo').val()+'&fecha='+$('#prb_fecha').val()+'&falla='+$('#prb_falla').val()).load();
		

		$('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pr_buscar .close').click();
	          //rTabla.api().ajax.reload(null, false);

		
	}

	function agregarRegistro()
	{
		
		
		$.getJSON( "server.php?k=8", { "equipo": $('#pra_equipo').val(),"fecha": $('#pra_fecha').val(), "falla": $('#pra_falla').val(), "observaciones": $('#pra_observaciones').val(), "f": "pra" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pr_agregar .close').click();
	          rTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function eliminarRegistro()
	{
		
		 strId = $('#pr_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "f": "prx" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de eliminar: "+data[2]);	
		   }	
		else{ 	
		  alert("Borrado exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pr_editar .close').click();
	          rTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function editarRegistro()
	{
		
		 strId = $('#pr_id').val();

		$.getJSON( "server.php?k=8", { "id" : strId, "equipo": $('#pre_equipo').val(),"fecha": $('#pre_fecha').val(), "falla": $('#pre_falla').val(), "observaciones": $('#pre_observaciones').val(), "f": "pre" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Registro exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pr_editar .close').click();
	          rTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}


rTabla = $('#pr_tabla').dataTable({"ajax": "server.php?k=8&f=prl", "sAjaxDataProp": ""});
	
	$('#pr_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            rTabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		jData = rTabla.fnGetData(this);
	    if(null!=jData)
		buscarRegistro(jData[0]);
        }
    } );

$.getJSON('server.php?k=101&f=le',function(data){
	    $.each(data, function(id,value){
		$("#pra_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		$("#pre_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		$("#prb_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
	    });
	});

$.getJSON('server.php?k=101&f=lf',function(data){
	    $.each(data, function(id,value){
		$("#pra_falla").append('<option value="'+value['id']+'">'+value['nombre_falla']+'</option>');
		$("#pre_falla").append('<option value="'+value['id']+'">'+value['nombre_falla']+'</option>');
		$("#prb_falla").append('<option value="'+value['id']+'">'+value['nombre_falla']+'</option>');
	    });
	});




//var date_input=$('#datep'); //our date input has the name "date"
var fecha_str = new Date();

	
	$("#pra_divfecha").datetimepicker({
      endDate: fecha_str
    });
	$("#pre_divfecha").datetimepicker({
      endDate: fecha_str
    });
	$("#prb_divfecha").datetimepicker({
      endDate: fecha_str
    });


