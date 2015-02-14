<?php
namespace Moa\API\Provider\Oxid;

use GuzzleHttp\Client;

/**
 * Abstract API provider for Laravel
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
abstract class AbstractProvider {

    // Custom API Route to Eoa Oxid Module
    const OXID_ROUTE = '/oxrest/eoarestapi';

    protected $_host;
    protected $_store;
    protected $_apiClient;

    public function __construct($config)
    {
        $this->_host        = $config['host'];
        $this->_store       = $config['store'];
        // client with authorization headers required from Oxid Rest api
        $this->_apiClient   = new Client([
            'base_url' => $this->_host ,
            'defaults' => [
                'headers' => [
                    'Authorization' => 'Ox ' . base64_encode($config['user'].':'.$config['pw']),
                    'Content-Type'  => 'application/json; charset=utf-8'
                ],
            ]
        ]);
    }

    /**
     * Start sessions, leave empty if not needed for API provider
     *
     * @return void
     */
    public function startSession()
    {

    }

}