<?php

namespace App\Controller\Admin;

use App\Entity\SmBonos;

use EasyCorp\Bundle\EasyAdminBundle\Config\KeyValueStore;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;




class SmBonosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SmBonos::class;
    }

    public function configureFields(string $pageName): iterable
    {
      
        return [
            //IdField::new('id'),
            FormField::addPanel('Registro de Bonos'),

            DateField::new('fecha','Fecha del Bono')->setFormat('dd/MMMM/yyyy'),
            
            TextField::new('departamento', 'Departamento'),
            
            TextField::new('motivo', 'Motivo del Bono'),

            AssociationField::new('SmUsuario', 'Usuario Beneficiado'),

            MoneyField::new('bono', 'Valor del bono')->setCurrency('USD')->setTextAlign('right'),
           
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the visible title at the top of the page and the content of the <title> element
            // it can include these placeholders: %entity_id%, %entity_label_singular%, %entity_label_plural%
            ->setPageTitle('index', 'Listado de Bonos Registrados:')

            ->setPageTitle('new', 'Registrar un Bono:')

            ->setDefaultSort(['fecha' => 'DESC'])
        
           
    
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        
        return $filters
            ->add(DateTimeFilter::new('fecha','Fecha'))
    
            ->add(EntityFilter::new('SmUsuario','Beneficiario'))

            ->add('departamento','Departamento')
           
                
        ;
    }
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
