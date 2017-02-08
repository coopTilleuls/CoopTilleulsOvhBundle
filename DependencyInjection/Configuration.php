<?php

/*
 * This file is part of the CoopTilleulsOvhBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CoopTilleuls\OvhBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * {@inheritdoc}
 *
 * @author Kévin Dunglas <kevin@les-tilleuls.coop>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('coop_tilleuls_ovh');
        $rootNode
            ->children()
                ->scalarNode('application_key')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('application_secret')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('endpoint_name')->defaultValue('ovh-eu')->cannotBeEmpty()->end()
                ->scalarNode('consumer_key')->isRequired()->cannotBeEmpty()->end()
                ->integerNode('timeout')->defaultValue(30)->end()
                ->integerNode('connect_timeout')->defaultValue(5)->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
