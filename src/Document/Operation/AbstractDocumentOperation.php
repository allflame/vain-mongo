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

use Vain\Mongo\Database\PhongoDatabase;
use Vain\Mongo\Document\DocumentEntityInterface;
use Vain\Operation\OperationInterface;

/**
 * Class AbstractDocumentOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDocumentOperation implements OperationInterface
{
    private $mongoDb;

    private $collectionName;

    private $entity;

    /**
     * AbstractDocumentOperation constructor.
     *
     * @param PhongoDatabase                $mongoDb
     * @param string                        $collectionName
     * @param DocumentEntityInterface       $entity
     */
    public function __construct(
        PhongoDatabase $mongoDb,
        string $collectionName,
        DocumentEntityInterface $entity
    ) {
        $this->mongoDb = $mongoDb;
        $this->collectionName = $collectionName;
        $this->entity = $entity;
    }

    /**
     * @return PhongoDatabase
     */
    public function getMongoDb(): PhongoDatabase
    {
        return $this->mongoDb;
    }

    /**
     * @return string
     */
    public function getCollectionName(): string
    {
        return $this->collectionName;
    }

    /**
     * @return DocumentEntityInterface
     */
    public function getEntity(): DocumentEntityInterface
    {
        return $this->entity;
    }
}