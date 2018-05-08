<?php

/**
* 
*/
class Unittest_model extends CI_model{
	
	const TABELA = 'unittest_usuarios';

	function __construct(){
		parent::__construct();
	}

	function ListaUsuarios(){
		$sql = "SELECT * FROM usuarios u, perfil p where p.usuario = u.idusuario";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function CadastraUsuario($nome,$email,$telefone,$nascimento,$cargo,$salario){
		$data = array(
			'nome'=>$nome,
			'email'=>$email,
			'telefone'=>$telefone,
			'nascimento'=>$nascimento,
			'cargo'=>$cargo,
			'salario'=>$salario			
		);

		$insert = $this->db->insert(self::TABELA,$data);

		return $insert;
	}


	function EditaUsuario($id,$nome,$email,$telefone,$nascimento,$cargo,$salario){
		$data = array(
			'nome'=>$nome,
			'email'=>$email,
			'telefone'=>$telefone,
			'nascimento'=>$nascimento,
			'cargo'=>$cargo,
			'salario'=>$salario			
		);

		$this->db->where('idusuario',$id);
		$update = $this->db->update(self::TABELA,$data);

		return $update;
	}

	
}
?>