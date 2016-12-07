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

namespace Vain\Mongo\Connection;

use \MongoDB\Client as MongoClient;
use Vain\Connection\ConnectionInterface;

/**
 * Class PhongoConnection
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PhongoConnection implements ConnectionInterface
{

    private $configData;

    /**
     * PhongoConnection constructor.
     *
     * @param array $configData
     */
    public function __construct(array $configData)
    {
        $this->configData = $configData;
    }

    /**
     * @param array $config
     *
     * @return string
     */
    protected function getPassword(array $config) : string
    {
        if (false === array_key_exists('password', $config)) {
            return '';
        }

        $password = $config['password'];

        if (false === array_key_exists('algo', $config)) {
            return $password;
        }

        return hash($config['algo'], $password);
    }

    /**
     * @param array $config
     *
     * @return array
     */
    protected function getCredentials(array $config) : array
    {
        $hostsConfig = $config['hosts'];
        $connectionStrings = [];
        foreach ($hostsConfig as $hostConfig) {
            $port = 27017;
            if (false !== array_key_exists('port', $hostConfig)) {
                $port = $hostConfig['port'];
            }
            $connectionStrings[] = sprintf('%s:%d', $hostConfig['host'], $port);
        }
        $connectionString = implode(',', $connectionStrings);

        $options = [];
        if (false !== array_key_exists('options', $config)) {
            $options = $config['options'];
        }

        $driverOptions = [];
        if (false !== array_key_exists('driverOptions', $config)) {
            $options = $config['driverOptions'];
        }

        return [
            $config['username'],
            $config['password'],
            $connectionString,
            $config['dbname'],
            $options,
            $driverOptions,
        ];
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->configData['type'];
    }

    /**
     * @inheritDoc
     */
    public function establish()
    {
        list ($username, $password, $connectionString, $database, $options, $driverOptions)
            = $this->getCredentials($this->configData);
        $dsn = sprintf('mongodb://%s:%s@%s/%s', $username, $password, $connectionString, $database);

        return (new MongoClient($dsn, $options, $driverOptions))->selectDatabase($database);
    }
}