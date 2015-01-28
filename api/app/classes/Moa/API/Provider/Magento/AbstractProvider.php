<?php
namespace Moa\API\Provider\Magento;

use GuzzleHttp\Client;

/**
 * Abstract API provider for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 */
abstract class AbstractProvider {

    // Custom API Route to Eoa Magento Module
    const MAGE_ROUTE = '/api/rest/eoarestapi';

    protected $_host;
    protected $_store;
    protected $_apiClient;

    public function __construct($config)
    {
        $this->_host        = $config['host'];
        $this->_store       = $config['store'];
        $this->_apiClient   = new Client([
            'base_url' => $this->_host ,
            'defaults' => [
//                'headers' => ['Foo' => 'Bar'],
            // query string required from Magento:
                'query'   => ['type' => 'rest']
//                'auth'    => ['username', 'password'],
//                'proxy'   => 'tcp://localhost:80'
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