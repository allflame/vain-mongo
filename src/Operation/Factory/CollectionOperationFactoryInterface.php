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

namespace Vain\Mongo\Operation\Factory;

use Vain\Mongo\Entity\DocumentEntityInterface;
use Vain\Operation\OperationInterface;

/**
 * Interface OperationCollectionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionOperationFactoryInterface
{
    /**
     * @param string                  $collectionName
     * @param DocumentEntityInterface $entity
     *
     * @return OperationInterface
     */
    public function collectionOperation(string $collectionName, DocumentEntityInterface $entity) : OperationInterface;
}