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

use Vain\Mongo\Collection\Key\Generator\Factory\CollectionKeyGeneratorStorageInterface;

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
     * @param CollectionKeyGeneratorStorageInterface $generatorStorage
     * @param string                                 $collectionName
     */
    public function __construct(CollectionKeyGeneratorStorageInterface $generatorStorage, string $collectionName)
    {
        parent::__construct(
            $generatorStorage,
            sprintf('Cannot create key generator for unknown collection %s', $collectionName)
        );
    }
}