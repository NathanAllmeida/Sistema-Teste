<?php
/**
* 
*/
class UnitTest_controller extends CI_Controller {

	public function __construct(){	
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('unittest_model');
	}

	public function index(){
		echo "Teste Unitario";

		
		$this->testCadastraUsuarios();
		$this->testEditaUsuarios();
		$this->testListaUsuarios();

	}

	public function testListaUsuarios(){
		$test = $this->unittest_model->ListaUsuarios();
		
		$expected_result = 'is_array';

		//var_dump($expected_result);
		$test_name = "Teste de Função Lista Usuario";

		echo $this->unit->run($test,$expected_result,$test_name);
	}
	public function testCadastraUsuarios(){
		$test = $this->unittest_model->CadastraUsuario('Nathan','almeidanathan96@gmail.com','31975203536','1999-08-07','programador','2500,00');
		
		$expected_result = 'is_bool';

		//var_dump($expected_result);
		$test_name = "Teste de Função Cadastra Usuario";

		echo $this->unit->run($test,$expected_result,$test_name);
	}
	public function testEditaUsuarios(){
		$test = $this->unittest_model->EditaUsuario('1','Nathan','almeidanathan96@gmail.com','31975203536','1999-08-07','programador','2500,00');
		
		$expected_result = 'is_bool';

		//var_dump($expected_result);
		$test_name = "Teste de Função Edita Usuario";

		echo $this->unit->run($test,$expected_result,$test_name);
	}
}

?>
