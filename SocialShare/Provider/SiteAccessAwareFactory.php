<?php

namespace Eab\ShareButtonsBundle\SocialShare\Provider;

use EzSystems\ShareButtonsBundle\SocialShare\Provider\SiteAccessAwareFactory as EzSystemsSiteAccessAwareFactory;

class SiteAccessAwareFactory extends EzSystemsSiteAccessAwareFactory
{

    /**
     * Build Pinterest button provider
     *
     * @return \EzSystems\ShareButtonsBundle\SocialShare\ProviderInterface
     */
    public function buildPinterest()
    {
        $pinterestProvider = new PinterestProvider(array(
            'round' => $this->configResolver->getParameter( 'pinterest.round', 'ez_share_buttons' ),
            'large' => $this->configResolver->getParameter( 'pinterest.large', 'ez_share_buttons' ),
            'color' => $this->configResolver->getParameter( 'pinterest.color', 'ez_share_buttons' ),
            'language' => $this->configResolver->getParameter( 'pinterest.language', 'ez_share_buttons' )
        ));

        return $pinterestProvider;
    }
}
