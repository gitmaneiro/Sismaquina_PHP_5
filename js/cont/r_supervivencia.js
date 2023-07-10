  function graficar_supervivencia()
  {
     
    rs_equipo_id = $('#rs_equipo').val();
    if(rs_equipo_id==0)
    {
	alert('Seleccione un equipo');
    }
    else
    {
    $.getJSON( "server.php?k=8", { "id": rs_equipo_id, "f": "rs" },function( data ) {
	
	
		  if(data.length==0)
		  {
			
    			alert("Sin datos que mostrar");	
		   }	
		else{ 	
		  
		  
		  
		  
		  
		    $('#container').highcharts({
        title: {
            text: $('#rs_equipo :selected').text(),
            x: -20 //center
        },
        subtitle: {
            text: 'Probabilidad de Supervivencia vs. Horas de Operación',
            x: -20
        },
        xAxis: {
            categories: data[0]
        },
        yAxis: {
            title: {
                text: 'Ps(t)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' ps'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Probabilidad Actual',
            data: data[1]
        }, {
            name: '12 Fallas/año',
            data: data[2]
        }, {
            name: '6 Fallas/año',
            data: data[3]
        }]
    });
		  
		  
		  
		  
		  
		  
		  
		 
		}
		})

		
		.error(function(jqXHR, textStatus, errorThrown) {
        alert('Ocurrió un Error al obtener los datos: \n'+errorThrown); });
      
      
    }
  

  }



$.getJSON('server.php?k=101&f=le',function(data){
	    $.each(data, function(id,value){
		$("#rs_equipo").append('<option value="'+value['id']+'">'+value['nombre_corto']+'</option>');
		
	    });
	});