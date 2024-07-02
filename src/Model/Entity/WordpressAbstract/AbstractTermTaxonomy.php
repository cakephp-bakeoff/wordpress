<?php

namespace Bakeoff\Wordpress\Model\Entity\WordpressAbstract;

abstract class AbstractTermTaxonomy extends \Bakeoff\Wordpress\Model\Entity\PluginEntity
{

    public function _getUrl()
    {
        return \Cake\Routing\Router::url([
            '_name' => 'Blog:'.$this->taxonomy, // see config/routes.php
            'slug' => $this->term->slug,
        ]);
    }

}
