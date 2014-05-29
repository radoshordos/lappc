<?php

namespace Authority\Service\Form\Register;

use Authority\Service\Validation\ValidableInterface;
use Authority\Repo\User\UserInterface;

class RegisterForm
{

    /**
     * Form Data
     *
     * @var array
     */
    protected $data;

    /**
     * Validator
     *
     * @var \Cesario\Service\Form\ValidableInterface
     */
    protected $validator;

    /**
     * Session Repository
     *
     * @var \Cesario\Repo\Session\SessionInterface
     */
    protected $user;

    public function __construct(ValidableInterface $validator, UserInterface $user)
    {
        $this->validator = $validator;
        $this->user = $user;

    }

    /**
     * Create a new user
     *
     * @return integer
     */
    public function save(array $input)
    {
        if (!$this->valid($input)) {
            return false;
        }

        return $this->user->store($input);
    }

    /**
     * Return any validation errors
     *
     * @return array
     */
    public function errors()
    {
        return $this->validator->errors();
    }

    /**
     * Test if form validator passes
     *
     * @return boolean
     */
    protected function valid(array $input)
    {

        return $this->validator->with($input)->passes();

    }


}