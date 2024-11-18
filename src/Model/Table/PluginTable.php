<?php

namespace Bakeoff\Wordpress\Model\Table;

class PluginTable extends \Cake\ORM\Table
{

    /**
     * Refers to connector instance for the blog the current table belongs to.
     *
     * Particularly useful for getting configuration for the current blog. For
     * example, connection or prefix that this blog, and all of its tables, have
     * to use. (PluginTable is parent to all table classes in this plugin.)
     *
     * @var \Bakeoff\Wordpress\Connector
     */
    protected $pluginConnector;

    /**
     * @return \Bakeoff\Wordpress\Connector
     */
    public function getPluginConnector(): \Bakeoff\Wordpress\Connector|null
    {
        return $this->pluginConnector;
    }

    /**
     * @param \Bakeoff\Wordpress\Connector $pluginConnector
     */
    public function setPluginConnector(\Bakeoff\Wordpress\Connector $pluginConnector): void
    {
        $this->pluginConnector = $pluginConnector;
    }


    /**
     * Prepends table name prefix for all table classes in this plugin
     *
     * All table classes in this plugin refer to prefixless database table names
     * Real Wordpress databases (especially multisite networks) can use prefixes
     * So what we neutrally refer to as `posts` needs to really be `wp_3_posts`
     *
     * This function takes over getTable() calls on table classes in this plugin
     *
     * @return string table name with prefix prepended if required
     */
    public function getTable(): string
    {
        if (!$this->getPluginConnector()) {
            return parent::getTable();
        }
        return $this->getPluginConnector()->getConfig('tablePrefix') . parent::getTable();
    }

    /**
     * Takes over getConnection() calls on all table classes in this plugin and
     * returns datasource connection configured for current connector instance
     *
     * @return \Cake\Database\Connection
     */
    public function getConnection(): \Cake\Database\Connection
    {
        if (!$this->getPluginConnector()) {
            return parent::getConnection();
        }
        $datasource = $this->getPluginConnector()->getConfig('datasource');
        return \Cake\Datasource\ConnectionManager::get($datasource);
    }

}
