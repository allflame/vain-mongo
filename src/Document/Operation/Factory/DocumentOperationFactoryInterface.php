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

use Vain\Mongo\Collection\CollectionInterface;
use Vain\Mongo\Document\DocumentInterface;
use Vain\Operation\OperationInterface;

/**
 * Interface OperationCollectionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DocumentOperationFactoryInterface
{
    /**
     * @param CollectionInterface $collection
     * @param DocumentInterface   $document
     *
     * @return OperationInterface
     */
    public function createDocument(CollectionInterface $collection, DocumentInterface $document) : OperationInterface;

    /**
     * @param CollectionInterface $collection
     * @param DocumentInterface   $document
     *
     * @return OperationInterface
     */
    public function deleteDocument(CollectionInterface $collection, DocumentInterface $document) : OperationInterface;

    /**
     * @param CollectionInterface $collection
     * @param DocumentInterface   $newDocument
     * @param DocumentInterface   $oldDocument
     *
     * @return OperationInterface
     */
    public function updateDocument(
        CollectionInterface $collection,
        DocumentInterface $newDocument,
        DocumentInterface $oldDocument
    ) : OperationInterface;

    /**
     * @param CollectionInterface $collection
     * @param DocumentInterface   $document
     *
     * @return OperationInterface
     */
    public function upsertDocument(CollectionInterface $collection, DocumentInterface $document) : OperationInterface;
}