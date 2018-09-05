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

    public function usuarioseditAction()
    {
        $table="usuarios";
        if($this->_hasParam('id')){
            $id = $this->_getParam('id');
            $wh="id";
            $this->view->usuario = $this->_resultados->GetSpecific($table,$wh,$id);
        }
    }

    public function empresasAction()
    {
       $table="empresas";
        $this->view->empresas = $this->_resultados->GetAll($table);  
    }

    public function empresaseditAction()
    {
        $table="empresas";
        if($this->_hasParam('id')){
            $id = $this->_getParam('id');
            $wh="id";
            $this->view->empresas = $this->_resultados->GetSpecific($table,$wh,$id);
        }
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

     public function requestaddempAction()
    {
       $this->_helper->layout()->disableLayout();
       $this->_helper->viewRenderer->setNoRender(true);

       $post = $this->getRequest()->getPost();

       if($this->getRequest()->getPost()){
        $table="empresas";
        $result=$this->_resultados->insertEmpresa($post,$table);
        // var_dump($result); exit;
        if($result){
            return $this->_redirect('/panela/empresas');
        }else{
            print '<script language="javaScript">';
            print 'alert(NO SE PUEDE INSERTAR DATOS");';
            print '</script>';

        }
    }
       }

    public function requesteditusrAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $post = $this->getRequest()->getPost();

        if($this->getRequest()->getPost()){
            $table="empresas";
            $wh="id";
            $result=$this->_resultados->UpdateUsrSicoplas($post,$table,$wh,$id);
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
    public function requesteditempAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $post = $this->getRequest()->getPost();

        if($this->getRequest()->getPost()){
            $table="empresas";
            $wh="id";
            $result=$this->_resultados->UpdateEmpSicoplas($post,$table,$wh);
            // var_dump($result); exit;
            if($result){
                return $this->_redirect('/panela/empresas');
            }else{
                print '<script language="javaScript">';
                print 'alert(NO SE PUEDE INSERTAR DATOS");';
                print '</script>';

            }
        }
    }
}