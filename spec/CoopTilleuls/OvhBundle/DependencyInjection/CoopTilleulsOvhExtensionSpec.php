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
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * CoopTilleulsOvhExtension Spec.
 *
 * @author Kévin Dunglas <kevin@les-tilleuls.coop>
 */
class CoopTilleulsOvhExtensionSpec extends ObjectBehavior
{
    const APPLICATION_KEY = 'ApplicationKey';
    const APPLICATION_SECRET = 'ApplicationSecret';
    const ENDPOINT_NAME = 'ovh-eu';
    const CONSUMER_KEY = 'ConsumerKey';

    function it_is_initializable()
    {
        $this->shouldHaveType('CoopTilleuls\OvhBundle\DependencyInjection\CoopTilleulsOvhExtension');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ConfigurationExtensionInterface');
        $this->shouldImplement('Symfony\Component\DependencyInjection\Extension\ExtensionInterface');
    }

    function it_loads(ContainerBuilder $container)
    {
        $container->fileExists(Argument::type('string'))->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ovh.application_key', self::APPLICATION_KEY)->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ovh.application_secret', self::APPLICATION_SECRET)->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ovh.endpoint_name', self::ENDPOINT_NAME)->shouldBeCalled();
        $container->setParameter('coop_tilleuls_ovh.consumer_key', self::CONSUMER_KEY)->shouldBeCalled();
        $container->hasExtension('http://symfony.com/schema/dic/services')->shouldBeCalled();
        $container->setDefinition('coop_tilleuls_ovh.api', Argument::type('Symfony\Component\DependencyInjection\Definition'))->shouldBeCalled();
        $container->setAlias('ovh', Argument::type('Symfony\Component\DependencyInjection\Alias'))->shouldBeCalled();

        $configs = array(
            array(
                'application_key' => self::APPLICATION_KEY,
                'application_secret' => self::APPLICATION_SECRET,
                'endpoint_name' => self::ENDPOINT_NAME,
                'consumer_key' => self::CONSUMER_KEY,
            )
        );

        $this->load($configs, $container);
    }
}
