<?php

namespace App\Http\Controllers;

use App\Http\Requests\CostCenterRequest;
use App\Http\Traits\CommonFields;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CostCenterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CostCenterCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use CommonFields;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CostCenter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/cost-center');
        CRUD::setEntityNameStrings('Centro de Custo', 'Centro de Custos');

        CRUD::orderBy('year','desc');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::setFromDb(); // columns

        CRUD::addColumn([
            'name'  => 'organ_id',
            'label' => 'Órgão',
            'type'  => 'string'
        ]);

        CRUD::addColumn([
            'name'  => 'code',
            'label' => 'Código',
            'type'  => 'string'
        ]);

        CRUD::addColumn([
            'name'  => 'description',
            'label' => 'Descrição',
            'type'  => 'string'
        ]);

        CRUD::addColumn([
            'name'  => 'year',
            'label' => 'Ano',
            'type'  => 'string'
        ]);

        CRUD::addColumn([
            'name'  => 'status',
            'label' => 'Situação',
            'type'  => 'boolean'
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CostCenterRequest::class);

//        CRUD::setFromDb(); // fields

        CRUD::addField([  // Select2
            'label'     => "Orgão",
            'type'      => 'select2',
            'name'      => 'organ_id', // the db column for the foreign key
            'entity'    => 'organ', // the method that defines the relationship in your Model
            'model'     => "App\Models\Organ", // foreign key model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'default'   => 2, // set the default value of the select2
            'allows_null'     => true,
//            'options'   => (function ($query) {
//                return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
//            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);

        CRUD::addField([  // Select2
            'label'     => "Descrição",
            'type'      => 'text',
            'name'      => 'description', // the db column for the foreign key
        ]);

        CRUD::addField([  // Select2
            'label'     => "Descrição",
            'type'      => 'text',
            'name'      => 'description', // the db column for the foreign key
        ]);


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


    protected function addColumnCode()
    {
        CRUD::addColumn([
            'name' => 'code',
            'label' => __('fields_columns.code'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInExport' => true,
        ]);
    }
}
