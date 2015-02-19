<?php
namespace Moa\API\Provider\Magento;

use GuzzleHttp\Client;

/**
 * Abstract Magento API provider for Laravel
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
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
        // client with a query string required from Magento
        $this->_apiClient   = new Client([
            'base_url' => $this->_host ,
            'defaults' => [
                'query'   => ['type' => 'rest']
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