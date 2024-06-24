<?php

// Load configuration from APP/config/Bakeoff/Wordpress.php
\Cake\Core\Configure::load($this->getName(), 'default');

// Pick the first configured blog to be the default blog
$blogList = \Cake\Core\Configure::read($this->getName().'.blogList');
$blogSymbol = array_keys($blogList)[0];
\Cake\Core\Configure::write($this->getName().'.defaultBlog', $blogSymbol);
