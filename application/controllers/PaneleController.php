<?php

class PaneleController extends Zend_Controller_Action{

	private $_session;
	private $_resultados;
	
	public function init(){
		$this->_session = new Zend_Session_Namespace("current_session");
		$this->_resultados = new Application_Model_SicoplasIndexModel;
       $layout = $this->_helper->layout();
       $layout->setLayout('layout-e');
    }//init

    public function indexAction(){
    	$table="servicios";
        $this->view->servicios = $this->_resultados->GetAll($table);
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