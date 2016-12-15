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

use Vain\Mongo\Document\Collection\DocumentCollectionInterface;
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
     * @param DocumentCollectionInterface $collection
     * @param DocumentInterface           $document
     *
     * @return OperationInterface
     */
    public function createDocument(
        DocumentCollectionInterface $collection,
        DocumentInterface $document
    ) : OperationInterface;

    /**
     * @param DocumentCollectionInterface $collection
     * @param DocumentInterface           $document
     *
     * @return OperationInterface
     */
    public function deleteDocument(
        DocumentCollectionInterface $collection,
        DocumentInterface $document
    ) : OperationInterface;

    /**
     * @param DocumentCollectionInterface $collection
     * @param DocumentInterface           $newDocument
     * @param DocumentInterface           $oldDocument
     *
     * @return OperationInterface
     */
    public function updateDocument(
        DocumentCollectionInterface $collection,
        DocumentInterface $newDocument,
        DocumentInterface $oldDocument
    ) : OperationInterface;

    /**
     * @param DocumentCollectionInterface $collection
     * @param DocumentInterface           $document
     *
     * @return OperationInterface
     */
    public function upsertDocument(
        DocumentCollectionInterface $collection,
        DocumentInterface $document
    ) : OperationInterface;
}
