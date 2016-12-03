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

namespace Vain\Mongo\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Extension\AbstractExtension;
use Vain\Mongo\Extension\Compiler\CollectionKeyCompilerPass;

/**
 * Class MongoExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MongoExtension extends AbstractExtension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractExtension
    {
        $container->addCompilerPass(new CollectionKeyCompilerPass());

        return parent::load($configs, $container);
    }
}