<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreditorsRequest;
use App\Http\Traits\CommonFields;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CreditorsCrudController
 * @package App\Http\Controllers
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CreditorsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Creditors::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/creditors');
        CRUD::setEntityNameStrings(__('crud.creditors.creditor'), __('crud.creditors.creditors'));

        $this->data['breadcrumbs'] = [
            trans('GeSic') => backpack_url('dashboard'),
            __('crud.creditors.creditors') => false,
        ];
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->enableExportButtons();

        $this->addColumnType();
        $this->addColumnCode();
        $this->addColumnName();
        $this->addColumnAddress();
        $this->addColumnNumber();
        $this->addColumnZipcode();
        $this->addColumnComplement();
        $this->addColumnCountry();
        $this->addColumnState();
        $this->addColumnCity();
        $this->addColumnPhone();
        $this->addColumnConsortium();
        $this->addColumnContactAgent();
        $this->addColumnNotes();
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CreditorsRequest::class);

        $tab1 = __('crud.creditors.basic_information');
        $tab2 = __('crud.creditors.additional_information');

        $this->addFieldTypeOfCreditorCombo($tab1);
        $this->addFieldCreditorCodeCustom($tab1);
        $this->addFieldNameText($tab1, true);
        $this->addFieldAddressText($tab1);
        $this->addFieldNumberNumber($tab1);
        $this->addFieldZipcodeText($tab1);
        $this->addFieldComplementText($tab1);
        $this->addFieldCountryCombo($tab1);
        $this->addFieldStateCombo($tab1);
        $this->addFieldCityCombo($tab1);

        $this->addFieldConsortiumCheckbox($tab2);
        $this->addFieldPhoneText($tab2);
        $this->addFieldContactAgentText($tab2);
        $this->addFieldNotesTextarea($tab2);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function addColumnType()
    {
        CRUD::addColumn([
            'name' => 'type_id',
            'label' => __('fields_columns.type_of_creditor'),
            'type' => 'model_function',
            'function_name' => 'getType',
            'visibleInTable' => true,
            'visibleInExport' => true,
        ]);
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

    protected function addColumnName()
    {
        CRUD::addColumn([
            'name' => 'name',
            'label' => __('fields_columns.name'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnAddress()
    {
        CRUD::addColumn([
            'name' => 'address',
            'label' => __('fields_columns.address'),
            'type' => 'text',
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnNumber()
    {
        CRUD::addColumn([
            'name' => 'number',
            'label' => __('fields_columns.number'),
            'type' => 'number',
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnZipcode()
    {
        CRUD::addColumn([
            'name' => 'zipcode',
            'label' => __('fields_columns.zipcode'),
            'type' => 'text',
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnComplement()
    {
        CRUD::addColumn([
            'name' => 'complement',
            'label' => __('fields_columns.complement'),
            'type' => 'text',
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnCountry()
    {
        CRUD::addColumn([
            'name' => 'country_id',
            'label' => __('fields_columns.country'),
            'type' => 'model_function',
            'function_name' => 'getCountry',
            'visibleInTable' => true,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnState()
    {
        CRUD::addColumn([
            'name' => 'state_id',
            'label' => __('fields_columns.state'),
            'type' => 'model_function',
            'function_name' => 'getState',
            'visibleInTable' => true,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnCity()
    {
        CRUD::addColumn([
            'name' => 'city_id',
            'label' => __('fields_columns.city'),
            'type' => 'model_function',
            'function_name' => 'getCity',
            'visibleInTable' => true,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnPhone()
    {
        CRUD::addColumn([
            'name' => 'phone',
            'label' => __('fields_columns.phone'),
            'type' => 'text',
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnConsortium()
    {
        CRUD::addColumn([
            'name' => 'consortium',
            'label' => __('fields_columns.consortium'),
            'type' => 'boolean',
            'options' => [0 => 'No', 1 => 'Yes'],
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnContactAgent()
    {
        CRUD::addColumn([
            'name' => 'contact_agent',
            'label' => __('fields_columns.contact_agent'),
            'type' => 'text',
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }

    protected function addColumnNotes()
    {
        CRUD::addColumn([
            'name' => 'notes',
            'label' => __('fields_columns.notes'),
            'type' => 'text',
            'limit' => 150,
            'visibleInTable' => false,
            'visibleInExport' => true,
        ]);
    }
}
