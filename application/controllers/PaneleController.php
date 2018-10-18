<?php

class PaneleController extends Zend_Controller_Action{

	private $_session;
	private $_resultados;
	
	public function init(){
		$this->_session = new Zend_Session_Namespace("current_session");
		$this->_resultados = new Application_Model_SicoplasIndexModel;
       $layout = $this->_helper->layout();
       $layout->setLayout('layout-e');

        if(empty($this->_session->id)){
            $this->redirect('/index/login');
        }
    }//init

    public function indexAction(){
      $id=$this->_session->id;
      $wh="id_usr";
      $table="form_servicio";
      $this->view->servicios=$this->_resultados->GetSpecific($table,$wh,$id);
    }//init

    public function requestaddreportAction()
    {
       $this->_helper->layout()->disableLayout();
       $this->_helper->viewRenderer->setNoRender(true);
       $post = $this->getRequest()->getPost();
       if($this->getRequest()->getPost()){
        $table="servicios";
        $result=$this->_resultados->insertUsario($post,$table);
        // var_dump($result); exit;
        if($result){
            return $this->_redirect('/panele/index');
        }else{
            print '<script language="javaScript">';
            print 'alert("NO SE PUEDE INSERTAR DATOS");';
            print '</script>';
}
  }
    }
      }