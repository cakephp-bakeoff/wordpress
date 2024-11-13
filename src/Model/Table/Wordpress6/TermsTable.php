<?php
declare(strict_types=1);

namespace Bakeoff\Wordpress\Model\Table\Wordpress6;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Terms Model
 *
 * @method \Bakeoff\Wordpress\Model\Entity\Term newEmptyEntity()
 * @method \Bakeoff\Wordpress\Model\Entity\Term newEntity(array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\Term> newEntities(array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Term get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Bakeoff\Wordpress\Model\Entity\Term findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Term patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\Term> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Term|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\Term saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Term>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Term>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Term>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Term> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Term>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Term>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\Term>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\Term> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TermsTable extends \Bakeoff\Wordpress\Model\Table\WordpressAbstract\AbstractTermsTable
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

        $this->setTable('terms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('term_id');
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 200)
            ->notEmptyString('slug');

        $validator
            ->notEmptyString('term_group');

        return $validator;
    }
}
