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
        $task = $this->_request->getParam('task');
        //echo "alert('the task \'" . $task . "\' was saved!');";
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
        $out="<select name='items[]' id='items' multiple='multiple'>";
        foreach ($items as $key => $val) {
            $out.="<option value='$key'>$val</option>";
        }
        $out .= "</select>";
        echo $out;
    }

    public function newAction()
    {
        
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
