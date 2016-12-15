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

use MongoDB\BSON\ObjectID;
use Vain\Core\Result\FailedResult;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class CollectionInsertOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentInsertOperation extends AbstractDocumentOperation
{
    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (false === $this
                ->getMongoDb()
                ->selectCollection($this->getCollectionName())
                ->insertOne(array_merge(['_id' => new ObjectID($this->generateDocumentId())], $this->getDocumentData()))
        ) {
            return new FailedResult();
        }

        return new SuccessfulResult();
    }
}
