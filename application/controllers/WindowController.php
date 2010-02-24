<?php
/**
 * @package  * @version  * @author abtris
 */
/**
 * @package  */
class WindowController extends Zend_Controller_Action 
{
     public function addAction()
     {
        $task = $this->_request->getParam('task');
        if (!empty($task)) {
        Model_Items::addItem($task);
        }
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
     }


    public function updateAction()
    {
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
