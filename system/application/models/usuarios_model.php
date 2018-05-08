<?php

/**
* 
*/
class Usuarios_model extends CI_model{
	
	const TABELA = 'usuarios';

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

	function RetornaId($email){
		$result = $this->db->get_where(self::TABELA,array('email'=>$email));
		$id = $result->result_array();

		return $id[0]['idusuario'];
	}

	function AdicionaFoto($id,$file){
		$this->db->where('idusuario',$id);
		$update = $this->db->update(self::TABELA,array('foto'=>$file));

		return $update;
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

	function DeletaUsuario($id){
		$delete = $this->db->delete(self::TABELA,array('idusuario'=>$id));

		return $delete;
	}
}
?>