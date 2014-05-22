<?php
namespace Authority\Service\Validation;

interface ValidableInterface
{

    public function with(array $input);

    /**
     * Test if validation passes
     *
     * @return boolean
     */
    public function passes();

    /**
     * Retreive validation errors
     *
     * @return array
     */
    public function errors();

}