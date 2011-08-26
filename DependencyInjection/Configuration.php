<?php

namespace Iga\BootstrapBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('iga_bootstrap');

        $rootNode
            ->children()
                    ->arrayNode('helper')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->defaultValue('Iga\BootstrapBundle\Templating\Helper\BootstrapHelper')->end()
                    ->end()
                ->end()
                   	->arrayNode('twig')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('class')->defaultValue('Iga\BootstrapBundle\Twig\Extension\BootstrapExtension')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
