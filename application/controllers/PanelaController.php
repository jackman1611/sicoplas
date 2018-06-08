<?php

class PanelaController extends Zend_Controller_Action{
	
	public function init(){
       $layout = $this->_helper->layout();
       $layout->setLayout('layout-admin');
    }//init

    public function indexAction(){
         
    }//init

    public function serviciosAction()
    {
    	# code...
    }

    public function usuariosAction()
    {
    	# code...
    }
}