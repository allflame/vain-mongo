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
use Vain\Mongo\Collection\CollectionInterface;

/**
 * Class CollectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionException extends AbstractCoreException
{
    private $collection;

    /**
     * CollectionException constructor.
     *
     * @param CollectionInterface $collection
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        CollectionInterface $collection,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->collection = $collection;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CollectionInterface
     */
    public function getCollection(): CollectionInterface
    {
        return $this->collection;
    }
}