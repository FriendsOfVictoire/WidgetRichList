<?php

namespace Victoire\Widget\RichListBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ListingBundle\Form\WidgetListingItemType;

/**
 * WidgetRichList form type
 */
class WidgetRichListItemType extends WidgetListingItemType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('title', null, array(
                'label'    => 'widget_richlist.form.title.label',
                'required' => true,
            ))
            ->add('description', 'ckeditor', array(
                'label'    => 'widget_richlist.form.description.label',
                'required' => true,
            ))
            ->add('kind', null, array(
                'label'    => 'widget_richlist.form.kind.label',
                'required' => true,
            ))
            ->add('poster', 'media', array(
                'label'    => 'widget_richlist.form.poster.label',
                'required' => false, ))
            ->add('link', 'victoire_link')
            ->add('linkLabel', null, array(
                'label'    => 'form.widget_richlist.linkLabel.label',
                'required' => false,
            ))
            ->add('linkEnabled', 'checkbox', array(
                    'label'    => 'form.widget_richlist.linkEnabled.label',
                    'required' => false,
                    'attr'     => array(
                        'onchange' => 'linkEnable($vic(this).is(\':checked\'));',
                    ),
            ));
    }

    /**
     * bind form to WidgetRichList entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\RichListBundle\Entity\WidgetRichListItem',
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
