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

namespace Vain\Mongo\Operation;

use Vain\Entity\EntityInterface;
use Vain\Mongo\Collection\Key\Generator\CollectionKeyGeneratorInterface;
use Vain\Operation\OperationInterface;
use Vain\Operation\Result\Failed\FailedOperationResult;
use Vain\Operation\Result\OperationResultInterface;
use Vain\Operation\Result\Successful\SuccessfulOperationResult;

/**
 * Class AbstractCollectionOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionOperation implements OperationInterface
{
    private $mongodb;

    private $keyGenerator;

    private $entity;

    /**
     * AbstractCollectionOperation constructor.
     *
     * @param \MongoDB                        $mongodb
     * @param CollectionKeyGeneratorInterface $keyGenerator
     * @param EntityInterface                 $entity
     */
    public function __construct(\MongoDB $mongodb, CollectionKeyGeneratorInterface $keyGenerator, EntityInterface $entity)
    {
        $this->mongodb = $mongodb;
        $this->keyGenerator = $keyGenerator;
        $this->entity = $entity;
    }

    /**
     * @inheritDoc
     */
    public function execute() : OperationResultInterface
    {
        if (false === $this->mongodb
                ->selectCollection($this->keyGenerator->getName())
                ->update(
                    ['_id' => $this->keyGenerator->generateCollectionKey($this->entity)],
                    $this->entity->toArray(),
                    ['upsert' => true]
                )
        ) {
            return new FailedOperationResult();
        }

        return new SuccessfulOperationResult();
    }
}