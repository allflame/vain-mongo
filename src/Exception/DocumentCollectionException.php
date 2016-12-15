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

namespace Vain\Mongo\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Mongo\Document\Collection\DocumentCollectionInterface;

/**
 * Class DocumentCollectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DocumentCollectionException extends AbstractCoreException
{
    private $collection;

    /**
     * OperationCollectionException constructor.
     *
     * @param DocumentCollectionInterface $collection
     * @param string                      $message
     * @param int                         $code
     * @param \Exception|null             $previous
     */
    public function __construct(
        DocumentCollectionInterface $collection,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->collection = $collection;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DocumentCollectionInterface
     */
    public function getCollection(): DocumentCollectionInterface
    {
        return $this->collection;
    }
}
