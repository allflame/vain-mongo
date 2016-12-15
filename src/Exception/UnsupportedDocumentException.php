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

namespace Vain\Mongo\Exception;

use Vain\Mongo\Document\Collection\DocumentCollectionInterface;
use Vain\Mongo\Document\DocumentInterface;

/**
 * Class UnsupportedDocumentException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedDocumentException extends DocumentCollectionException
{
    private $document;

    /**
     * UnsupportedDocumentException constructor.
     *
     * @param DocumentCollectionInterface $collection
     * @param DocumentInterface           $document
     */
    public function __construct(DocumentCollectionInterface $collection, DocumentInterface $document)
    {
        $this->document = $document;
        parent::__construct(
            $collection,
            sprintf(
                'Collection %s cannot store document %s',
                $collection->getName(),
                $document->getDocumentName()
            )
        );
    }
}
