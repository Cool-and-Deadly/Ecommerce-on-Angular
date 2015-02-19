<?php
namespace Moa\API\Provider\Magento;

use Moa\API\Provider\CatalogProviderInterface;

/**
 * Magento API catalog provider for Laravel
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
class CatalogProvider extends AbstractProvider implements CatalogProviderInterface {


    /**
     * Initialize the Mage environment.
     * @constructor
     */
//    public function __construct($config)
//    {
//    }

    /**
     * Returns product information for one product.
     *
     * @method getProduct
     * @param int $productId
     * @return array
     */
    public function getProduct($productId){
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/product/'.$productId );
        return $response->json();
    }

    /**
     * @method getProductOptions
     * @param  string $attributeName
     * @param  bool $processCounts
     * @return array
     * @TODO $processCounts not being used
     */
    public function getProductOptions($attributeName, $processCounts){
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/attributes/'.$attributeName );
        return $response->json();
    }

    /**
     * @method getCollectionForCache
     * @param callable $infolog
     * @return array
     */
    public function getCollectionForCache(callable $infolog = null){
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/products' );
        return $response->json();
    }

    /**
     * @method getCurrencies
     * @return array
     */
    public function getCurrencies(){
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/currencies' );
        return $response->json();
    }

    /**
     * @method getCategories
     * @return array
     */
    public function getCategories(){
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/categories' );
        return $response->json();
    }



}