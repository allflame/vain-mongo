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

namespace Vain\Mongo\Database\Factory;

use Vain\Connection\ConnectionInterface;
use Vain\Database\Factory\AbstractDatabaseFactory;
use Vain\Mongo\Connection\PhongoConnection;

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
    public function createDatabase(array $configData, ConnectionInterface $connection)
    {
        /**
         * @var PhongoConnection $connection
         */
        return $connection->establish();
    }
}