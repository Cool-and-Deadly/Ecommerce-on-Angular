<?php
namespace Moa\API\Provider\Oxid;

use Moa\API\Provider\CatalogProviderInterface;

/**
 * Oxid API provider for Laravel
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
class CatalogProvider extends AbstractProvider implements CatalogProviderInterface {


    /**
     * Returns product information for one product.
     *
     * @method getProduct
     * @param int $productId
     * @return array
     */
    public function getProduct($productId){
        $response = $this->_apiClient->get( self::OXID_ROUTE . '/product/'.$productId );
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
        // special condition for manufacturers (in Oxid sample data)
        // as they are no variants, but product attributes
        if( $attributeName!=='manufacturer' ){
            $response = $this->_apiClient->get( self::OXID_ROUTE . '/attributes/'.$attributeName );
        }else{
            $response = $this->_apiClient->get( self::OXID_ROUTE . '/manufacturers');
        }
        return $response->json();
    }

    /**
     * @method getCollectionForCache
     * @param callable $infolog
     * @return array
     */
    public function getCollectionForCache(callable $infolog = null){
        $response = $this->_apiClient->get( self::OXID_ROUTE . '/products' );
        return $response->json();
    }

    /**
     * @method getCurrencies
     * @return array
     */
    public function getCurrencies(){
        $response = $this->_apiClient->get( self::OXID_ROUTE . '/currencies' );
        return $response->json();
    }

    /**
     * @method getCategories
     * @return array
     */
    public function getCategories(){
        $response = $this->_apiClient->get( self::OXID_ROUTE . '/categories' );
        return $response->json();
    }



}