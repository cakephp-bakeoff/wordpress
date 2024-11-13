# CakePHP to Wordpress connector

### Installation

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

### Usage

#### Automatic - out of the box

Your posts should automatically be available.

The plugin will fetch your *Permalink structure* (as defined in your Wordpress admin - see `/wp-admin/options-permalink.php`) and connect it as a route in your host CakePHP application.

For example:

- **If you *Permalink structure* is `/myblog/%year%/%postname%/`**
  
  The plugin will identify that `myblog` is the base path and will be listening for everything under that path.
- **If you *Permalink structure* is `/%postname%/`**
  
  The plugin will be listening for everything. Conflicts may happen. Check your `APP/config/routes.php` to make sure no other route is hijacking the path where you expect your Wordpress content.

#### Manually fetching content

```
// Wherever you need to get the Wordpress posts
$blog = new \Bakeoff\Wordpress\Connector();
$query = $blog->Posts->find('all', []);
$query = $query->all();
```
