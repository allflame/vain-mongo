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

namespace Vain\Mongo\Factory;

use Vain\Database\Factory\AbstractDatabaseFactory;

/**
 * Class PhongoDatabaseFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PhongoDatabaseFactory extends AbstractDatabaseFactory
{
    /**
     * @inheritDoc
     */
    public function createDatabase(array $configData, $connection)
    {
        return $connection;
    }
}