<?php

class PaneleController extends Zend_Controller_Action{
	
	public function init(){
       $layout = $this->_helper->layout();
       $layout->setLayout('layout-e');
    }//init

    public function indexAction(){
         
    }//init
}