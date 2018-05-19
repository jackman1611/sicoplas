<?php

class IndexController extends Zend_Controller_Action{

	private $_usur;

    public function init(){
        
        $this->_usur = new Application_Model_SicoplasIndexModel;
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
                echo "USARIO ENCONTRADO";
            } else {
                echo "USARIO NO ENCONTRADO";
                print "<br><a href\"/index/login\">Regresar</a>";
            }
            
        } else {
            echo json_encode(array("id"=>"0","name"=>"NO HAY INFORMACION"));
        }
        
    }
}

