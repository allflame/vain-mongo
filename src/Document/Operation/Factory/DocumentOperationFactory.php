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

namespace Vain\Mongo\Document\Operation\Factory;

use Vain\Mongo\Collection\Key\Storage\CollectionKeyStorageInterface;
use Vain\Mongo\Database\PhongoDatabase;
use Vain\Mongo\Document\DocumentEntityInterface;
use Vain\Mongo\Document\Operation\DocumentDeleteOperation;
use Vain\Operation\Factory\Decorator\AbstractOperationFactoryDecorator;
use Vain\Operation\Factory\OperationFactoryInterface;
use Vain\Operation\OperationInterface;

/**
 * Class CollectionOperationFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentOperationFactory extends AbstractOperationFactoryDecorator implements
    DocumentOperationFactoryInterface
{

    private $mongodb;

    private $keyStorage;

    /**
     * OperationCollectionFactory constructor.
     *
     * @param OperationFactoryInterface     $operationFactory
     * @param PhongoDatabase                $mongodb
     * @param CollectionKeyStorageInterface $keyStorage
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        PhongoDatabase $mongodb,
        CollectionKeyStorageInterface $keyStorage

    ) {
        $this->mongodb = $mongodb;
        $this->keyStorage = $keyStorage;
        parent::__construct($operationFactory);
    }

    /**
     * @inheritDoc
     */
    public function createDocument(string $collectionName, DocumentEntityInterface $entity) : OperationInterface
    {
        return $this->upsertDocument($collectionName, $entity);
    }

    /**
     * @inheritDoc
     */
    public function deleteDocument(string $collectionName, DocumentEntityInterface $entity) : OperationInterface
    {
        return $this->decorate(
            new DocumentDeleteOperation(
                $this->mongodb,
                $collectionName,
                $entity,
                $this->keyStorage->getKey($collectionName)->generateCriteria($entity)
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function updateDocument(
        string $collectionName,
        DocumentEntityInterface $newEntity,
        DocumentEntityInterface $oldEntity
    ) : OperationInterface
    {
        return $this->decorate(
            new DocumentDeleteOperation(
                $this->mongodb,
                $collectionName,
                $newEntity,
                $this->keyStorage->getKey($collectionName)->generateCriteria($oldEntity)
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function upsertDocument(string $collectionName, DocumentEntityInterface $entity) : OperationInterface
    {
        return $this->decorate(
            new DocumentDeleteOperation(
                $this->mongodb,
                $collectionName,
                $entity,
                $this->keyStorage->getKey($collectionName)->generateCriteria($entity)
            )
        );
    }
}