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

use Vain\Entity\EntityInterface;
use Vain\Mongo\Collection\Key\Generator\Factory\CollectionKeyGeneratorStorageInterface;
use Vain\Mongo\Operation\CollectionOperation;
use Vain\Operation\OperationInterface;

/**
 * Class OperationCollectionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationCollectionFactory implements OperationCollectionFactoryInterface
{

    private $mongodb;

    private $generatorStorage;

    /**
     * OperationCollectionFactory constructor.
     *
     * @param \MongoDB                               $mongodb
     * @param CollectionKeyGeneratorStorageInterface $generatorStorage
     */
    public function __construct(\MongoDB $mongodb, CollectionKeyGeneratorStorageInterface $generatorStorage)
    {
        $this->mongodb = $mongodb;
        $this->generatorStorage = $generatorStorage;
    }

    /**
     * @inheritDoc
     */
    public function create(string $collectionName, EntityInterface $entity) : OperationInterface
    {
        return new CollectionOperation($this->mongodb, $this->generatorStorage->getGenerator($collectionName), $entity);
    }

}