<?php

/*
 * This file is part of the CoopTilleulsOvhBundle package.
 *
 * (c) La Coopérative des Tilleuls <contact@les-tilleuls.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\CoopTilleuls\OvhBundle;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * CoopTilleulsOvhBundle Spec.
 *
 * @author Kévin Dunglas <kevin@les-tilleuls.coop>
 */
class CoopTilleulsOvhBundleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\OvhBundle\CoopTilleulsOvhBundle');
        $this->shouldImplement('Symfony\Component\HttpKernel\Bundle\BundleInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\ContainerAwareInterface');
    }
}
