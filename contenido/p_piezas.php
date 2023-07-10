 <!-- Main component for a primary marketing message or call to action -->
   
 <div class="panel panel-default">
        <div class="panel-heading">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Listado de Piezas
  <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a  data-target="#pp_buscar" data-toggle="modal"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
      <li><a href="#" data-target="#pp_agregar" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
    </ul>
  </div>

</div>
	<div class="panel-body">
          
  		<table class="table table-striped " id="pp_tabla">
			<thead>
    			<tr  id="0">
				<th>
					ID
				</th>
				<th>
					NOMBRE CORTO
				</th>
				<th>
					DETALLES
				</th>
				<th>
					CANTIDAD DISPONIBLE
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
				
				
			</tr>
			</tbody> 
  		</table>
	</div> 
        
	</div>
      </div>



<!-- Agregar -->
<div id="pp_agregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nueva Pieza</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Código:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="ppa_nombre">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Detalles:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="ppa_detalles">
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Cantidad:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="ppa_cantidad" value="0">
			</div>
		  </div>
		
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="agregarPieza();" class="btn btn-default">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- Editar -->
<div id="pp_editar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Pieza</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Código:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="ppe_nombre">
			    <input type="hidden"  id="pp_id">	
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Detalles:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="ppe_detalles">
			</div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Cantidad:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="ppe_cantidad">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editarPieza();" class="btn btn-default">Guardar</button>
	<button type="submit" onclick="eliminarPieza();" class="btn btn-default">Eliminar</button>
        
      </div>
    </div>

  </div>
</div>

<!-- Buscar -->
<div id="pp_buscar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Pieza</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Código:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="ppb_nombre">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Detalles:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="ppb_detalles">
			</div>
		  </div>
		
		
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="buscarPiezaFiltro();" class="btn btn-default">Buscar</button>
        
      </div>
    </div>

  </div>
</div>


	

