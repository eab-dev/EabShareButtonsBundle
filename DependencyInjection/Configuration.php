<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace Eab\ShareButtonsBundle\DependencyInjection;

use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\SiteAccessAware\Configuration as SiteAccessConfiguration;
use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration extends SiteAccessConfiguration
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root( 'ez_share_buttons' );
        $systemNode = $this->generateScopeBaseNode( $rootNode );
        $this->addPinterestSettings( $systemNode );
        return $treeBuilder;
    }

    private function addPinterestSettings( NodeBuilder $nodeBuilder )
    {
        $nodeBuilder
            ->arrayNode( 'pinterest' )
                ->children()
                    ->booleanNode( 'round' )->isRequired()->end()
                    ->booleanNode( 'large' )->isRequired()->end()
                    ->scalarNode( 'color' )->isRequired()->end()
                    ->scalarNode( 'language' )->isRequired()->end()
                ->end()
            ->end();
    }
}
