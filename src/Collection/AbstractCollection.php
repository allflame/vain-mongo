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

/**
 * Class AbstractCollection
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractCollection implements CollectionInterface
{

    private $name;

    /**
     * AbstractCollection constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
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
     * @param DocumentInterface $document
     *
     * @return bool
     */
    abstract public function supports(DocumentInterface $document) : bool;

    /**
     * @param DocumentInterface $document
     *
     * @return array
     */
    abstract public function doToArray(DocumentInterface $document) : array;

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

    /**
     * @inheritDoc
     */
    public function toArray(DocumentInterface $document) : array
    {
        if (false === $this->supports($document)) {
            throw new UnsupportedDocumentException($this, $document);
        }

        return $this->doToArray($document);
    }

}