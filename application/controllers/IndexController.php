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

}

