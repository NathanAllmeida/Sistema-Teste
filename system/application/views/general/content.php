<div class=''>
	  	<div class='card-header'>
  				<h4>Gerenciamento de Usuários</h4>
  			</div>
	<div class="nav nav-tabs" id="tab-usuarios" role="tablist">
		    <a class="nav-item nav-link active" id="nav-tab-listar" data-toggle="tab" href="#tab-content-listar" role="tab" aria-controls="nav-listar">Listar Usuários</a>
		    <a class="nav-item nav-link" id="nav-tab-adicionar" data-toggle="tab" href="#tab-content-adicionar" role="tab" aria-controls="nav-adicionar">Adicionar Usuários</a>		    
  	</div>

  	<div class='tab-content'>

  		<div class='tab-pane active' id='tab-content-listar' style=''>
            <div class='card-body'>
                <table id="tblUsuarios" class="table table-striped table-bordered table-hover display" cellspacing="0">
                    <thead>
                        <tr>                            
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>                                            
                            <th>Telefone</th>                                            
                            <th>Nascimento</th>                                            
                            <th>Cargo</th>                                            
                            <th>Salario</th>                                            
                            <th>Foto</th>                                            
                            <th>Nome Perfil</th>                                            
                            <th>Descrição Perfil</th>                                            
                            <th>Perfil</th>
                            <th>Ação</th>                                                                                       
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>  
  		</div>
  		<div class='tab-pane' id='tab-content-adicionar'>
  			<div class='card-header'>
  				<h6>Cadastro de Usuário</h6>
  			</div>
  			<!-- o prefixo nos id, ad é para adicionar e o ed para editar, apenas para não fazer confusão e poder distinguir-->
  			<form class='form-group' id='ad-form' enctype="multipart/form-data">
  				
		  			
		  			<div class='row'>
		  					<div class='col-md-3'>
		  						<label>Nome</label>  
		  						<input class='form-control' id='ad-nome' name='nome' type='text'>						
			  				</div>
			   				<div class='col-md-3'>
			  					<label>Email</label>
			  					<input class='form-control' id='ad-email' name='email' type='email'>
			  				</div>
			  				<div class='col-md-3'>
			  					<label>Foto de Perfil</label>
			  					<input class='form-control' id='ad-foto' name='foto' type='file'>
			  				</div>
			  				<div class='col-md-3'>
			  					
			  				</div>	   				
			  		</div>
			  		<div class='row'>
			  				<div class='col-md-3'>
			  					<label>Telefone</label>
			  					<input class='form-control' id='ad-telefone' name='telefone' type='number'>
			  				</div>
			   				<div class='col-md-3'>
			  					<label>Nascimento</label>
			  					<input class='form-control' id='ad-nascimento' name='nascimento' type='date'>
			  				</div>
		  					<div class='col-md-3'>
		  						<label>Cargo</label>  
		  						<input class='form-control' id='ad-cargo' name='cargo' type='text'>						
			  				</div>
			   				<div class='col-md-3'>
			  					<label>Salário</label>
			  					<input class='form-control' id='ad-salario' name='salario' type='number'>
			  				</div>
			  				<div class='col-md-3'>
			  					<label>Tipo de perfil</label>
			  					<select class='form-control' name='perfil' id='ad-perfil'>
			  						<option value='adm'>Administrador</option>
			  						<option value='mod'>Moderador</option>
			  						<option value='usu'>Usuário</option>
			  					</select>
			  					<br>
			  				</div>
			  			
			  		</div>
			  		<div class='row'>	  		
			   				<div class='col col-md-6'>
			  					<label>Nome do Perfil</label>
			  					<input class='form-control' id='ad-nome_perfil' name='nome_perfil' type='text'>
			  				</div>
			   				<div class='col col-md-6'>
			  					<label>Descricao</label>
			  					<textarea class='form-control' name='descricao' id='ad-descricao'>
			  						
			  					</textarea>
			  				</div>
			  		</div>
	  		</form>
  				
  		<button class='btn btn-warning' id='ad-btn-limpar'>Limpar Campos</button>
  		<button type='submit' class='btn btn-success' id='ad-btn-enviar'>Enviar</button>


  		</div>
  	</div>

	<div id='ModalEdit' class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Editar</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	        <form class='form-group' id='ed-form' enctype="multipart/form-data">
  				
		  			<input type='hidden' name='id' id='ed-id'>			
		  			<div class='row'>
		  					<div class='col-md-3'>
		  						<label>Nome</label>  
		  						<input class='form-control' id='ed-nome' name='nome' type='text'>						
			  				</div>
			   				<div class='col-md-3'>
			  					<label>Email</label>
			  					<input class='form-control' id='ed-email' name='email' type='email'>
			  				</div>
			  				<div class='col-md-3'>
			  					<label>Nova Foto de Perfil</label>
			  					<input class='form-control' id='ed-foto' name='foto' type='file'>
			  				</div>
			  				<div class='col-md-3'>
			  					<label>Foto de Perfil Atual</label>
			  					<div class='ed-foto'>
									
								</div>
			  				</div>	   				
			  		</div>
			  		<div class='row'>
			  				<div class='col-md-3'>
			  					<label>Telefone</label>
			  					<input class='form-control' id='ed-telefone' name='telefone' type='number'>
			  				</div>
			   				<div class='col-md-3'>
			  					<label>Nascimento</label>
			  					<input class='form-control' id='ed-nascimento' name='nascimento' type='date'>
			  				</div>
		  					<div class='col-md-3'>
		  						<label>Cargo</label>  
		  						<input class='form-control' id='ed-cargo' name='cargo' type='text'>						
			  				</div>
			   				<div class='col-md-3'>
			  					<label>Salário</label>
			  					<input class='form-control' id='ed-salario' name='salario' type='number'>
			  				</div>
			  				<div class='col-md-3'>
			  					<label>Tipo de perfil</label>
			  					<select class='form-control' name='perfil' id='ed-perfil'>
			  						<option value='adm'>Administrador</option>
			  						<option value='mod'>Moderador</option>
			  						<option value='usu'>Usuário</option>
			  					</select>
			  					<br>
			  				</div>
			  			
			  		</div>
			  		<div class='row'>	  		
			   				<div class='col col-md-6'>
			  					<label>Nome do Perfil</label>
			  					<input class='form-control' id='ed-nome_perfil' name='nome_perfil' type='text'>
			  				</div>
			   				<div class='col col-md-6'>
			  					<label>Descricao</label>
			  					<textarea class='form-control' name='descricao' id='ed-descricao'>
			  						
			  					</textarea>
			  				</div>
			  		</div>
	  		</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id='ed-btn-salvar'>Salvar</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div id='ModalDelete' class="modal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Confirmação</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
		  	<input type='hidden' name='id' id='del-id'>			
		  	<p>Deseja realmente deletar esse usuário?</p>		
	  	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" id='del-btn-deletar'>Sim</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
	      </div>
	    </div>
	  </div>
	</div>
  	
</div>

<script src="<?php echo base_url();?>utils/js/usuarios.js"></script>