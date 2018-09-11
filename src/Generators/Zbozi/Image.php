<?php

namespace Mk\Feed\Generators\Zbozi;

use Mk, Nette;

class Image {

    /* Použití smartobject viz php 7.2 to nette 2.4 */
    use \Nette\SmartObject;

    private $url;

    /**
     * Image constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

}
