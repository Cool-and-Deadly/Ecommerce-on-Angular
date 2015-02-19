<?php
namespace Moa\API\Provider\Faker;

use Faker;


/**
 * Abstract provider for Laravel, which returns dummy data using the Faker library
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
abstract class AbstractProvider {

    protected $_host;
    protected $_store;
    protected $_faker;

    public function __construct($config)
    {
//        NOT USED
//        $this->_host    = $config['host'];
//        $this->_store   = $config['store'];
        $this->_faker   = Faker\Factory::create();
    }

    /**
     * @method _createIdent
     * @param string $name
     * @return string
     */
    protected function _createIdent($name)
    {
        $name = strtolower($name);
        $name = preg_replace('~[^A-Z0-9\s]~i', '', $name);
        $name = str_replace(' ', '-', $name);
        return $name;
    }

}