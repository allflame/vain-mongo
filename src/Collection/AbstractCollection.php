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

namespace Vain\Mongo\Collection;

use Vain\Mongo\Document\DocumentInterface;
use Vain\Mongo\Exception\UnsupportedDocumentException;
use Vain\Time\Counter\TimeCounterInterface;

/**
 * Class AbstractCollection
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractCollection implements CollectionInterface
{

    private $name;

    private $counter;

    /**
     * AbstractCollection constructor.
     *
     * @param string               $name
     * @param TimeCounterInterface $counter
     */
    public function __construct(string $name, TimeCounterInterface $counter)
    {
        $this->name = $name;
        $this->counter = $counter;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TimeCounterInterface
     */
    public function getCounter(): TimeCounterInterface
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