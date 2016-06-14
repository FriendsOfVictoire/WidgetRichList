<?php

namespace Victoire\Widget\RichListBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\FormBundle\Form\Type\LinkType;
use Victoire\Bundle\MediaBundle\Form\Type\MediaType;
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
    public function buildForm($builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('title', null, [
                'label'    => 'widget_richlist.form.title.label',
                'required' => true,
            ])
            ->add('description', CKEditorType::class, [
                'label'    => 'widget_richlist.form.description.label',
                'required' => true,
            ])
            ->add('kind', null, [
                'label'    => 'widget_richlist.form.kind.label',
                'required' => true,
            ])
            ->add('poster', MediaType::class, [
                'label'    => 'widget_richlist.form.poster.label',
                'required' => false, ])
            ->add('link', LinkType::class)
            ->add('linkLabel', null, [
                'label'    => 'form.widget_richlist.linkLabel.label',
                'required' => false,
            ])
            ->add('linkEnabled', CheckboxType::class, [
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
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\RichListBundle\Entity\WidgetRichListItem',
            'translation_domain' => 'victoire',
        ]);
    }

    /**
     * get form block prefix.
     *
     * @return string The form name
     */
    public function getBlockPrefix()
    {
        return 'victoire_widget_form_richlist';
    }
}
