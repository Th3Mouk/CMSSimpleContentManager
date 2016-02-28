<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\CMSSimpleContentManagerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ContentAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('textKey')
            ->add('textValue')
            ->add('createdAt', 'doctrine_orm_datetime', array(
                'field_type' => 'sonata_type_datetime_picker',
            ))
            ->add('updatedAt', 'doctrine_orm_datetime', array(
                'field_type' => 'sonata_type_datetime_picker',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('textKey')
            ->add('textValue', 'html')
            ->add('createdAt', null, array(
                'template' => 'Th3MoukCMSSimpleContentManagerBundle:Admin/cells:i18n_datetime.html.twig',
            ))
            ->add('updatedAt', null, array(
                'template' => 'Th3MoukCMSSimpleContentManagerBundle:Admin/cells:i18n_datetime.html.twig',
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show'   => array(),
                    'edit'   => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('textKey')
            ->add('textValue', 'ckeditor')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('textKey')
            ->add('textValue')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
