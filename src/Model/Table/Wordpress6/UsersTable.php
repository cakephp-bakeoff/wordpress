<?php
declare(strict_types=1);

namespace Bakeoff\Wordpress\Model\Table\Wordpress6;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \Bakeoff\Wordpress\Model\Entity\User newEmptyEntity()
 * @method \Bakeoff\Wordpress\Model\Entity\User newEntity(array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\User> newEntities(array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\User get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Bakeoff\Wordpress\Model\Entity\User findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\User> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\User>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\User> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\User>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\User>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\User> deleteManyOrFail(iterable $entities, array $options = [])
 */
class UsersTable extends \Bakeoff\Wordpress\Model\Table\WordpressAbstract\AbstractUsersTable
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('wp_users');
        $this->setDisplayField('user_login');
        $this->setPrimaryKey('ID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('user_login')
            ->maxLength('user_login', 60)
            ->notEmptyString('user_login');

        $validator
            ->scalar('user_pass')
            ->maxLength('user_pass', 255)
            ->notEmptyString('user_pass');

        $validator
            ->scalar('user_nicename')
            ->maxLength('user_nicename', 50)
            ->notEmptyString('user_nicename');

        $validator
            ->scalar('user_email')
            ->maxLength('user_email', 100)
            ->notEmptyString('user_email');

        $validator
            ->scalar('user_url')
            ->maxLength('user_url', 100)
            ->notEmptyString('user_url');

        $validator
            ->dateTime('user_registered')
            ->notEmptyDateTime('user_registered');

        $validator
            ->scalar('user_activation_key')
            ->maxLength('user_activation_key', 255)
            ->notEmptyString('user_activation_key');

        $validator
            ->integer('user_status')
            ->notEmptyString('user_status');

        $validator
            ->scalar('display_name')
            ->maxLength('display_name', 250)
            ->notEmptyString('display_name');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName(): string
    {
        return 'Wordpress6-clean';
    }
}
