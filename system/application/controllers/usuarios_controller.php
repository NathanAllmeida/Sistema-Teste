<?php 

class Usuarios_controller extends CI_Controller {

	public function index(){

	}

	public function ListarUsuarios(){
		$this->load->model('usuarios_model');
		$result = $this->usuarios_model->ListaUsuarios();
		
		echo json_encode(array('data'=>$result));

	}

	public function CadastrarUsuario(){
		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$telefone = $this->input->post('telefone');
		$nascimento = $this->input->post('nascimento');
		$cargo = $this->input->post('cargo');
		$salario = $this->input->post('salario');
		$perfil = $this->input->post('perfil');
		$nome_perfil = $this->input->post('nome_perfil');
		$descricao = $this->input->post('descricao');	


		$this->load->model('usuarios_model');
		$result_u = $this->usuarios_model->CadastraUsuario($nome,$email,$telefone,$nascimento,$cargo,$salario);
		$id = $this->usuarios_model->RetornaId($email);

		if ($result_u) {
			$this->load->model('perfil_model');
			$result_p = $this->perfil_model->CadastraPerfil($id,$perfil,$nome_perfil,$descricao);

			if ($result_p) {
				echo json_encode(array('tipo'=>'success','usuario'=>$id));
			}else{
				echo json_encode(array('tipo'=>'error_p'));
			}			
		}else{
			echo json_encode(array('tipo'=>'error_u'));
		}
	}

	public function AdicionarFoto(){

		$id = $this->input->post('usuario');
		$email = $this->input->post('email');
		$imagem = $_FILES['foto'];

		$tipo = explode('/',$_FILES['foto']['type']);
		$name_file =  $id."".trim(str_replace(" ","",date('dmYHis'))).".".$tipo[1];
		$config = array(
			'upload_path' => './files/photos/',	
			'allowed_types' => 'jpg|png|gif|jpeg',
			'file_name' => $name_file,		
		);

		$this->load->library('upload');
		$this->upload->initialize($config);

		$this->load->model('usuarios_model');		
		$result = $this->usuarios_model->AdicionaFoto($id,$name_file);

		if ($this->upload->do_upload('foto')) {

			if ($result) {
				echo json_encode(array('tipo'=>'success'));
			}else{
				echo json_encode(array('tipo'=>'error'));
			}
			
		}else{
			 echo $this->upload->display_errors();
		}

	}

	public function EditarUsuario(){
		$id = $this->input->post('id');
		$nome = $this->input->post('nome');
		$email = $this->input->post('email');
		$telefone = $this->input->post('telefone');
		$nascimento = $this->input->post('nascimento');
		$cargo = $this->input->post('cargo');
		$salario = $this->input->post('salario');
		$perfil = $this->input->post('perfil');
		$nome_perfil = $this->input->post('nome_perfil');
		$descricao = $this->input->post('descricao');	

		$this->load->model('usuarios_model');
		$result_u = $this->usuarios_model->EditaUsuario($id,$nome,$email,$telefone,$nascimento,$cargo,$salario);

		if ($result_u) {
			$this->load->model('perfil_model');
			$result_p = $this->perfil_model->EditaPerfil($id,$perfil,$nome_perfil,$descricao);

			if ($result_p) {
				echo json_encode(array('tipo'=>'success','usuario'=>$id));
			}else{
				echo json_encode(array('tipo'=>'error_p'));
			}			
		}else{
			echo json_encode(array('tipo'=>'error_u'));
		}

	}

	public function EditarFoto(){
		$id = $this->input->post('usuario');
		$email = $this->input->post('email');
		$imagem = $_FILES['foto'];

		$tipo = explode('/',$_FILES['foto']['type']);
		$name_file =  $id."".$id.".".$tipo[1];
		$config = array(
			'upload_path' => './files/photos/',	
			'allowed_types' => 'jpg|png|gif|jpeg',
			'file_name' => $name_file,		
		);

		$this->load->library('upload');
		$this->upload->initialize($config);

		$this->load->model('usuarios_model');		
		$result = $this->usuarios_model->AdicionaFoto($id,$name_file);

		if ($this->upload->do_upload('foto')) {

			if ($result) {
				echo json_encode(array('tipo'=>'success'));
			}else{
				echo json_encode(array('tipo'=>'error'));
			}
			
		}else{
			 echo $this->upload->display_errors();
		}
	}

	public function DeletarUsuario(){
		$id = $this->input->post('id');


		$this->load->model('perfil_model');
		$result_p = $this->perfil_model->DeletaPerfil($id);


		if ($result_p) {			
			$this->load->model('usuarios_model');
			$result_u = $this->usuarios_model->DeletaUsuario($id);

			if ($result_u) {
				echo json_encode(array('tipo'=>'success'));
			}else{
				echo json_encode(array('tipo'=>'error_u'));
			}			
		}else{
			echo json_encode(array('tipo'=>'error_p'));
		}	
	}



}

?>
