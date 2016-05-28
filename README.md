EabShareButtonsBundle
=====================

##Summary

An eZ Publish 5 bundle extending [EzSystemsShareButtonsBundle](https://github.com/ezsystems/EzSystemsShareButtonsBundle).

So far, it just adds one more button provider, for Pinterest.
This bundle only provides the 'Any image' button type
(see the [Pinterest Widget builder](https://developers.pinterest.com/tools/widget-builder)).

##Copyright

Copyright (C) 2016 Andy Caiger, [Enterprise AB Ltd](http://www.eab.co.uk)

##License

Licensed under [GNU General Public License 2.0](http://www.gnu.org/licenses/gpl-2.0.html)

##Install

You can install this bundle and its dependencies using composer:

    composer require --update-no-dev --prefer-dist eab/sharebuttonsbundle

Then edit `registerBundles()` in `ezpublish/EzPublishKernel.php` and add the following:

    new EzSystems\ShareButtonsBundle\EzSystemsShareButtonsBundle(),
    new Eab\ShareButtonsBundle\EabShareButtonsBundle(),

Finally, clear the cache and dump the assets:

    php ezpublish/console cache:clear --env=prod
    php ezpublish/console assetic:dump --env=prod

##Customising

Custom images are not supported but you can vary the colour, size, shape and
language of the button. To do this, override the default settings by putting
values in the `default_settings.yml` of your own bundle. For example:

    # Colour of Pinterest share button
    ez_share_buttons.default.pinterest.color: red
