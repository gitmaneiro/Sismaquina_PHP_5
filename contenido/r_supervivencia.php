<div class="panel panel-default">
        <div class="panel-heading"><p>Probabilidad de Supervivencia vs. Horas de Operación</p></div>
	<div class="panel-body">
         <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Equipo:</label>
			<div class="col-sm-10">
			     <select class="form-control" id="rs_equipo">
					<option value='0'>-- SELECCIONAR --</option>
				   
				    
				  </select>
			</div>
		  </div>
		 
		
		<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">	
		  <button type="button" class="btn btn-default" onclick="graficar_supervivencia();">Graficar</button>
			</div>
		</div>
		</div>		
	</form>
        
      </div>

<div class="panel panel-default">
        <div class="panel-heading"><p>Gráfica Causa de Paro</p></div>
	<div class="panel-body">
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</div>
</div>

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>
