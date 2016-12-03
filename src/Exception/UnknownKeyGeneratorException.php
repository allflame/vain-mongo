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

use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyStorageInterface;

/**
 * Class UnknownKeyGeneratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownKeyGeneratorException extends KeyGeneratorStorageException
{
    /**
     * UnknownConnectionTypeException constructor.
     *
     * @param CollectionKeyStorageInterface $keyStorage
     * @param string                        $collectionName
     */
    public function __construct(CollectionKeyStorageInterface $keyStorage, string $collectionName)
    {
        parent::__construct(
            $keyStorage,
            sprintf('Cannot create key for unknown collection %s', $collectionName)
        );
    }
}