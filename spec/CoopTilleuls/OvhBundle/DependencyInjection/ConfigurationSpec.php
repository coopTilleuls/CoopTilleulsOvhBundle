<?php

/*
 * This file is part of the CoopTilleulsOvhBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CoopTilleuls\OvhBundle\DependencyInjection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Configuration Spec.
 *
 * @author Kévin Dunglas <kevin@les-tilleuls.coop>
 */
class ConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\OvhBundle\DependencyInjection\Configuration');
        $this->shouldImplement('Symfony\Component\Config\Definition\ConfigurationInterface');
    }

    function it_creates_config_tree_builder()
    {
        $this->getConfigTreeBuilder()->shouldHaveType('Symfony\Component\Config\Definition\Builder\TreeBuilder');
    }
}
