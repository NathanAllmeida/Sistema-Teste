<?php

/**
* 
*/
class Perfil_model extends CI_model{
	
	const TABELA = 'perfil';
	function __construct(){
		parent::__construct();
	}

	function CadastraPerfil($idusuario,$perfil,$nome_perfil,$descricao){
		$data = array(
			'usuario'=>$idusuario,
			'perfil'=>$perfil,
			'nome_perfil'=>$nome_perfil,
			'descricao'=>$descricao
			);
		$insert = $this->db->insert(self::TABELA,$data);

		return $insert;
	}
	function EditaPerfil($idusuario,$perfil,$nome_perfil,$descricao){
		$data = array(			
			'perfil'=>$perfil,
			'nome_perfil'=>$nome_perfil,
			'descricao'=>$descricao
			);

		$this->db->where('usuario',$idusuario);
		$update = $this->db->update(self::TABELA,$data);

		return $update;
	}

	function DeletaPerfil($id){
		$delete = $this->db->delete(self::TABELA,array('usuario'=>$id));

		return $delete;
	}
}
?>