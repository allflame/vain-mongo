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
use Vain\Core\Operation\OperationInterface;

/**
 * Interface OperationCollectionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DocumentOperationFactoryInterface
{
    /**
     * @param OperationCollectionInterface $collection
     * @param DocumentInterface   $document
     *
     * @return OperationInterface
     */
    public function createDocument(OperationCollectionInterface $collection, DocumentInterface $document) : OperationInterface;

    /**
     * @param OperationCollectionInterface $collection
     * @param DocumentInterface   $document
     *
     * @return OperationInterface
     */
    public function deleteDocument(OperationCollectionInterface $collection, DocumentInterface $document) : OperationInterface;

    /**
     * @param OperationCollectionInterface $collection
     * @param DocumentInterface   $newDocument
     * @param DocumentInterface   $oldDocument
     *
     * @return OperationInterface
     */
    public function updateDocument(
        OperationCollectionInterface $collection,
        DocumentInterface $newDocument,
        DocumentInterface $oldDocument
    ) : OperationInterface;

    /**
     * @param OperationCollectionInterface $collection
     * @param DocumentInterface   $document
     *
     * @return OperationInterface
     */
    public function upsertDocument(OperationCollectionInterface $collection, DocumentInterface $document) : OperationInterface;
}
