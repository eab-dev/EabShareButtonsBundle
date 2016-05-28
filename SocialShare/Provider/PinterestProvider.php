<?php

namespace Eab\ShareButtonsBundle\SocialShare\Provider;

use EzSystems\ShareButtonsBundle\SocialShare\Provider\TemplateBasedProvider;

/**
 * Pinterest share button provider class
 */
class PinterestProvider extends TemplateBasedProvider
{
    /**
     * {@inheritdoc}
     */
    public function render(  array $options = array(  )  )
    {
        $options[ 'template' ] = 'pinterest.html.twig';

        return $this->doRender( $options );
    }

    /**
     * Performs share button rendering.
     *
     * @param array $options
     *
     * @return string
     *
     * @throws \InvalidArgumentException if template engine is not set
     * @throws \InvalidArgumentException if provider label is not set
     */
    protected function doRender( array $options )
    {
        if ( !isset( $this->templateEngine ) ) {
            throw new InvalidArgumentException( 'Missing template engine' );
        }

        if ( !isset( $this->label ) ) {
            throw new InvalidArgumentException( 'Missing provider label' );
        }

        if ( isset( $options[ $this->label ] ) ) {
            $options = array_merge( $this->options, $options[ $this->label ], $options );
            unset( $options[ $this->label ] );
        } else {
            $options = $options + $this->options;
        }

        $template = sprintf(
            'EabShareButtonsBundle::%s/%s',
            $this->templateName,
            $options[ 'template' ]
         );

        return $this->templateEngine->render( $template, $options );
    }
}
