<?php
/**
 * @package backend
 * @version $Id$
 * @author Ladislav Prskavec ladislav@prskavec.net
 * @copyright Ladislav Prskavec (c) 2009
 *
 */
/**
 * Login Form
 * @uses Zend_Form
 * @package backend
 */
class Form_Login extends Zend_Form
{
 public function __construct($options = null) {
        parent::__construct($options);
        
        //$this->setOptions(array("onsubmit"=>"document.getElementById('ajax').style.display = 'block'; document.getElementById('submitbutton').disabled=true"));
        $this->setAttrib('enctype', 'multipart/form-data');
        
        $f=array();
        $this->setName('login');

        $name = new Zend_Form_Element_Text('username');
        $name->setLabel('Username')
                ->setAttrib('size', 50)
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $f[]=$name;

        $pass = new Zend_Form_Element_Password('password');
        $pass->setLabel('Password')
                ->setAttrib('size', 30)
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $f[]=$pass;
    
        $hash = new Zend_Form_Element_Hash('hash','csrf_token', array('salt' => 'wiT93nUb90sENd:'));
        $hash->setAutoInsertNotEmptyValidator(false);
        $f[] = $hash;
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id','submitbutton');
        $submit->setLabel('Login');
        $f[]=$submit;
        
        $this->addElements($f);

 }
}

