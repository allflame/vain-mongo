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
use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyGeneratorStorageInterface;

/**
 * Class KeyGeneratorStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class KeyGeneratorStorageException extends AbstractCoreException
{
    private $generatorStorage;

    /**
     * KeyGeneratorStorageException constructor.
     *
     * @param CollectionKeyGeneratorStorageInterface $generatorStorage
     * @param string                                 $message
     * @param int                                    $code
     * @param \Exception|null                        $previous
     */
    public function __construct(
        CollectionKeyGeneratorStorageInterface $generatorStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->generatorStorage = $generatorStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return CollectionKeyGeneratorStorageInterface
     */
    public function getGeneratorStorage(): CollectionKeyGeneratorStorageInterface
    {
        return $this->generatorStorage;
    }
}