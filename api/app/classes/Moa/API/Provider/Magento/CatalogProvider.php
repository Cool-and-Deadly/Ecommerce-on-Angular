<?php
namespace Moa\API\Provider\Magento;

use Moa\API\Provider\CatalogProviderInterface;

/**
 * Magento API provider for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 * @author Adam Timberlake <adam.timberlake@gmail.com>
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
        return 'getProduct';
    }

    /**
     * Returns product information for child SKUs of product (colors, sizes, etc).
     *
     * @method getProductVariations
     * @param int $productId
     * @return array
     */
    public function getProductVariations($productId){
        return 'getProductVariations';
    }

    /**
     * @method getProductOptions
     * @param  string $attributeName
     * @param  bool $processCounts
     * @return array
     */
    public function getProductOptions($attributeName, $processCounts){
        return 'getProductOptions';
    }

    /**
     * @method getCollectionForCache
     * @param callable $infolog
     * @return array
     */
    public function getCollectionForCache(callable $infolog = null){
        return 'getCollectionForCache';
    }

    /**
     * @method getCurrencies
     * @return array
     */
    public function getCurrencies(){
        return 'getCurrencies';
    }

    /**
     * @method getCategories
     * @return array
     */
    public function getCategories(){
        $response = $this->_apiClient->get($this->getProviderUrl('categories'));
        return $response->getBody();
    }



}