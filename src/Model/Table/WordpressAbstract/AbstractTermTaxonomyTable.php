<?php

namespace Bakeoff\Wordpress\Model\Table\WordpressAbstract;

abstract class AbstractTermTaxonomyTable extends \Bakeoff\Wordpress\Model\Table\PluginTable
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->belongsTo('Terms', [
            'foreignKey' => 'term_id',
            'joinType' => 'INNER',
            'className' => 'Bakeoff/Wordpress.Terms',
        ]);
    }


}
