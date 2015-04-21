Victoire RichList Widget
============

Need to add a rich list in a victoire cms website ?
Get this richlist bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require victoire/richlist-bundle

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\RichListBundle\VictoireWidgetRichListBundle(),
            );

            return $bundles;
        }
    }
