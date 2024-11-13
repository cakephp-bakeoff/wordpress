<?php
declare(strict_types=1);

namespace Bakeoff\Wordpress\Model\Table\Wordpress6;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * TermRelationships Model
 *
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship newEmptyEntity()
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship newEntity(array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\TermRelationship> newEntities(array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\Bakeoff\Wordpress\Model\Entity\TermRelationship> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \Bakeoff\Wordpress\Model\Entity\TermRelationship saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermRelationship>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermRelationship>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermRelationship>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermRelationship> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermRelationship>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermRelationship>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\Bakeoff\Wordpress\Model\Entity\TermRelationship>|\Cake\Datasource\ResultSetInterface<\Bakeoff\Wordpress\Model\Entity\TermRelationship> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TermRelationshipsTable extends \Bakeoff\Wordpress\Model\Table\WordpressAbstract\AbstractTermRelationshipsTable
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

        $this->setTable('term_relationships');
        $this->setDisplayField(['object_id', 'term_taxonomy_id']);
        $this->setPrimaryKey(['object_id', 'term_taxonomy_id']);
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
            ->integer('term_order')
            ->notEmptyString('term_order');

        return $validator;
    }
}
