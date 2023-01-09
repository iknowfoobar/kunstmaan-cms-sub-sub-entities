<?php

namespace App\Form;

use App\Entity\TwoColImageText;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class TwoColImageTextAdminType extends AbstractType
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

        $builder->add('title', TextType::class, [
            'required'    => false,
        ]);

        $builder->add('content', TextareaType::class, [
            'required'    => false,
        ]);

        $builder->add('images', CollectionType::class, [
            'required'     => true,
            'entry_type'   => TwoColImageTextImageAdminType::class,
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
            'label'        => 'Images',
            'attr'         => [
                'nested_form'           => true,
                'nested_form_min'       => 1,
                'nested_sortable'       => true,
                'nested_sortable_field' => 'displayOrder',
            ],
        ]);

        $builder->add('displayOrder', HiddenType::class);
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolver $resolver the resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TwoColImageText::class,
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'two_col_image_text_type';
    }
}
