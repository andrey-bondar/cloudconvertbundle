<?php

namespace BestModules\CloudConvertBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('best_modules_cloud_convert');
        
        $rootNode
            ->children()
                ->scalarNode('api_key')->isRequired()->end()
            ->end()
        ;


        return $treeBuilder;
    }
}
