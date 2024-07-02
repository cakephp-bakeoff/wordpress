<?php

// Load configuration from APP/config/Bakeoff/Wordpress.php
\Cake\Core\Configure::load($this->getName(), 'default');

// Pick the first configured blog to be the default blog
$blogList = \Cake\Core\Configure::read($this->getName().'.blogList');
$blogSymbol = array_keys($blogList)[0];
\Cake\Core\Configure::write($this->getName().'.defaultBlog', $blogSymbol);

// Preload options
$blog = new \Bakeoff\Wordpress\Connector();
$options = $blog->Options->find(
    'list', keyField: 'option_name', valueField: 'option_value'
)->toArray();
// TODO store options per blog symbol (requires Entities to know their symbol)
\Cake\Core\Configure::write($this->getName().'.Options', $options);

// Preload all categories; 'threaded' arranges by hierarchy
$categories = $blog->Categories->find(
    'threaded',
    parentField: 'parent' // default is 'parent_id', Wordpress uses 'parent'
)->toArray();
// TODO store categories per blog symbol (requires Entities to know their symbol)
\Cake\Core\Configure::write($this->getName().'.Categories', $categories);
