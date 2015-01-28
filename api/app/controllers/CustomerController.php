<?php

class CustomerController extends APICustomerController {

    public function login() {

        $email    = Input::get('email');
        $password = Input::get('password');

        return $this->_customerProvider->login($email, $password);

    }

    public function logout() {
        return $this->_customerProvider->logout();
    }

    public function register()
    {
        $firstName = Input::get('firstName');
        $lastName  = Input::get('lastName');
        $email     = Input::get('email');
        $password  = Input::get('password');

        return $this->_customerProvider->register($firstName, $lastName, $email, $password);
    }

    public function getAccount()
    {
        return $this->_customerProvider->getAccount();
    }

}