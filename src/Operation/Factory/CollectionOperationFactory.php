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
use Vain\Mongo\Collection\Key\Generator\Storage\CollectionKeyStorageInterface;
use Vain\Mongo\Database\PhongoDatabase;
use Vain\Mongo\Operation\CollectionOperation;
use Vain\Operation\Factory\Decorator\AbstractOperationFactoryDecorator;
use Vain\Operation\Factory\OperationFactoryInterface;
use Vain\Operation\OperationInterface;

/**
 * Class CollectionOperationFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionOperationFactory extends AbstractOperationFactoryDecorator implements
    CollectionOperationFactoryInterface
{

    private $mongodb;

    private $keyStorage;

    /**
     * OperationCollectionFactory constructor.
     *
     * @param OperationFactoryInterface     $operationFactory
     * @param PhongoDatabase                $mongodb
     * @param CollectionKeyStorageInterface $keyStorage
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        PhongoDatabase $mongodb,
        CollectionKeyStorageInterface $keyStorage

    ) {
        $this->mongodb = $mongodb;
        $this->keyStorage = $keyStorage;
        parent::__construct($operationFactory);
    }

    /**
     * @inheritDoc
     */
    public function collectionOperation(string $collectionName, EntityInterface $entity) : OperationInterface
    {
        return $this->decorate(
            new CollectionOperation($this->mongodb, $this->keyStorage->getKey($collectionName), $entity)
        );
    }
}