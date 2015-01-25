<?php
namespace Moa\API\Provider;

/**
 * Provider Interface for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 */
interface CustomerProviderInterface {

    /**
     * Start sessions, leave empty if not needed for API provider
     * 
     * @return void
     */
    public function startSession();

    /**
     * @method login
     * @param string $email
     * @param string $password
     * @return array
     */
    public function login($email, $password);

    /**
     * @method logout
     * @return array
     */
    public function logout();

    /**
     * @method register
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @return array
     */
    public function register($firstName, $lastName, $email, $password);

    /**
     * @method getAccount
     * @return array
     */
    public function getAccount();
    
}