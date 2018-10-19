<?php

class PanelaController extends Zend_Controller_Action{
	
    private $_session;
    private $_resultados;

	public function init(){
        $this->_session = new Zend_Session_Namespace("current_session");
        $this->_resultados = new Application_Model_SicoplasIndexModel;
        $layout = $this->_helper->layout();
        $layout->setLayout('layout-admin');
      
        if(empty($this->_session->id)){
            $this->redirect('/index/login');
        }
        $id=$this->_session->id;

        
        $wh="id";
        $table="usuarios";
        $usr = $this->_resultados->GetSpecific($table,$wh,$id);
        foreach ($usr as $key) {
           $fk=$key['rol'];
        }
        
        if($fk!=1){
            $this->redirect('/panele');
        }
    }//init

    public function indexAction(){
        $table="form_servicio";
        $this->view->servicios = $this->_resultados->GetAll($table);  
        $table="vector_form";
        $this->view->vecform = $this->_resultados->GetAll($table);  
        $table="vector";
        $this->view->vectores = $this->_resultados->GetAll($table);
        $table="empresas";
        $this->view->empresas = $this->_resultados->GetAll($table);  
    }//init

    public function usuariosAction()
    {
    $table="usuarios";
    $this->view->usuarios = $this->_resultados->GetAll($table);	
    }

public function detallesservicioAction()
    {
    
        if($this->_hasParam('id')){
            $id = $this->_getParam('id');
            $wh="id";
            $table="form_servicio";
            $this->view->servicios = $this->_resultados->GetSpecific($table,$wh,$id);
            $last= $this->_resultados->GetSpecific($table,$wh,$id);
            foreach ($last as $la) {
               $ide = $la["id_empresa"];
            }
            


            $table="vector";
            $this->view->vectores = $this->_resultados->GetAll($table);

            $table="vector_form";
            $wh = "form";
            $this->view->vecform = $this->_resultados->GetSpecific($table,$wh,$id);

            $table = "empresas";
            $wh = "id";
            $this->view->empresas = $this->_resultados->GetSpecific($table,$wh,$ide);

        }
    }    

 public function vectorAction()
    {
    $table="vector";
    $this->view->vector = $this->_resultados->GetAll($table); 
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

    public function requestaddvecAction()
    {
       $this->_helper->layout()->disableLayout();
       $this->_helper->viewRenderer->setNoRender(true);

       $post = $this->getRequest()->getPost();

       if($this->getRequest()->getPost()){
        $table="vector";
        $result=$this->_resultados->insertVector($post,$table);
        // var_dump($result); exit;
        if($result){
            return $this->_redirect('/panela/vector');
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
            $table="usuarios";
            $wh="id";
            
            $result=$this->_resultados->UpdateUsrSicoplas($post,$table,$wh);
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

    public function requestdeleteusrAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        if($this->_hasParam('id')){
        $id = $this->_getParam('id');
        $table ="usuarios";
        $wh="id";
        $result= $this->_resultados->deleteAll($id,$table,$wh);
        if($result){
            return $this->_redirect('/panela/usuarios');
        }
    }else{
        return $this->_redirect('/panela');
        }
}

   public function requestdeletevecAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        if($this->_hasParam('id')){
        $id = $this->_getParam('id');
        $table ="vector";
        $wh="id";
        $result= $this->_resultados->deleteAll($id,$table,$wh);
        if($result){
            return $this->_redirect('/panela/vector');
        }
    }else{
        return $this->_redirect('/panela');
        }
}


        public function requestdeleteempAction(){
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        if($this->_hasParam('id')){
        $id = $this->_getParam('id');
        $table ="empresas";
        $wh="id";
        $result= $this->_resultados->deleteAll($id,$table,$wh);
        if($result){
            return $this->_redirect('/panela/empresas');
        }
    }else{
        return $this->_redirect('/panela');
        }
    }

        public function nuevoservicioAction()
    {
       $table="empresas";
        $this->view->empresas = $this->_resultados->GetAll($table);
       $table="vector";
        $this->view->vector = $this->_resultados->GetAll($table);

    }

    public function requestaddnuevoservicioAction()
    {
        if($this->getrequest()->getpost()){
            $table="form_servicio";

            $id = $this->_session->id;
            $post =$this->getrequest()->getpost();
            $result =$this->_resultados->insertNuevoServicio($post,$table,$id);
            $last=$this->_resultados->GetLast($table);
            foreach ($last as $la) {
               $idf = $la["id"];
            }

            $table="vector_form";
            foreach ($post["option"] as $key) {
                $tempo = $key;
                $result2=$this->_resultados->insertVector($idf,$tempo,$table);  
            }

            if($result){
                return $this->_redirect('/panela/index');
            }
        }

    }

    public function request()
    {
        $id=$this->_session->id;

        /*todos los datos estan en $POST*/

        /*insertar en la tabla fuerte*/
        /*Sacar el id del servicio que se esta registrando*/
        /*sacar el ultimo registrado con get last*/
        /*insertar en la primera tabla que rompe relacion vector*/
        /*id formulario y id vectores*/

    }

}