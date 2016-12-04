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

use Vain\Entity\EntityInterface;

/**
 * Interface DocumentEntityInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DocumentEntityInterface extends EntityInterface
{
    /**
     * @return array
     */
    public function toDocument() : array;
}