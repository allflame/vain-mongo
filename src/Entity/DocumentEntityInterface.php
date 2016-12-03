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

namespace Vain\Mongo\Entity;

use Vain\Entity\EntityInterface;

/**
 * Class DocumentEntityInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DocumentEntityInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getDocumentId() : string;
}