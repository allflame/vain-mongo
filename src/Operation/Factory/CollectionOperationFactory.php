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

use Vain\Mongo\Database\PhongoDatabase;
use Vain\Mongo\Entity\DocumentEntityInterface;
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

    /**
     * OperationCollectionFactory constructor.
     *
     * @param OperationFactoryInterface $operationFactory
     * @param PhongoDatabase            $mongodb
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        PhongoDatabase $mongodb
    ) {
        $this->mongodb = $mongodb;
        parent::__construct($operationFactory);
    }

    /**
     * @inheritDoc
     */
    public function collectionOperation(string $collectionName, DocumentEntityInterface $entity) : OperationInterface
    {
        return $this->decorate(new CollectionOperation($this->mongodb, $collectionName, $entity));
    }
}