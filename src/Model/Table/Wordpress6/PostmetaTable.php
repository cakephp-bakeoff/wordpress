<?php
declare(strict_types=1);

namespace Bakeoff\Wordpress\Model\Table\Wordpress6;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Postmeta Model
 *
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum newEmptyEntity()
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum newEntity(array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\Postmetum> newEntities(array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\Postmetum> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Postmetum saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Postmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Postmetum>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Postmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Postmetum> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Postmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Postmetum>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Postmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Postmetum> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PostmetaTable extends \Bakeoff\Wordpress\Model\Table\WordpressAbstract\AbstractPostmetaTable
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

        $this->setTable('wp_postmeta');
        $this->setDisplayField('meta_id');
        $this->setPrimaryKey('meta_id');
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
            ->notEmptyString('post_id');

        $validator
            ->scalar('meta_key')
            ->maxLength('meta_key', 255)
            ->allowEmptyString('meta_key');

        $validator
            ->scalar('meta_value')
            ->maxLength('meta_value', 4294967295)
            ->allowEmptyString('meta_value');

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
