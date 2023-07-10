 <!-- Main component for a primary marketing message or call to action -->
   
 <div class="panel panel-default">
        <div class="panel-heading">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Listado de Fallas
  <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a  data-target="#pf_buscar" data-toggle="modal"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
      <li><a href="#" data-target="#pf_agregar" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
    </ul>
  </div>

</div>
	<div class="panel-body">
          
  		<table class="table table-striped " id="pf_tabla">
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
				
				
			</tr>
			</thead>
			
			<tbody>
			<tr >
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
<div id="pf_agregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nueva Falla</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Nombre corto:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pfa_nombre">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Detalles:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pfa_detalles">
			</div>
		  </div>
		
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="agregarFalla();" class="btn btn-default">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- Editar -->
<div id="pf_editar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Falla</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Nombre corto:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pfe_nombre">
			    <input type="hidden"  id="pf_id">	
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Detalles:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pfe_detalles">
			</div>
		  </div>
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editarFalla();" class="btn btn-default">Guardar</button>
	<button type="submit" onclick="eliminarFalla();" class="btn btn-default">Eliminar</button>
        
      </div>
    </div>

  </div>
</div>

<!-- Buscar -->
<div id="pf_buscar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Falla</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Nombre corto:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pfb_nombre">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Detalles:</label>
			<div class="col-sm-10">
		    <input type="text" class="form-control" id="pfb_detalles">
			</div>
		  </div>
		
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="buscarFallaFiltro();" class="btn btn-default">Buscar</button>
        
      </div>
    </div>

  </div>
</div>


	

