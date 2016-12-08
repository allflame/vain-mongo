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

namespace Vain\Mongo\Database;

use MongoDB\Database;
use Vain\Connection\ConnectionInterface;
use Vain\Database\DatabaseInterface;
use Vain\Database\Generator\GeneratorInterface;

/**
 * Class PhongoDatabase
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PhongoDatabase extends Database implements DatabaseInterface
{
    private $connection;

    /**
     * MongoDatabase constructor.
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function __debugInfo()
    {
        return $this->connection->establish()->__debugInfo();
    }

    /**
     * @inheritDoc
     */
    public function __get($collectionName)
    {
        return $this->connection->establish()->__get($collectionName);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->connection->establish()->__toString();
    }

    /**
     * @inheritDoc
     */
    public function command($command, array $options = [])
    {
        return $this->connection->establish()->command($command, $options);
    }

    /**
     * @inheritDoc
     */
    public function createCollection($collectionName, array $options = [])
    {
        return $this->connection->establish()->createCollection($collectionName, $options);
    }

    /**
     * @inheritDoc
     */
    public function drop(array $options = [])
    {
        return $this->connection->establish()->drop($options);
    }

    /**
     * @inheritDoc
     */
    public function dropCollection($collectionName, array $options = [])
    {
        return $this->connection->establish()->dropCollection($collectionName, $options);
    }

    /**
     * @inheritDoc
     */
    public function getDatabaseName()
    {
        return $this->connection->establish()->getDatabaseName();
    }

    /**
     * @inheritDoc
     */
    public function listCollections(array $options = [])
    {
        return $this->connection->establish()->listCollections($options);
    }

    /**
     * @inheritDoc
     */
    public function selectCollection($collectionName, array $options = [])
    {
        return $this->connection->establish()->selectCollection($collectionName, $options);
    }

    /**
     * @inheritDoc
     */
    public function withOptions(array $options = [])
    {
        return $this->connection->establish()->withOptions($options);
    }

    /**
     * @inheritDoc
     */
    public function runQuery($query, array $bindParams, array $bindTypes = []) : GeneratorInterface
    {
        return $this->command($query, $bindParams);
    }
}