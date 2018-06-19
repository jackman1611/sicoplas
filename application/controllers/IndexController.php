<?php

class IndexController extends Zend_Controller_Action{

	private $_usur;
    private $_session;

    public function init(){
        
        $this->_usur = new Application_Model_SicoplasIndexModel;
        $this->_session = new Zend_Session_Namespace("current_session");
    }

    public function indexAction(){
        // $this->view->usuario = $this->_usur->GetAll();
    }

    public function loginAction(){
        
    }

    public function contactoAction(){
        
    }

    public function validarAction()
    {

        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        if ($this->getRequest()->getPost()) {
            $post = $this->getRequest()->getPost();

            $result = $this->_usur->Validar($post);
            if ($result) {
                foreach ($result as $res) {
                     if ($res['rol']==1) {
                        $this->_session->id = $res["id"];
                        $this->_session->nombre = $res["nombre"];
                        $this->redirect("/panela/index");
                        
                } else {
                        $this->_session->id = $res["id"];
                        $this->_session->nombre = $res["nombre"];
                        $this->redirect("/panele/index"); 
                }
                    # code...
                }
               
                
            } else {
                echo "USARIO NO ENCONTRADO";
                print "<br><a href\"/index/login\">Regresar</a>";
            }
            
        } else {
            echo json_encode(array("id"=>"0","name"=>"NO HAY INFORMACION"));
        }
        
    }
}

