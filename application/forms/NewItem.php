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
class Form_NewItem extends Zend_Form
{
       public function init()
       {
           $this->addElement('text', 'value', array(
                'Label' => "New Item",
           ));

           $this->addElement('submit', 'add', array(
                'Label' => "Add"
           ));

       }
}