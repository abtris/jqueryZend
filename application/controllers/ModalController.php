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

    public function testAction()
    {
        Zend_Debug::dump($this->_request->getParams());
        die();

        $value = $this->_request->getParam('id', 0);        
        if (!empty($value)) {
           Model_Items::addItem($value); 
        }

        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $items = Model_Items::getItems();
        $out="";
        foreach ($items as $key => $val) {
            $out.="<option value='$key'>$val</option>";
        }
        echo $out;
    }


    public function indexAction()
    {
        $this->view->form = $form = new Form_Items();
        $this->view->modalform = $modalform =  new Form_NewItem();
        $modalform->setAction($this->view->url(array("controller"=>"modal","action"=>"test")));
        
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();   
            // form            
            if ($form->isValid($formData)) {
                Zend_Debug::dump($formData);
            } else {
                $form->populate($formData);    
            }
        } 
    }
}
