<?php
/**
*
*/
class Index_controller extends CI_Controller{

	public function index(){
		$this->template->write_view('header','general/header','',FALSE);
		$this->template->write_view('content','general/content','',FALSE);
		$this->template->render();
	}
}

?>
