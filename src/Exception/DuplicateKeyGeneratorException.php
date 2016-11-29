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

use Vain\Mongo\Collection\Key\Generator\CollectionKeyGeneratorInterface;
use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyGeneratorStorageInterface;

/**
 * Class DuplicateKeyGeneratorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateKeyGeneratorException extends KeyGeneratorStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateConnectionFactoryException constructor.
     *
     * @param CollectionKeyGeneratorStorageInterface $generatorStorage
     * @param string                                 $name
     * @param CollectionKeyGeneratorInterface        $new
     * @param CollectionKeyGeneratorInterface        $old
     */
    public function __construct(
        CollectionKeyGeneratorStorageInterface $generatorStorage,
        string $name,
        CollectionKeyGeneratorInterface $new,
        CollectionKeyGeneratorInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $generatorStorage,
            sprintf(
                'Trying to register key generator %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return CollectionKeyGeneratorInterface
     */
    public function getNew() : CollectionKeyGeneratorInterface
    {
        return $this->new;
    }

    /**
     * @return CollectionKeyGeneratorInterface
     */
    public function getOld() : CollectionKeyGeneratorInterface
    {
        return $this->old;
    }
}