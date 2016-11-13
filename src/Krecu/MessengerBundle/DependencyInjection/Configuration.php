<?php

namespace Krecu\MessengerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('messenger');

        $rootNode
            ->children()
                ->scalarNode('message_class')->isRequired()->cannotBeEmpty()->end()
                ->arrayNode('engines')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                    ->children()
                        ->scalarNode('sender_class')->isRequired()->end()
                        ->scalarNode('render_class')->isRequired()->end()
                        ->arrayNode('params')
                            ->useAttributeAsKey('name')
                            ->prototype('variable')
                            ->isRequired()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
