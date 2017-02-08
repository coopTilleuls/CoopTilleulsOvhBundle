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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * {@inheritdoc}
 *
 * @author Kévin Dunglas <kevin@les-tilleuls.coop>
 */
class CoopTilleulsOvhExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('coop_tilleuls_ovh.application_key', $config['application_key']);
        $container->setParameter('coop_tilleuls_ovh.application_secret', $config['application_secret']);
        $container->setParameter('coop_tilleuls_ovh.endpoint_name', $config['endpoint_name']);
        $container->setParameter('coop_tilleuls_ovh.consumer_key', $config['consumer_key']);
        $container->setParameter('coop_tilleuls_ovh.timeout', $config['timeout']);
        $container->setParameter('coop_tilleuls_ovh.connect_timeout', $config['connect_timeout']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
