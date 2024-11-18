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
$blogList = \Cake\Core\Configure::read($this->getName().'.siteList');
$blogSymbol = array_keys($blogList)[0];
\Cake\Core\Configure::write($this->getName().'.defaultSite', $blogSymbol);
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

#### Importing CSS from your blog

Normally, Wordpress would render some additional CSS with your content. You will need that CSS here to make sure your content looks like it should.

Provide links to the stylesheets you would like to load under `externalCss` in [`config/Bakeoff/Wordpress.php`](./config/Bakeoff/Wordpress-dist.php). The plugin will attempt to fetch the contents of these files and cache them locally.

```php
'externalCss' => [
    // plugin that outputs all CSS that Wordpress would use
    'http://wordpress.example.com/wp-json/wordpress-export-css/wordpress-export-css.css',
    // static file; optional 'foo' becomes <link id="externalCss-foo">
    'foo' => '//wordpress.example.com/wp-includes/css/dist/block-library/style.css',
],
```

Normally, you would need `wp-includes/css/dist/block-library/style.css` as well as the inline styles that Wordpress generates dynamically. To get the latter, you can use [cakephp-bakeoff/wordpress-export-css](https://github.com/cakephp-bakeoff/wordpress-export-css).

Remember to clear the cache if you make changes to the `externalCss` configuration.

```
bin/cake cache clear_all
```
