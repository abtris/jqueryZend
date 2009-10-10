<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload ()
    {
        $moduleLoader = new Zend_Application_Module_Autoloader(
        array('namespace' => '' , 'basePath' => APPLICATION_PATH));
        $moduleLoader->addResourceType('controller', 'controllers', 'Controller');
        return $moduleLoader;
    }


    protected function _initView()
    {

        $view= new Zend_View();
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);

    }

}

