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

namespace Vain\Mongo\Collection\Key\Generator\Storage;

use Vain\Mongo\Collection\Key\Generator\CollectionKeyGeneratorInterface;
use Vain\Mongo\Exception\DuplicateKeyGeneratorException;
use Vain\Mongo\Exception\UnknownKeyGeneratorException;

/**
 * Class CollectionKeyGeneratorStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionKeyGeneratorStorage implements CollectionKeyGeneratorStorageInterface
{
    private $generators = [];

    /**
     * CollectionKeyGeneratorStorage constructor.
     *
     * @param array $generators
     */
    public function __construct(array $generators = [])
    {
        foreach ($generators as $generator) {
            $this->addGenerator($generator);
        }
    }

    /**
     * @inheritDoc
     */
    public function addGenerator(CollectionKeyGeneratorInterface $generator) : CollectionKeyGeneratorStorageInterface
    {
        $collectionName = $generator->getName();
        if (array_key_exists($collectionName, $this->generators)) {
            throw new DuplicateKeyGeneratorException(
                $this,
                $collectionName,
                $generator,
                $this->generators[$collectionName]
            );
        }
        $this->generators[$collectionName] = $generator;

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getGenerator(string $collectionName) : CollectionKeyGeneratorInterface
    {
        if (false === array_key_exists($collectionName, $this->generators)) {
            throw new UnknownKeyGeneratorException($this, $collectionName);
        }

        return $this->generators[$collectionName];
    }
}