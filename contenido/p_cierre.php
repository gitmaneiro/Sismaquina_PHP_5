 <!-- Main component for a primary marketing message or call to action -->
   
 <div class="panel panel-default">
        <div class="panel-heading">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Cierre de Fallas de Equipos
  <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a  data-target="#pc_buscar" data-toggle="modal"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
     
    </ul>
  </div>

</div>
	<div class="panel-body">
          
  		<table class="table table-striped " id="pc_tabla">
			<thead>
    			<tr  id="0">
				<th>
					ID
				</th>
				<th>
					EQUIPO
				</th>
				<th>
					FECHA/HORA FALLA
				</th>
				<th>
					FECHA/HORA DE CIERRE
				</th>
				<th>
					TIPO DE FALLA
				</th>
				<th>
					OBSERVACIONES
				</th>
				
			</tr>
			</thead>
			
			<tbody>
			<tr >
				<td>
					
 				</td>
				<td>
					
 				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				<td>
					
				</td>
				
			</tr>
			</tbody> 
  		</table>
	</div> 
        
	</div>
      </div>



<!-- Agregar -->
<div id="pc_agregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nuevo Evento de Falla</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Equipo:</label>
			<div class="col-sm-10">
			     <select class="form-control" id="pca_equipo">
					<option value="0">-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Falla:</label>
			<div class="col-sm-10">
            		<div id="pca_divfecha" class="input-group date">
      			<input data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" id="pca_fecha" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>

		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Cierre:</label>
			<div class="col-sm-10">
            		<div id="pca_divcierre" class="input-group date">
      			<input data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" id="pca_cierre" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>	
		

		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Tipo de Falla:</label>
			<div class="col-sm-10">
		    <select class="form-control" id="pca_falla">
					<option value="0">-- SELECCIONAR --</option>
				    
				  </select>
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Observaciones:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pca_observaciones">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="agregarCierre();" class="btn btn-default">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- Editar -->
<div id="pc_editar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cerrar Evento de Falla</h4>
      </div>
<input type="hidden"  id="pc_id">	
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Equipo:</label>
			<div class="col-sm-10">
			     <select class="form-control" id="pce_equipo" onlyread>
					<option value="0">-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Falla:</label>
			<div class="col-sm-10">
            		<div id="pce_divfecha" class="input-group date">
      			<input data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" id="pce_fecha" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>

		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Cierre:</label>
			<div class="col-sm-10">
            		<div id="pce_divcierre" class="input-group date">
      			<input data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" id="pce_cierre" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>	

		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Tipo de Falla:</label>
			<div class="col-sm-10">
		    <select class="form-control" id="pce_falla">
					<option value="0">-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Observaciones:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pce_observaciones">
			</div>
		  </div>
		 
		
<div class="panel panel-default col-sm-12">
<div class="panel-heading">
Agregar Piezas
</div>

<div class="panel-body">
  
<div class="col-sm-4">
    <div class="form-group">
		    <label class="control-label col-sm-4" for="usr">Pieza:</label>
			<div class="col-sm-8">
			     <select class="form-control" id="pce_pieza">
					<option value="0">-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-4" for="usr">Cantidad:</label>
			<div class="col-sm-8">
		    <input type="text" class="form-control" id="pce_cantidad">
			</div>
		  </div>
		   <label class="control-label col-sm-4" for="usr"></label>
		  <div class="col-sm-8"> 
		    <button type="button"   onclick="agregarPieza();" class="btn btn-default">Agregar</button>
		  </div>
</div>
<div class=" col-sm-8">

    <table class="table table-striped" id="pcpe_tabla" widht="100%">
			<thead>
    			<tr  id="0">
				<th>
					ID
				</th>
				<th>
					PIEZA
				</th>
				<th>
					CANTIDAD
				</th>
				
				
			</tr>
			</thead>
			
			<tbody>
			<tr >
				<td>
					
 				</td>
				<td>
					
 				</td>
				<td>
					
				</td>
				
				
			</tr>
			</tbody> 
  		</table>
 
</div>
</div>
</div>
<br><br>
	
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editarCierre();" class="btn btn-default">Guardar</button>
	<?//<button type="submit" onclick="eliminarCierre();" class="btn btn-default">Eliminar</button>?>
        
      </div>
    </div>

  </div>
</div>

<!-- Buscar -->
<div id="pc_buscar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Evento de Falla</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Equipo:</label>
			<div class="col-sm-10">
			     <select class="form-control" id="pcb_equipo">
					<option>-- SELECCIONAR --</option>
				   
				    
				  </select>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Falla:</label>
			<div class="col-sm-10">
            		<div class="input-group date">
      			<input type="text" class="form-control" id="pcb_fecha"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    			</div>
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Tipo de Falla:</label>
			<div class="col-sm-10">
		    <select class="form-control" id="pcb_falla">
					<option>-- SELECCIONAR --</option>
				   
				    
				  </select>
			</div>
		  </div>
			
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="buscarCierreFiltro();" class="btn btn-default">Buscar</button>
        
      </div>
    </div>

  </div>
</div>


	

