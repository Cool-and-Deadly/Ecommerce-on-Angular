<?php
namespace Moa\API\Provider;

/**
 * Provider Interface for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 */
interface CatalogProviderInterface {

    /**
     * Returns product information for one product.
     *
     * @method getProduct
     * @param int $productId
     * @return array
     */
    public function getProduct($productId);

    /**
     * @method getProductOptions
     * @param  string $attributeName
     * @param  bool $processCounts
     * @return array
     */
    public function getProductOptions($attributeName, $processCounts);

    /**
     * @method getCollectionForCache
     * @param callable $infolog
     * @return array
     */
    public function getCollectionForCache(callable $infolog = null);

    /**
     * @method getCurrencies
     * @return array
     */
    public function getCurrencies();

    /**
     * @method getCategories
     * @return array
     */
    public function getCategories();

    
}