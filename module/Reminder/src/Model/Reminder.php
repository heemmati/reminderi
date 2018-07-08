<?php
namespace Reminder\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;
class Reminder
{
    public $id;
    public $email;
    public $username;
    public $firstname;
    public $lastname;
    public $bio;
    public $password;
    public $birthdate;
    public $gennder;
    public $country;
    public $city;
 

    public function exchangeArray(array $data)
    {
	        $this->id     = !empty($data['id']) ? $data['id'] : null;
	        $this->email = !empty($data['email']) ? $data['email'] : null;
	        $this->username  = !empty($data['username']) ? $data['username'] : null;

		         $this->firstname     = !empty($data['firstname']) ? $data['firstname'] : null;
		         $this->lastname = !empty($data['lastname']) ? $data['lastname'] : null;
		         $this->bio  = !empty($data['bio']) ? $data['bio'] : null;

				         $this->password     = !empty($data['password']) ? $data['password'] : null;
			             $this->birthdate = !empty($data['birthdate']) ? $data['birthdate'] : null;
			             $this->gennder  = !empty($data['gennder']) ? $data['gennder'] : null;

						         $this->country     = !empty($data['country']) ? $data['country'] : null;
						         $this->city = !empty($data['city']) ? $data['city'] : null;
						     
		    }
	 public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'usernam',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 30,
                    ],
                ],
            ],
        ]);
         $inputFilter->add([
            'name' => 'firstname',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 3,
                        'max' => 30,
                    ],
                ],
            ],
        ]);
          $inputFilter->add([
            'name' => 'lastname',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 3,
                        'max' => 30,
                    ],
                ],
            ],
        ]);
           $inputFilter->add([
            'name' => 'bio',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 5,
                        'max' => 500,
                    ],
                ],
            ],
        ]);
            $inputFilter->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
             $inputFilter->add([
            'name' => 'gennder',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 6,
                    ],
                ],
            ],
        ]);
              $inputFilter->add([
            'name' => 'country',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
            ],
        ]);
               $inputFilter->add([
            'name' => 'city',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
            ],
        ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }	    
}