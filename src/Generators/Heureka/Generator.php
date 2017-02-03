<?php
namespace Mk\Feed\Generators\Heureka;

use Mk\Feed\Generators\BaseGenerator;

/**
 * Class HeurekaGenerator
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators
 * @see http://sluzby.heureka.cz/napoveda/xml-feed/ Documentation
 */
abstract class Generator extends BaseGenerator {

    /**
     * Name of template directory
     */
    const TEMPLATE_DIR = 'latte';
    
    /**
     * @param $name
     * @return string
     */
    protected function getTemplate($name)
    {
        return sprintf(
            '%s/%s/%s.latte',
            __DIR__,
            self::TEMPLATE_DIR,
            $name
        );
    }
}
