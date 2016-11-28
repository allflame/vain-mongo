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

namespace Vain\Mongo\Collection\Key\Generator;

use Vain\Entity\EntityInterface;

/**
 * Interface CollectionKeyGeneratorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionKeyGeneratorInterface
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
    public function generateCollectionKey(EntityInterface $entity) : string;
}