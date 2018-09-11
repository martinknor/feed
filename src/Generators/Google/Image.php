<?php

namespace Mk\Feed\Generators\Google;


use Mk, Nette;

/**
 * Class Image
 * @author Martin Knor <martin.knor@gmail.com>
 * @package Mk\Feed\Generators\Google
 */
class Image
{
    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    /** @var string */
    private $url;

    /**
     * Image constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = (string) $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }



}
