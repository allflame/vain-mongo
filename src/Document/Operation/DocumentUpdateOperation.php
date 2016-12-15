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

use Vain\Core\Result\FailedResult;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class CollectionUpdateOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentUpdateOperation extends AbstractDocumentOperation
{
    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (false === $this
                ->getMongoDb()
                ->selectCollection($this->getCollectionName())
                ->updateOne(
                    $this->getCriteria(),
                    ['$set' => $this->getDocumentData()]
                )
        ) {
            return new FailedResult();
        }

        return new SuccessfulResult();
    }
}
