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

namespace Vain\Mongo\Document\Collection;

use Vain\Mongo\Document\DocumentInterface;
use Vain\Mongo\Exception\UnsupportedDocumentException;
use Vain\Core\Counter\CounterInterface;

/**
 * Class AbstractCollection
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDocumentCollection implements DocumentCollectionInterface
{

    private $name;

    private $counter;

    /**
     * AbstractCollection constructor.
     *
     * @param CounterInterface $counter
     * @param string               $name
     */
    public function __construct(CounterInterface $counter, string $name)
    {
        $this->counter = $counter;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return CounterInterface
     */
    public function getCounter(): CounterInterface
    {
        return $this->counter;
    }

    /**
     * @param DocumentInterface $document
     *
     * @return bool
     */
    abstract public function supports(DocumentInterface $document) : bool;

    /**
     * @param DocumentInterface $document
     *
     * @return string
     */
    abstract public function doGenerateId(DocumentInterface $document) : string;

    /**
     * @param DocumentInterface $document
     *
     * @return array
     */
    abstract public function doGenerateCriteria(DocumentInterface $document) : array;

    /**
     * @inheritDoc
     */
    public function generateCriteria(DocumentInterface $document) : array
    {
        if (false === $this->supports($document)) {
            throw new UnsupportedDocumentException($this, $document);
        }

        return $this->doGenerateCriteria($document);
    }

    /**
     * @inheritDoc
     */
    public function generateId(DocumentInterface $document) : string
    {
        if (false === $this->supports($document)) {
            throw new UnsupportedDocumentException($this, $document);
        }

        return $this->doGenerateId($document);
    }
}
