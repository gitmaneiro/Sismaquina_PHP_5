function graficar_causa()
  {
     
    rc_equipo_id = $('#rc_equipo').val();
    
      
      
    $.getJSON( "server.php?k=8", { "id": rc_equipo_id, "f": "rc" },function( data ) {
	
	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  
		  
		  
		  
		  
		    $('#container').highcharts({
	chart: {
            type: 'column'
        },
        title: {
            text: $('#rc_equipo :selected').text(),
            x: -20 //center
        },
        subtitle: {
            text: 'CAUSA DE PARO',
            x: -20
        },
        xAxis: {
            categories: data[0]
        },
        yAxis: {
            title: {
                text: 'Nro. Fallas'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Fallas'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: data[1]
    });
		  
		  
		  
		  
		  
		  
		  
		 
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });
      
      
    
  

  }



$.getJSON('server.php?k=101&f=le',function(data){
	    $.each(data, function(id,value){
		$("#rc_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		
	    });
	});