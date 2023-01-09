<?php

namespace App\Form\PageParts;

use App\Form\TwoColImageTextAdminType;
use Kunstmaan\MediaBundle\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * TwoColImageTextPagePartAdminType
 */
class TwoColImageTextPagePartAdminType extends \Symfony\Component\Form\AbstractType
{
    /**
     * Builds the form.
     *
     * This method is called for each type in the hierarchy starting form the
     * top most type. Type extensions can further modify the form.
     *
     * @param FormBuilderInterface $builder The form builder
     * @param array                $options The options
     *
     * @see FormTypeExtensionInterface::buildForm()
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', [
            'required' => false,
        ]);
        $builder->add('subtitle', 'Symfony\Component\Form\Extension\Core\Type\TextType', [
            'required' => false,
        ]);
        $builder->add('content', TextareaType::class, [
            'required'    => false,
        ]);
        $builder->add('twoColImageTexts', CollectionType::class, [
            'required'     => true,
            'entry_type'   => TwoColImageTextAdminType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
            'label'        => 'Rows',
            'attr'         => [
                'nested_form'           => true,
                'nested_form_min'       => 1,
                'nested_sortable'       => true,
                'nested_sortable_field' => 'displayOrder',
            ],
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getBlockPrefix()
    {
        return 'app_twocolimagetextpageparttype';
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options.
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => '\App\Entity\PageParts\TwoColImageTextPagePart',
        ]);
    }
}
