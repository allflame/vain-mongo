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

namespace Vain\Mongo\Document\Operation;

use Vain\Mongo\Collection\CollectionInterface;
use Vain\Mongo\Database\PhongoDatabase;
use Vain\Mongo\Document\DocumentInterface;
use Vain\Operation\OperationInterface;

/**
 * Class AbstractDocumentOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDocumentOperation implements OperationInterface
{
    private $mongoDb;

    private $collection;

    private $document;

    /**
     * AbstractDocumentOperation constructor.
     *
     * @param PhongoDatabase      $mongoDb
     * @param CollectionInterface $collection
     * @param DocumentInterface   $document
     */
    public function __construct(
        PhongoDatabase $mongoDb,
        CollectionInterface $collection,
        DocumentInterface $document
    ) {
        $this->mongoDb = $mongoDb;
        $this->collection = $collection;
        $this->document = $document;
    }

    /**
     * @return CollectionInterface
     */
    public function getCollection(): CollectionInterface
    {
        return $this->collection;
    }

    /**
     * @return DocumentInterface
     */
    public function getDocument(): DocumentInterface
    {
        return $this->document;
    }

    /**
     * @return array
     */
    public function getCriteria() : array
    {
        return $this->collection->generateCriteria($this->document);
    }

    /**
     * @return string
     */
    public function getCollectionName() : string
    {
        return $this->getCollection()->getName();
    }

    /**
     * @return array
     */
    public function getDocumentData() : array
    {
        return $this->document->toDocument($this->collection);
    }

    /**
     * @return string
     */
    public function generateDocumentId() : string
    {
        return $this->collection->generateId($this->document);
    }

    /**
     * @return PhongoDatabase
     */
    public function getMongoDb(): PhongoDatabase
    {
        return $this->mongoDb;
    }
}