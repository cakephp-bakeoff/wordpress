## CakePHP to Wordpress connector

```
composer require bakeoff/wordpress:dev-master
```

```
cp vendor/bakeoff/wordpress/config/Bakeoff/Wordpress-dist.php config/Bakeoff/Wordpress.php
// don't forget to edit config/Bakeoff/Wordpress.php
```

```
// src/Application.php::bootstrap()
$this->addPlugin(\Bakeoff\Wordpress\Plugin::class, ['bootstrap' => true, 'routes' => false]);
```

```
// src/Controller/AppController.php::initialize()
$blogList = \Cake\Core\Configure::read($this->getName().'.blogList');
$blogSymbol = array_keys($blogList)[0];
\Cake\Core\Configure::write($this->getName().'.defaultBlog', $blogSymbol);
```

```
// Wherever you need to get the Wordpress posts
$blog = new \Bakeoff\Wordpress\Connector();
$query = $blog->Posts->find('all', []);
$query = $query->all();
```