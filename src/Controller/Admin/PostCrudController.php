<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    
    public function configureFields(string $pageName): iterable
    {

        $imageFile = TextareaField::new('imageFile')->setFormType(VichImageType::class);

        return [
            TextField::new('title'),
            TextareaField::new('content'),
            DateField::new('date')->hideOnForm(),
            Field::new('imageFile')->setFormType(VichImageType::class),
        ];
    }

    public function configureCrud(Crud $crud): Crud
{
    return $crud
        ->setDefaultSort(['date' => 'DESC']);
}

}
