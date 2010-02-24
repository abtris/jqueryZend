<?php
/**
 * Created by IntelliJ IDEA.
 * @author prskavecl
 * @version  * @package  * @filesource
 */
/**
 * @package @@PACKAGE@@
 */
class ModalController extends Zend_Controller_Action
{
    public function indexAction()
    {
        $this->view->form = new Form_Items();
        $this->view->modalform = new Form_NewItem();

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            Zend_Debug::dump($formData);
        }
    }
}
