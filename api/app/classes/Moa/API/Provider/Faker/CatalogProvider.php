<?php
namespace Moa\API\Provider\Faker;

use Moa\API\Provider\CatalogProviderInterface;

/**
 * TestProvider for Laravel
 *
 * This class is used to measure the performance of the products collection.
 * It makes use of the Faker library to create dummy data.
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
class CatalogProvider extends AbstractProvider implements CatalogProviderInterface {


    /**
     * Size settings for product collection
     */
    const PRODUCTS_COUNT    = 100000;  // size of product collection
    const CATEGORY_COUNT    = 10;
    const SUBCATEGORY_COUNT = 4;

    /**
     * Static dummy arrays for categories, and color & manufacturer attributes
     */

    private static $_CAT_IDS    = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

    private static $_COLORS     = array(
        'black',    'maroon',   'green',    'navy',     'olive',
        'purple',   'teal',     'lime',     'blue',     'silver',
        'gray',     'yellow',   'fuchsia',  'aqua',     'white',
        'red',      'grey',     'violet',   'pink'
    );

    private static $_MANUFACTURERS = array(
        'HTC',              'Samsung',     'Apple',    'Technics',     'Panasonic',
        'Pioneer',          'Senheiser',   'Serato',   'Akai',         'Allen & Heath',
        'Behringer',        'Casio',       'Denon',    'Gemini',       'Korg',
        'Native Instruments','Novation',   'Numark',   'Philips',      'Reloop',
        'Stanton',          'Vestax',       'Alesis',   'Icon',         'LD Systems',
        'Phonic',           'Presonus',     'Roland',   'Soundcraft',   'Yamaha'
    );

    /**
     * Returns static product information for one product.
     *
     * Product is in NO relation to the referenced product
     * from the getCollectionForCache() function.
     * It has no function and is just for testing purposes.
     *
     * @method getProduct
     * @param int $productId
     * @return array
     */
    public function getProduct($productId){

        $name = 'Static product which only servers testing purposes';

        return array(
            'id'            => (int) $productId,
            'sku'           => $this->_createIdent($name),
            'name'          => $name,
            'type'          => 'simple',
            'quantity'      => $this->_faker->randomNumber(),
            'friendUrl'     => null,
            'price'         => (float) 123.45,
            'colour'        => 1,
            'manufacturer'  => 8,
            'description'   => $this->_faker->text(),
            'largeImage'    => $this->_faker->imageUrl('400', '300', 'technics'),
            'similar'       => '',
            'gallery'       => array(),
            'products'      => array(),
            'models'        => array()
        );

        return $response->json();
    }

    /**
     * Retrieves the manufacturer & color attribute arrays from the static private variables.
     * These arrays are needed for filtering the products collection.
     *
     * @method getProductOptions
     * @param  string $attributeName
     * @param  bool $processCounts
     * @return array
     * @TODO $processCounts not being used
     */
    public function getProductOptions($attributeName, $processCounts){

        switch($attributeName){
            case 'manufacturer':
                $options = self::$_MANUFACTURERS;
                break;
            case 'color':
                $options = self::$_COLORS;
                break;
            default:
                return json_encode(array());
        }

        $response = array();
        foreach ($options as $idx=>$option) {
            $current = array(
                'id'    => (int) $idx+1,
                'label' => $option
            );
            $response[] = $current;
        }

        return json_encode($response);
    }

    /**
     * Retrieves a random generated products collection with dummy data from the Faker library.
     * It's purpose is to test the performance and filtering of the collection.
     * The collection size can be set by the class constant PRODUCTS_COUNT
     *
     * @method getCollectionForCache
     * @param callable $infolog
     * @return array
     */
    public function getCollectionForCache(callable $infolog = null){
        $response = array();

        for ($i = 0; $i < self::PRODUCTS_COUNT; $i++)
        {
            $name = implode(' ', $this->_faker->words(rand(1, 4)) );

            $product = array(
                'id'            => $i,
                'sku'           => $this->_faker->md5(),
                'name'          => $name,
                'ident'         => $this->_createIdent($name),
                'price'         => $this->_faker->randomFloat(2, 1.00, 1500.00),
                'image'         => $this->_faker->imageUrl('185', '150', 'technics') . '?' . $i,
                'colour'        => $this->_faker->numberBetween(0, count(self::$_COLORS)),
                'manufacturer'  => $this->_faker->numberBetween(0, count(self::$_MANUFACTURERS)),
                'categories'    => $this->_faker->randomElements(self::$_CAT_IDS, $this->_faker->numberBetween(1, 4)),
                'type'          => 'simple'
            );

            $response[] = $product;
        }

        return json_encode($response);
    }

    /**
     * Retrieves the Currencies with their rates.
     * Result is hard coded and not used as it's just for testing purposes.
     *
     * @method getCurrencies
     * @return array
     */
    public function getCurrencies(){
        $response = array(
            array(
                "code"  =>  "EUR",
                "symbol"=>  "€",
                "rate"  =>  "1",
                "base"  =>  true
            )
        );
        return json_encode($response);
    }

    /**
     * Retrieves a random generated category collection with dummy data from the Faker library.
     * The IDs are in NO relation to the IDs from the getCollectionForCache() function.
     * The collection size can be set by the class constants CATEGORY_COUNT & SUBCATEGORY_COUNT
     *
     * @method getCategories
     * @return array
     */
    public function getCategories(){
        $response   = array();
        $catCnt     = self::CATEGORY_COUNT;
        $subCatCnt  = self::SUBCATEGORY_COUNT;

        for ($i=1; $i<$catCnt+1; $i++){
            $name = 'Category ID ' . ($i);

            $category = array(
                'id'            => (int) $i,
                'ident'         => $this->_createIdent($name),
                'name'          => $name,
                'productCount'  => 12,  // random number!
                'children'      => array()
            );

            $subIdx = $i*$subCatCnt-($subCatCnt-$catCnt-1);
            for ($j=$subIdx; $j<$subIdx+$subCatCnt; $j++){
                $name = 'Category ID ' . ($j);

                $model = array(
                    'id'            => (int) $j,
                    'ident'         => $this->_createIdent($name),
                    'name'          => $name,
                    'productCount'  => 4,// random number
                );

                $category['children'][] = $model;
            }

            $response[] = $category;
        }

        return json_encode($response);
    }


}