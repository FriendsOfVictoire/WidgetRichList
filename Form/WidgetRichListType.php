<?php

namespace Victoire\Widget\RichListBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\ListingBundle\Form\WidgetListingType;

/**
 * WidgetRichListItem form type.
 */
class WidgetRichListType extends WidgetListingType
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
        $builder->add('richs', CollectionType::class, [
            'entry_type' => WidgetRichListItemType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'entry_options'            => [
                'businessEntityId' => $options['businessEntityId'],
                'widget'           => $options['widget'],
            ],
            'attr' => ['id' => 'static'],
        ]);

        //add the mode to the form
        $builder->add('mode', HiddenType::class, [
            'data' => $options['mode'],
        ]);

        //add the slot to the form
        $builder->add('slot', HiddenType::class, []);
        $this->addCriteriasFields($builder, $options);
    }

    /**
     * bind form to WidgetRichList entity.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\RichListBundle\Entity\WidgetRichList',
            'widget'             => 'RichList',
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
