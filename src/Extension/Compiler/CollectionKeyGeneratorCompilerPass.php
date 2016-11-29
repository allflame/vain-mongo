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

namespace Vain\Mongo\Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class CollectionKeyGeneratorCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionKeyGeneratorCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('collection.key.generator.storage')) {
            return $this;
        }

        $definition = $container->findDefinition('collection.key.generator.storage');
        $services = $container->findTaggedServiceIds('collection.key.generator');
        foreach ($services as $id => $tags) {
            $definition->addMethodCall('addGenerator', [new Reference($id)]);
        }

        return $this;
    }
}