<?php
/**
 * @package backend
 * @version $Id$
 * @author Ladislav Prskavec ladislav@prskavec.net
 * @copyright Ladislav Prskavec (c) 2009
 */
/**
 * @package ##PACKAGE##
 */
class Form_Items extends Zend_Form 
{
       public function init()
       {
           $this->addElement('multiselect', 'items', array(
                'Label' => "Select items",
                'required' => true,
                'multioptions' => Model_Items::getItems()
           ));

           $this->addElement('button', 'additem', array(
                'Label' => "Add new item" 
           ));

           $this->addElement('submit', 'save', array(
                'Label' => "Save",
                'ignored' => true
           ));

       }
}
