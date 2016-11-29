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

/**
 * Class CollectionKeyGeneratorStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionKeyGeneratorStorageInterface
{
    /**
     * @param CollectionKeyGeneratorInterface $generator
     *
     * @return CollectionKeyGeneratorStorageInterface
     */
    public function addGenerator(CollectionKeyGeneratorInterface $generator) : CollectionKeyGeneratorStorageInterface;

    /**
     * @param string $collectionName
     *
     * @return CollectionKeyGeneratorInterface
     */
    public function getGenerator(string $collectionName) : CollectionKeyGeneratorInterface;
}