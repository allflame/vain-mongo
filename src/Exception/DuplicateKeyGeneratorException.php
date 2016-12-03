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

use Vain\Mongo\Collection\Key\CollectionKeyInterface;
use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyStorageInterface;

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
     * @param CollectionKeyStorageInterface $keyStorage
     * @param string                        $name
     * @param CollectionKeyInterface        $new
     * @param CollectionKeyInterface        $old
     */
    public function __construct(
        CollectionKeyStorageInterface $keyStorage,
        string $name,
        CollectionKeyInterface $new,
        CollectionKeyInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $keyStorage,
            sprintf(
                'Trying to register key %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return CollectionKeyInterface
     */
    public function getNew() : CollectionKeyInterface
    {
        return $this->new;
    }

    /**
     * @return CollectionKeyInterface
     */
    public function getOld() : CollectionKeyInterface
    {
        return $this->old;
    }
}