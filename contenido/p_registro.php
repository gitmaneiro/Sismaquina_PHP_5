 <!-- Main component for a primary marketing message or call to action -->
   
 <div class="panel panel-default">
        <div class="panel-heading">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Registro de Fallas de Equipos
  <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a  data-target="#pr_buscar" data-toggle="modal"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
      <li><a href="#" data-target="#pr_agregar" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
    </ul>
  </div>

</div>
	<div class="panel-body">
          
  		<table class="table table-striped " id="pr_tabla">
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
				
			</tr>
			</tbody> 
  		</table>
	</div> 
        
	</div>
      </div>



<!-- Agregar -->
<div id="pr_agregar" class="modal fade" role="dialog">
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
			     <select class="form-control" id="pra_equipo">
					<option>-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Falla:</label>
			<div class="col-sm-10">
            		<div id="pra_divfecha" class="input-group date">
      			<input data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" id="pra_fecha" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>


		

		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Tipo de Falla:</label>
			<div class="col-sm-10">
		    <select class="form-control" id="pra_falla">
					<option>-- SELECCIONAR --</option>
				    
				  </select>
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Observaciones:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pra_observaciones">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="agregarRegistro();" class="btn btn-default">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- Editar -->
<div id="pr_editar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Evento de Falla</h4>
      </div>
<input type="hidden"  id="pr_id">	
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Equipo:</label>
			<div class="col-sm-10">
			     <select class="form-control" id="pre_equipo">
					<option>-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Falla:</label>
			<div class="col-sm-10">
            		<div id="pre_divfecha" class="input-group date">
      			<input data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" id="pre_fecha" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>

		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Tipo de Falla:</label>
			<div class="col-sm-10">
		    <select class="form-control" id="pre_falla">
					<option>-- SELECCIONAR --</option>
				    
				    
				  </select>
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Observaciones:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pre_observaciones">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editarRegistro();" class="btn btn-default">Guardar</button>
	<?//<button type="submit" onclick="eliminarRegistro();" class="btn btn-default">Eliminar</button>?>
        
      </div>
    </div>

  </div>
</div>

<!-- Buscar -->
<div id="pr_buscar" class="modal fade" role="dialog">
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
			     <select class="form-control" id="prb_equipo">
					<option>-- SELECCIONAR --</option>
				   
				    
				  </select>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Fecha de Falla:</label>
			<div class="col-sm-10">
            		<div id="prb_divfecha" class="input-group date">
      			<input data-format="dd/MM/yyyy" type="text" class="form-control" id="prb_fecha" readonly><span class="input-group-addon add-on"><i  data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    			</div>
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Tipo de Falla:</label>
			<div class="col-sm-10">
		    <select class="form-control" id="prb_falla">
					<option>-- SELECCIONAR --</option>
				   
				    
				  </select>
			</div>
		  </div>
			
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="buscarRegistroFiltro();" class="btn btn-default">Buscar</button>
        
      </div>
    </div>

  </div>
</div>


	

