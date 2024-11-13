<?php
declare(strict_types=1);

namespace Bakeoff\Wordpress\Model\Table\Wordpress6;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Termmeta Model
 *
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum newEmptyEntity()
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum newEntity(array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\Termmetum> newEntities(array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\Termmetum> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Termmetum saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Termmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Termmetum>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Termmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Termmetum> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Termmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Termmetum>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Termmetum>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Termmetum> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TermmetaTable extends \Bakeoff\Wordpress\Model\Table\WordpressAbstract\AbstractTermmetaTable
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

        $this->setTable('termmeta');
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
            ->notEmptyString('term_id');

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
}
