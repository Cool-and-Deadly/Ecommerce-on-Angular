<?php
namespace Moa\API\Provider\Magento;

use Moa\API\Provider\CustomerProviderInterface;

/**
 * Magento API provider for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 * @author Adam Timberlake <adam.timberlake@gmail.com>
 */
class CustomerProvider extends AbstractProvider implements CustomerProviderInterface  {


    /**
     * Start sessions, leave empty if not needed for API provider
     *
     * @return void
     */
    public function startSession()
    {

    }

    /**
     * @method login
     * @param string $email
     * @param string $password
     * @return array
     */
    public function login($email, $password)
    {
        $body = array(
            'email'     => $email,
            'password'  => $password
        );

        try {

            $request  = $this->_apiClient->createRequest('POST', self::MAGE_ROUTE . '/customer/login', ['json' => array($body)]);
            $response = $this->_apiClient->send($request);

        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }

        return $response->json();
    }

    /**
     * @method logout
     * @return array
     */
    public function logout()
    {
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/customer/logout' );
        return $response->json();
    }

    /**
     * @method register
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @return array
     */
    public function register($firstName, $lastName, $email, $password)
    {
        $body = array(
                'firstName' => $firstName,
                'lastName'  => $lastName,
                'email'     => $email,
                'password'  => $password
                );

        try {

            $request  = $this->_apiClient->createRequest('POST', self::MAGE_ROUTE . '/customer/register', ['json' => array($body)]);
            $response = $this->_apiClient->send($request);

        } catch (RequestException $e) {
            echo $e->getRequest() . "\n";
            if ($e->hasResponse()) {
                echo $e->getResponse() . "\n";
            }
        }

        return $response->json();
    }

    /**
     * @method getAccount
     * @return array
     */
    public function getAccount()
    {
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/customer' );
        return $response->json();
    }


}