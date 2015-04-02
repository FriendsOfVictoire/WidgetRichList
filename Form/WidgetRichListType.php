<?php

namespace Victoire\Widget\RichListBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ListingBundle\Form\WidgetListingType;

/**
 * WidgetRichListItem form type
 */
class WidgetRichListType extends WidgetListingType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entityName = $options['entityName'];
        $namespace = $options['namespace'];
        $mode = $options['mode'];

        $builder->add('richs', 'collection', array(
            'type'         => new WidgetRichListItemType($entityName, $namespace, $options['widget']),
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
            'options'      => array(
                'namespace'  => $namespace,
                'entityName' => $entityName,
                'mode'       => 'static',
            ),
            "attr"         => array('id' => 'static'),
        ));

        //add the mode to the form
        $builder->add('mode', 'hidden', array(
            'data' => $mode,
        ));

        //add the slot to the form
        $builder->add('slot', 'hidden', array());
    }

    /**
     * bind form to WidgetRichList entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\RichListBundle\Entity\WidgetRichList',
            'widget'             => 'RichList',
            'translation_domain' => 'victoire',
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_richlist';
    }
}
