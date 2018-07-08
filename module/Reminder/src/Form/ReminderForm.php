<?php
namespace Reminder\Form;

use Zend\Form\Form;

class ReminderForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('reminder');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'Email',
            ],
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'text',
            'options' => [
                'label' => 'Username',
            ],
        ]);
          $this->add([
            'name' => 'firstname',
            'type' => 'text',
            'options' => [
                'label' => 'Firstname',
            ],
        ]);
            $this->add([
            'name' => 'lastname',
            'type' => 'text',
            'options' => [
                'label' => 'Lastname',
            ],
        ]);
              $this->add([
            'name' => 'password',
            'type' => 'password',
            'options' => [
                'label' => 'Password',
            ],
        ]);
                $this->add([
            'name' => 'repassword',
            'type' => 'password',
            'options' => [
                'label' => 'Repassword',
            ],
        ]);
                  $this->add([
            'name' => 'gennder',
            'type' => 'radio',
            'options' => [
                'label' => 'Gender',
            ],
        ]);
                    $this->add([
            'name' => 'birthdate',
            'type' => 'text',
            'options' => [
                'label' => 'Birthdate',
            ],
        ]);
                    $this->add([
            'name' => 'country',
            'type' => 'text',
            'options' => [
                'label' => 'Country',
            ],
        ]);
                      $this->add([
            'name' => 'city',
            'type' => 'text',
            'options' => [
                'label' => 'City',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}