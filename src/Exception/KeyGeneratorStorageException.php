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
use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyStorageInterface;

/**
 * Class KeyGeneratorStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class KeyGeneratorStorageException extends AbstractCoreException
{
    private $keyStorage;

    /**
     * KeyGeneratorStorageException constructor.
     *
     * @param CollectionKeyStorageInterface $keyStorage
     * @param string                        $message
     * @param int                           $code
     * @param \Exception|null               $previous
     */
    public function __construct(
        CollectionKeyStorageInterface $keyStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->keyStorage = $keyStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CollectionKeyStorageInterface
     */
    public function getKeyStorage(): CollectionKeyStorageInterface
    {
        return $this->keyStorage;
    }
}