<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $form = new Form_Login();
        $this->view->form = $form;
    }

    public function indexAction()
    {
        // action body
    }

    public function authAction()
    {

        var_dump($this->_request->getParams());
        $this->render('index');

    }


}

