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
use Vain\Operation\Result\Failed\FailedOperationResult;
use Vain\Operation\Result\OperationResultInterface;
use Vain\Operation\Result\Successful\SuccessfulOperationResult;

/**
 * Class CollectionInsertOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentInsertOperation extends AbstractDocumentOperation
{
    private $id;

    /**
     * DocumentInsertOperation constructor.
     *
     * @param PhongoDatabase          $mongoDb
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     * @param string                  $id
     */
    public function __construct(PhongoDatabase $mongoDb, $collectionName, DocumentEntityInterface $entity, string $id)
    {
        $this->id = $id;
        parent::__construct($mongoDb, $collectionName, $entity);
    }

    /**
     * @inheritDoc
     */
    public function execute() : OperationResultInterface
    {
        if (false === $this
                ->getMongoDb()
                ->selectCollection($this->getCollectionName())
                ->insertOne(array_merge($this->getEntity()->toDocument(), ['_id' => $this->id]))
        ) {
            return new FailedOperationResult();
        }

        return new SuccessfulOperationResult();
    }
}