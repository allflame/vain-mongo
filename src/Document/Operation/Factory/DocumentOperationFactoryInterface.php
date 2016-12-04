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

use Vain\Mongo\Document\DocumentEntityInterface;
use Vain\Operation\OperationInterface;

/**
 * Interface OperationCollectionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DocumentOperationFactoryInterface
{
    /**
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     *
     * @return OperationInterface
     */
    public function createDocument(string $collectionName, DocumentEntityInterface $entity) : OperationInterface;

    /**
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     *
     * @return OperationInterface
     */
    public function deleteDocument(string $collectionName, DocumentEntityInterface $entity) : OperationInterface;

    /**
     * @param string                  $collectionName
     * @param DocumentEntityInterface $newEntity
     * @param DocumentEntityInterface $oldEntity
     *
     * @return OperationInterface
     */
    public function updateDocument(
        string $collectionName,
        DocumentEntityInterface $newEntity,
        DocumentEntityInterface $oldEntity
    ) : OperationInterface;

    /**
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     *
     * @return OperationInterface
     */
    public function upsertDocument(string $collectionName, DocumentEntityInterface $entity) : OperationInterface;
}