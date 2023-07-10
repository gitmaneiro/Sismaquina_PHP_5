

	function buscarCierre(pu_id)
	{
		
		$('#pc_id').val(pu_id);
		peTabla.api().ajax.url( 'server.php?k=8&f=pcp&id='+$('#pc_id').val()+'&id_pieza='+$('#pce_pieza').val()+'&cantidad='+$('#pce_cantidad').val() ).load();
		$.getJSON( "server.php?k=8", { "id": pu_id, "f": "pco" },function( data ) {
	
	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  $('#pce_equipo').val(data[0]['equipo']);
		  $('#pce_fecha').val(data[0]['fecha_falla']); 
		  $('#pce_falla').val(data[0]['tipo']);  
		  $('#pce_observaciones').val(data[0]['observaciones']); 
		  
		  $('#pc_editar').modal('show');
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function buscarCierreFiltro()
	{
		
		
		  alert('hola');	
		  cTabla.api().ajax.url( 'server.php?k=8&f=pcb&equipo='+$('#pcb_equipo').val()+'&fecha='+$('#pcb_fecha').val()+'&falla='+$('#pcb_falla').val()).load();
		

		$('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pc_buscar .close').click();
	          //rTabla.api().ajax.reload(null, false);

		
	}

	function agregarCierre()
	{
		
		
		$.getJSON( "server.php?k=8", { "equipo": $('#pca_equipo').val(),"fecha": $('#pca_fecha').val(), "falla": $('#pca_falla').val(), "observaciones": $('#pca_observaciones').val(), "f": "pca" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Cierre exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pc_agregar .close').click();
	          rTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}
	
	function agregarPieza()
	{
		
		
		$.getJSON( "server.php?k=8", { "id_pieza": $('#pce_pieza').val(),"cantidad": $('#pce_cantidad').val(), "id": $('#pc_id').val(), "f": "pcpa" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		 // peTabla.api().ajax.reload(null, false);
		 	peTabla.api().ajax.url( 'server.php?k=8&f=pcp&id='+$('#pc_id').val()+'&id_pieza='+$('#pce_pieza').val()+'&cantidad='+$('#pce_cantidad').val() ).load();
			alert("Se agregó nueva pieza al registro");
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function eliminarCierre()
	{
		
		 strId = $('#pc_id').val();
		$.getJSON( "server.php?k=8", { "id" : strId, "f": "pcx" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de eliminar: "+data[2]);	
		   }	
		else{ 	
		  alert("Borrado exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pc_editar .close').click();
	          rTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}

	function editarCierre()
	{
		
		 strId = $('#pc_id').val();

		$.getJSON( "server.php?k=8", { "id" : strId, "equipo": $('#pce_equipo').val(),"fecha": $('#pce_cierre').val(), "falla": $('#pce_falla').val(), "observaciones": $('#pce_observaciones').val(), "f": "pce" },function( data ) {

	
		  if(data!="")
		  {
			
    			alert("Ocurrió un error al tratar de guardar: "+data[2]);	
		   }	
		else{ 	
		  alert("Cierre exitoso!!");
		  $('.modal-backdrop').hide(); // for black background
		  $('body').removeClass('modal-open'); // For scroll run
		  $('#pc_editar .close').click();
	          cTabla.api().ajax.reload(null, false);		
			
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });

		
	}


var cTabla = $('#pc_tabla').dataTable({"ajax": "server.php?k=8&f=pcl", "sAjaxDataProp": ""});
	
	$('#pc_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            cTabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		jData = cTabla.fnGetData(this);
	    if(null!=jData)
	      buscarCierre(jData[0]);
        }
    } );

var peTabla = $('#pcpe_tabla').dataTable({"paging":   false, "info":false, "ajax": "server.php?k=8&f=pcp&id=0", "sAjaxDataProp": ""});
	
	$('#pcpe_tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            peTabla.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
		xjData = peTabla.fnGetData(this);
	    //if(null!=jData)
	      //buscarCierre(jData[0]);
        }
    } );
	

$.getJSON('server.php?k=101&f=le',function(data){
	    $.each(data, function(id,value){
		$("#pca_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		$("#pce_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		$("#pcb_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
	    });
	});

$.getJSON('server.php?k=101&f=lf',function(data){
	    $.each(data, function(id,value){
		$("#pca_falla").append('<option value="'+value['id']+'">'+value['nombre_falla']+'</option>');
		$("#pce_falla").append('<option value="'+value['id']+'">'+value['nombre_falla']+'</option>');
		$("#pcb_falla").append('<option value="'+value['id']+'">'+value['nombre_falla']+'</option>');
	    });
	});

$.getJSON('server.php?k=101&f=lp',function(data){
	    $.each(data, function(id,value){
		$("#pce_pieza").append('<option value="'+value['id']+'">'+value['nombre']+'</option>');
		
	    });
	});


//var date_input=$('#datep'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
	language: 'he',
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };

      var fecha_str = new Date();

      $("#pca_divcierre").datetimepicker({
      endDate: fecha_str
    });
	$("#pce_divcierre").datetimepicker({
      endDate: fecha_str
    });
	$("#pcb_divcierre").datetimepicker({
      endDate: fecha_str
    });
	
	

	$('#pce_equipo').prop('disabled', true);
	$('#pce_fecha').prop('disabled', true);


