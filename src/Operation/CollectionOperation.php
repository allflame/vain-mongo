<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-mongo
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-mongo
 */
declare(strict_types = 1);

namespace Vain\Mongo\Operation;

use Vain\Entity\EntityInterface;
use Vain\Mongo\Collection\Key\CollectionKeyInterface;
use Vain\Mongo\Database\PhongoDatabase;
use Vain\Operation\OperationInterface;
use Vain\Operation\Result\Failed\FailedOperationResult;
use Vain\Operation\Result\OperationResultInterface;
use Vain\Operation\Result\Successful\SuccessfulOperationResult;

/**
 * Class AbstractCollectionOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionOperation implements OperationInterface
{
    private $mongodb;

    private $collectionKey;

    private $entity;

    /**
     * CollectionOperation constructor.
     *
     * @param PhongoDatabase         $mongodb
     * @param CollectionKeyInterface $collectionKey
     * @param EntityInterface        $entity
     */
    public function __construct(
        PhongoDatabase $mongodb,
        CollectionKeyInterface $collectionKey,
        EntityInterface $entity

    ) {
        $this->mongodb = $mongodb;
        $this->collectionKey = $collectionKey;
        $this->entity = $entity;
    }

    /**
     * @inheritDoc
     */
    public function execute() : OperationResultInterface
    {
        if (false === $this->mongodb
                ->selectCollection($this->collectionKey->getName())
                ->updateOne(
                    ['_id' => $this->collectionKey->generate($this->entity)],
                    ['$set' => $this->entity->toArray()],
                    ['upsert' => true]
                )
        ) {
            return new FailedOperationResult();
        }

        return new SuccessfulOperationResult();
    }
}