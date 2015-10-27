<?php

namespace Victoire\Widget\RichListBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ListingBundle\Form\WidgetListingItemType;

/**
 * WidgetRichList form type.
 */
class WidgetRichListItemType extends WidgetListingItemType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('title', null, [
                'label'    => 'widget_richlist.form.title.label',
                'required' => true,
            ])
            ->add('description', 'ckeditor', [
                'label'    => 'widget_richlist.form.description.label',
                'required' => true,
            ])
            ->add('kind', null, [
                'label'    => 'widget_richlist.form.kind.label',
                'required' => true,
            ])
            ->add('poster', 'media', [
                'label'    => 'widget_richlist.form.poster.label',
                'required' => false, ])
            ->add('link', 'victoire_link')
            ->add('linkLabel', null, [
                'label'    => 'form.widget_richlist.linkLabel.label',
                'required' => false,
            ])
            ->add('linkEnabled', 'checkbox', [
                    'label'    => 'form.widget_richlist.linkEnabled.label',
                    'required' => false,
                    'attr'     => [
                        'onchange' => 'linkEnable($vic(this).is(\':checked\']);',
                    ],
            ]);
    }

    /**
     * bind form to WidgetRichList entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\RichListBundle\Entity\WidgetRichListItem',
            'translation_domain' => 'victoire',
        ]);
    }

    /**
     * get form name.
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_richlist';
    }
}
