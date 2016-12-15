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

namespace Vain\Mongo\Document;

use Vain\Mongo\Collection\OperationCollectionInterface;

/**
 * Interface DocumentEntityInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DocumentInterface
{
    /**
     * @return string
     */
    public function getDocumentName() : string;

    /**
     * @param OperationCollectionInterface $collection
     *
     * @return array
     */
    public function toDocument(OperationCollectionInterface $collection) : array;
}
