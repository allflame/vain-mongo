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
use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyGeneratorStorageInterface;
use Vain\Mongo\Operation\CollectionOperation;
use Vain\Operation\Factory\Decorator\AbstractOperationFactoryDecorator;
use Vain\Operation\Factory\OperationFactoryInterface;
use Vain\Operation\OperationInterface;
use \MongoDB\Database as MongoDatabase;

/**
 * Class CollectionOperationFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionOperationFactory extends AbstractOperationFactoryDecorator implements
    CollectionOperationFactoryInterface
{

    private $mongodb;

    private $generatorStorage;

    /**
     * OperationCollectionFactory constructor.
     *
     * @param OperationFactoryInterface              $operationFactory
     * @param MongoDatabase                          $mongodb
     * @param CollectionKeyGeneratorStorageInterface $generatorStorage
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        MongoDatabase $mongodb,
        CollectionKeyGeneratorStorageInterface $generatorStorage

    ) {
        $this->mongodb = $mongodb;
        $this->generatorStorage = $generatorStorage;
        parent::__construct($operationFactory);
    }

    /**
     * @inheritDoc
     */
    public function collectionOperation(string $collectionName, EntityInterface $entity) : OperationInterface
    {
        return $this->decorate(
            new CollectionOperation($this->mongodb, $this->generatorStorage->getGenerator($collectionName), $entity)
        );
    }
}