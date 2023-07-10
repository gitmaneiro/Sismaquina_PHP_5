 <!-- Main component for a primary marketing message or call to action -->
   
 <div class="panel panel-default">
        <div class="panel-heading">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Listado de Equipos
  <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a  data-target="#pe_buscar" data-toggle="modal"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
      <li><a href="#" data-target="#pe_agregar" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
    </ul>
  </div>

</div>
	<div class="panel-body">
          
  		<table class="table table-striped " id="pe_tabla">
			<thead>
    			<tr  id="0">
				<th>
					ID
				</th>
				<th>
					NOMBRE CORTO
				</th>
				<th>
					DESCRIPCIÓN
				</th>
				<th>
					PRODUCCIÓN ASOCIADA
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
<div id="pe_agregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nuevo Equipo</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Nombre corto:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pea_nombre">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Descripción:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pea_descripcion">
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Producción Asociada:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pea_produccion">
			</div>
		  </div>			
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Observaciones:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pea_observaciones">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="agregarEquipo();" class="btn btn-default">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- Editar -->
<div id="pe_editar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Equipo</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Nombre corto:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pee_nombre"><input type="hidden" value="" id="pe_id" name="pe_id"/>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Descripción:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pee_descripcion">
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Producción Asociada:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pee_produccion">
			</div>
		  </div>			
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Observaciones:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pee_observaciones">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editarEquipo();" class="btn btn-default">Guardar</button>
	<button type="submit" onclick="eliminarEquipo();" class="btn btn-default">Eliminar</button>
        
      </div>
    </div>

  </div>
</div>

<!-- Buscar -->
<div id="pe_buscar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Equipo</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Nombre corto:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="peb_nombre">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Descripción:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="peb_descripcion">
			</div>
		  </div>
		
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="buscarEquipoFiltro();" class="btn btn-default">Buscar</button>
        
      </div>
    </div>

  </div>
</div>


	

