 <!-- Main component for a primary marketing message or call to action -->
   
 <div class="panel panel-default">
        <div class="panel-heading">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> Listado de Usuarios
  <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a  data-target="#pu_buscar" data-toggle="modal"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>
      <li><a href="#" data-target="#pu_agregar" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
    </ul>
  </div>

</div>
	<div class="panel-body">
          
  		<table class="table table-striped " id="pu_tabla">
			<thead>
    			<tr  id="0">
				<th>
					ID
				</th>
				<th>
					NOMBRE USUARIO
				</th>
				<th>
					TIPO
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



<!-- Agregar -->
<div id="pu_agregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Indicador:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pua_indicador">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Clave:</label>
			<div class="col-sm-10">
		    <input type="password" class="form-control" id="pua_clave">
			
		  </div>
		  </div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Administrador:</label>
			<div class="col-sm-2">
		    <input type="checkbox" class="form-control" id="pua_admin">
			
		  </div>
		</div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="agregarUsuario();" class="btn btn-default">Guardar</button>
      </div>
    </div>

  </div>
</div>

<!-- Editar -->
<div id="pu_editar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Usuario</h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Indicador:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pue_indicador">
				<input type="hidden" value="" id="pu_id" name="pu_id"/>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Clave:</label>
			<div class="col-sm-10">
		    <input type="password" class="form-control" id="pue_clave">
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="usr">Administrador:</label>
			<div class="col-sm-2">
		    <input type="checkbox" class="form-control" id="pue_admin">
			
		  </div>
		</div>
		
		
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="editarUsuario();" class="btn btn-default">Guardar</button>
	<button type="submit" onclick="eliminarUsuario();" class="btn btn-default">Eliminar</button>
        
      </div>
    </div>

  </div>
</div>

<!-- Buscar -->
<div id="pu_buscar" class="modal fade" role="dialog">
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
		    <label class="control-label col-sm-2" for="usr">Indicador:</label>
			<div class="col-sm-10">
			    <input type="text" class="form-control" id="pub_indicador">
			</div>
		  </div>
		
		 
			
	</form>
      </div>
      <div class="modal-footer">
        <button type="submit" onclick="buscarUsuarioFiltro();" class="btn btn-default">Buscar</button>
        
      </div>
    </div>

  </div>
</div>


	

