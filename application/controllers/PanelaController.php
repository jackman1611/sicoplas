<?php

class PanelaController extends Zend_Controller_Action{
	
    private $_session;
    private $_resultados;

	public function init(){
        $this->_session = new Zend_Session_Namespace("current_session");
        $this->_resultados = new Application_Model_SicoplasIndexModel;
       $layout = $this->_helper->layout();
       $layout->setLayout('layout-admin');
    }//init

    public function indexAction(){
       $table="servicios";
        $this->view->servicios = $this->_resultados->GetAll($table);  
    }//init

    public function serviciosAction()
    {
    	
    }

    public function usuariosAction()
    {
    	
    }

    public function empresasAction()
    {
        
    }
}