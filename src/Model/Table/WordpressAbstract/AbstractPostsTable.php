<?php

namespace Bakeoff\Wordpress\Model\Table\WordpressAbstract;

abstract class AbstractPostsTable extends \Bakeoff\Wordpress\Model\Table\PluginTable
{

    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->belongsToMany('Categories', [
            'className' => 'Bakeoff/Wordpress.Categories',
            'through' => 'Bakeoff/Wordpress.TermRelationships',
            'foreignKey' => 'object_id',
            'targetForeignKey' => 'term_taxonomy_id',
        ]);
        $this->belongsToMany('PostTags', [
            'className' => 'Bakeoff/Wordpress.PostTags',
            'through' => 'Bakeoff/Wordpress.TermRelationships',
            'foreignKey' => 'object_id',
            'targetForeignKey' => 'term_taxonomy_id',
        ]);
    }

    public function findPosts($type = 'all', $options = [])
    {
        $defaults = [
            'conditions' => [
                'post_type' => 'post',
            ],
            'order' => 'post_date DESC',
            'limit' => 5,
        ];
        $options += $defaults;
        return $this->find($type, $options)->contain(['Categories', 'PostTags']);
    }

    public function findPublishedPosts($type = 'all', $options = [])
    {
        $options['conditions']['post_type'] = 'post';
        $options['conditions']['post_status'] = 'publish';
        return $this->findPosts($type, $options);
    }

}
