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

use Vain\Mongo\Database\PhongoDatabase;
use Vain\Mongo\Entity\DocumentEntityInterface;
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

    private $collectionName;

    private $entity;

    /**
     * CollectionOperation constructor.
     *
     * @param PhongoDatabase          $mongodb
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     */
    public function __construct(
        PhongoDatabase $mongodb,
        string $collectionName,
        DocumentEntityInterface $entity

    ) {
        $this->mongodb = $mongodb;
        $this->collectionName = $collectionName;
        $this->entity = $entity;
    }

    /**
     * @inheritDoc
     */
    public function execute() : OperationResultInterface
    {
        if (false === $this->mongodb
                ->selectCollection($this->collectionName)
                ->updateOne(
                    ['_id' => $this->entity->getDocumentId()],
                    ['$set' => $this->entity->toArray()],
                    ['upsert' => true]
                )
        ) {
            return new FailedOperationResult();
        }

        return new SuccessfulOperationResult();
    }
}