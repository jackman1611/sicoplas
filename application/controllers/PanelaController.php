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
     $table="usuarios";
        $this->view->usuarios = $this->_resultados->GetAll($table);	
    }

    public function empresasAction()
    {
       $table="empresas";
        $this->view->empresas = $this->_resultados->GetAll($table);  
    }
    public function formulariousuarioAction()
    {
     

    }

    public function requestadduserAction()
    {
       $this->_helper->layout()->disableLayout();
       $this->_helper->viewRenderer->setNoRender(true);
       $post = $this->getRequest()->getPost();
       if($this->getRequest()->getPost()){
        $table="usuarios";
        $result=$this->_resultados->insertUsario($post,$table);
        // var_dump($result); exit;
        if($result){
            return $this->_redirect('/panela/usuarios');
        }else{
            print '<script language="javaScript">';
            print 'alert(NO SE PUEDE INSERTAR DATOS");';
            print '</script>';

        }
        
       }
    }
}