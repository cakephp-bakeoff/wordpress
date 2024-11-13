<?php
declare(strict_types=1);

namespace Bakeoff\Wordpress\Model\Table\Wordpress6;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * TermTaxonomy Model
 *
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy newEmptyEntity()
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy newEntity(array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy> newEntities(array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermTaxonomy saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermTaxonomy> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TermTaxonomyTable extends \Bakeoff\Wordpress\Model\Table\WordpressAbstract\AbstractTermTaxonomyTable
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

        $this->setTable('term_taxonomy');
        $this->setDisplayField('taxonomy');
        $this->setPrimaryKey('term_taxonomy_id');
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
            ->scalar('taxonomy')
            ->maxLength('taxonomy', 32)
            ->notEmptyString('taxonomy');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->notEmptyString('parent');

        $validator
            ->notEmptyString('count');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['term_id', 'taxonomy']), ['errorField' => 'term_id']);

        return $rules;
    }
}
