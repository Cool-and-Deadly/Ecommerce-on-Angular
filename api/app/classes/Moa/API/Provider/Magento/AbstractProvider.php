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
    const MAGE_ROUTE = '/api/rest/eoarestapi/';
    // Query string required to retrieve data
    const BASE_QUERY = '?type=rest';

    protected $_host;
    protected $_store;
    protected $_baseUrl;
    protected $_apiClient;

    public function __construct($config)
    {
        $this->_host        = $config['host'];
        $this->_store       = $config['store'];
        $this->_apiClient   = new Client();
        $this->_baseUrl     = $this->_host . self::MAGE_ROUTE;
    }


    /**
     * @param $string
     * @return string
     */
    protected function getProviderUrl($string)
    {
        return $this->_baseUrl . $string . self::BASE_QUERY;
    }

}