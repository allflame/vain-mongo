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

use Vain\Mongo\Collection\Key\CollectionKeyInterface;

/**
 * Class CollectionKeyGeneratorStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionKeyStorageInterface
{
    /**
     * @param CollectionKeyInterface $key
     *
     * @return CollectionKeyStorageInterface
     */
    public function addKey(CollectionKeyInterface $key) : CollectionKeyStorageInterface;

    /**
     * @param string $collectionName
     *
     * @return CollectionKeyInterface
     */
    public function getKey(string $collectionName) : CollectionKeyInterface;
}