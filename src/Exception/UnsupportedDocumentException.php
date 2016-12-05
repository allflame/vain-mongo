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

use Vain\Mongo\Collection\CollectionInterface;
use Vain\Mongo\Document\DocumentInterface;

/**
 * Class UnsupportedDocumentException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedDocumentException extends CollectionException
{
    private $document;

    public function __construct(CollectionInterface $collection, DocumentInterface $document)
    {
        $this->document = $document;
        parent::__construct(
            $collection,
            sprintf(
                'Collection %s cannot store document %s',
                $collection->getName(),
                $document->getName()
            )
        );
    }
}