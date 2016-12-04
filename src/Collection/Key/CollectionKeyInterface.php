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

namespace Vain\Mongo\Collection\Key;

use Vain\Entity\EntityInterface;

/**
 * Interface CollectionKeyInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionKeyInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param EntityInterface $entity
     *
     * @return string
     */
    public function generateId(EntityInterface $entity) : string;

    /**
     * @param EntityInterface $entity
     *
     * @return array
     */
    public function generateCriteria(EntityInterface $entity) : array;
}