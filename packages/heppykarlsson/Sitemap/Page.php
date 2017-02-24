<?php namespace HeppyKarlsson\Sitemap;


class Page
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    static public function route($name, $params = []) {
        return new Page(route($name, $params));
    }

    public function getUrl() {
        return $this->url;
    }

    public function __toString()
    {
        return $this->url;
    }

}