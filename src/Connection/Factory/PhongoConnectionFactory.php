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

namespace Vain\Mongo\Connection\Factory;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Factory\AbstractConnectionFactory;
use Vain\Mongo\Connection\PhongoConnection;

/**
 * Class PhongoConnectionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PhongoConnectionFactory extends AbstractConnectionFactory
{
    /**
     * @inheritDoc
     */
    public function createConnection(array $config) : ConnectionInterface
    {
        return new PhongoConnection($config);
    }
}
