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

use Vain\Operation\Result\Failed\FailedOperationResult;
use Vain\Operation\Result\OperationResultInterface;
use Vain\Operation\Result\Successful\SuccessfulOperationResult;

/**
 * Class CollectionUpsertOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentUpsertOperation extends AbstractDocumentOperation
{
    /**
     * @inheritDoc
     */
    public function execute() : OperationResultInterface
    {
        if (false === $this
                ->getMongoDb()
                ->selectCollection($this->getCollectionName())
                ->updateOne(
                    $this->getCriteria(),
                    ['$set' => array_merge(['_id' => $this->getDocumentId()], $this->getDocumentData())],
                    ['upsert' => true]
                )
        ) {
            return new FailedOperationResult();
        }

        return new SuccessfulOperationResult();
    }
}