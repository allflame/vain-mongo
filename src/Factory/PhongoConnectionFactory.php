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

use Vain\Connection\Exception\NoRequiredFieldException;
use Vain\Connection\Factory\AbstractConnectionFactory;

/**
 * Class PhongoConnectionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class PhongoConnectionFactory extends AbstractConnectionFactory
{
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
     *
     * @throws NoRequiredFieldException
     */
    protected function getCredentials(array $config) : array
    {
        $requiredFields = ['hosts', 'username', 'password', 'dbname'];
        foreach ($requiredFields as $requiredField) {
            if (false === array_key_exists($requiredField, $config)) {
                throw new NoRequiredFieldException($this, $requiredField);
            }
        }

        $hostsConfig = $config['hosts'];
        $connectionStrings = [];
        foreach ($hostsConfig as $hostConfig) {
            if (false === array_key_exists('host', $hostConfig)) {
                throw new NoRequiredFieldException($this, 'host');
            }
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
    public function createConnection(array $config)
    {
        list ($username, $password, $connectionString, $database, $options, $driverOptions)
            = $this->getCredentials($config);
        $dsn = sprintf('mongodb://%s@%s%s/%s', $username, $password, $connectionString, $database);

        return new \MongoClient($dsn, $options, $driverOptions);
    }
}