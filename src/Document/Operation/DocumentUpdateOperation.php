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
 * Class CollectionUpdateOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentUpdateOperation extends AbstractDocumentOperation
{
    private $criteria;

    /**
     * CollectionUpsertOperation constructor.
     *
     * @param PhongoDatabase          $mongoDb
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     * @param array                   $criteria
     */
    public function __construct(
        PhongoDatabase $mongoDb,
        $collectionName,
        DocumentEntityInterface $entity,
        array $criteria
    ) {
        $this->criteria = $criteria;
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
                ->updateOne(
                    [$this->criteria],
                    ['$set' => $this->getEntity()->toDocument()]
                )
        ) {
            return new FailedOperationResult();
        }

        return new SuccessfulOperationResult();
    }
}