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

/**
 * Class CollectionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CollectionInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param DocumentInterface $document
     *
     * @return array
     */
    public function generateCriteria(DocumentInterface $document) : array;

    /**
     * @param DocumentInterface $document
     *
     * @return string
     */
    public function generateId(DocumentInterface $document) : string;
}
