<?php

/**
 * Traits to group CRUD Backpack common fields, and fields only - not columns.
 *
 * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
 */
namespace App\Http\Traits;

use App\Models\Code;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CommonFields for Backpack common fields_columns.
 *
 * @package App\Http\Traits
 * @example Method name for generic fields should be 'addField' + 'Name' + 'Text/Combo/Checkbox/...()'
 *          addFieldDescriptionText()
 *          Or, specifically, should be 'addField' + 'Model/Table' + 'Text/Combo/Checkbox/...()'
 *          addFieldCountryCombo()
 * @see https://backpackforlaravel.com/docs/4.0/crud-fields
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
 */
trait CommonFields
{
    // All fields should be shown in alphabetical order

    /**
     * Add form field to Abbreviation.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldAbbreviationText($tab = null)
    {
        CRUD::addField([
            'name' => 'abbreviation',
            'label' => __('fields_columns.abbreviation'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Address.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldAddressText($tab = null)
    {
        CRUD::addField([
            'name' => 'address',
            'label' => __('fields_columns.address'),
            'type' => 'text',
            'attributes' => [
                'onkeyup' => 'maiuscula(this)'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Alpha 2 code.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldAlpha2CodeText($tab = null)
    {
        CRUD::addField([
            'name' => 'alpha2_code',
            'label' => __('fields_columns.alpha2_code'),
            'type' => 'text',
            'attributes' => [
                'onkeyup' => 'minusculo(this)'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Alpha 3 code.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldAlpha3CodeText($tab = null)
    {
        CRUD::addField([
            'name' => 'alpha3_code',
            'label' => __('fields_columns.alpha3_code'),
            'type' => 'text',
            'attributes' => [
                'onkeyup' => 'maiuscula(this)'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Code id.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldCodeIdHidden($tab = null)
    {
        CRUD::addField([
            'name' => 'code_id',
            'label' => 'Code id',
            'type' => 'hidden',
            'value' => \Route::current()->parameter('code'),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Complement.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldComplementText($tab = null)
    {
        CRUD::addField([
            'name' => 'complement',
            'label' => __('fields_columns.complement'),
            'type' => 'text',
            'attributes' => [
                'onkeyup' => 'maiuscula(this)'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to City.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldCityCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'city_id',
            'label' => __('fields_columns.city'),
            'type' => 'relationship',
            'model' => 'App\Models\City',
            'entity' => 'city',
            'attribute' => 'name',
            'placeholder' => __('fields_columns.select') . ' ' . __('fields_columns.city'),
            'allows_null' => true,
            'options' => (function (Builder $query) {
                return $query->orderBy('name', 'ASC')
                    ->where('status', true)
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Consortium.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldConsortiumCheckbox($tab = null)
    {
        CRUD::addField([
            'name' => 'consortium',
            'label' => __('fields_columns.consortium'),
            'type' => 'checkbox',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Contact agent.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldContactAgentText($tab = null)
    {
        CRUD::addField([
            'name' => 'contact_agent',
            'label' => __('fields_columns.contact_agent'),
            'type' => 'text',
            'attributes' => [
                'onkeyup' => 'maiuscula(this)'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Country.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldCountryCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'country_id',
            'label' => __('fields_columns.country'),
            'type' => 'relationship',
            'model' => 'App\Models\Country',
            'entity' => 'country',
            'attribute' => 'name',
            'placeholder' => __('fields_columns.select') . ' ' . __('fields_columns.country'),
            'allows_null' => true,
            'options' => (function (Builder $query) {
                return $query->orderBy('name', 'ASC')
                    ->where('status', true)
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Creditor code.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldCreditorCodeCustom($tab = null)
    {
        CRUD::addField([
            'name' => 'code',
            'label' => __('fields_columns.code'),
            'type' => 'code_creditor',
            'attributes' => [
                'id' => 'code',
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Currency.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldCurrencyCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'currency_id',
            'label' => __('fields_columns.currency'),
            'type' => 'relationship',
            'model' => 'App\Models\Currency',
            'entity' => 'currency',
            'attribute' => 'name',
            'placeholder' => __('fields_columns.select') . ' ' . __('fields_columns.currency'),
            'allows_null' => true,
            'options' => (function (Builder $query) {
                return $query->orderBy('name', 'ASC')
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Description.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldDescriptionText($tab = null)
    {
        CRUD::addField([
            'name' => 'description',
            'label' => __('fields_columns.description'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Full name.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldFullNameText($tab = null)
    {
        CRUD::addField([
            'name' => 'full_name',
            'label' => __('fields_columns.full_name'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Is capital.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldIsCapitalCheckbox($tab = null)
    {
        CRUD::addField([
            'name' => 'is_capital',
            'label' => __('fields_columns.is_capital'),
            'type' => 'checkbox',
            'default' => false,
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Is visible.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldIsVisibleCheckbox($tab = null)
    {
        CRUD::addField([
            'name' => 'is_visible',
            'label' => __('fields_columns.is_visible'),
            'type' => 'checkbox',
            'default' => true,
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Latitude.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldLatitudeText($tab = null)
    {
        CRUD::addField([
            'name' => 'latitude',
            'label' => __('fields_columns.latitude'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Longitude.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldLongitudeText($tab = null)
    {
        CRUD::addField([
            'name' => 'longitude',
            'label' => __('fields_columns.longitude'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Name.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldNameText($tab = null, $upper = false)
    {
        CRUD::addField([
            'name' => 'name',
            'label' => __('fields_columns.name'),
            'type' => 'text',
            'attributes' => [
                'onkeyup' => $upper ? 'maiuscula(this)' : ''
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Notes.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldNotesTextarea($tab = null)
    {
        CRUD::addField([
            'name' => 'notes',
            'label' => __('fields_columns.notes'),
            'type' => 'textarea',
            'attributes' => [
                'onkeyup' => 'maiuscula(this)'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Number.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldNumberNumber($tab = null)
    {
        CRUD::addField([
            'name' => 'number',
            'label' => __('fields_columns.number'),
            'type' => 'number',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Organ.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldOrganCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'organ_id',
            'label' => __('fields_columns.organ'),
            'type' => 'relationship',
            'model' => 'App\Models\Organ',
            'entity' => 'organ',
            'attribute' => 'name',
            'placeholder' => __('fields_columns.select') . ' ' . __('fields_columns.organ'),
            'allows_null' => true,
            'options' => (function (Builder $query) {
                return $query->orderBy('name', 'ASC')
                    ->where('status', true)
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Phone #.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldPhoneText($tab = null)
    {
        CRUD::addField([
            'name' => 'phone',
            'label' => trans('fields_columns.phone'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Short name.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldShortNameText($tab = null)
    {
        CRUD::addField([
            'name' => 'short_name',
            'label' => __('fields_columns.short_name'),
            'type' => 'text',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to SIAFI Code.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldSiafiCodeNumber($tab = null)
    {
        CRUD::addField([
            'name' => 'siafi_code',
            'label' => __('fields_columns.siafi_code'),
            'type' => 'number',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to SIASG Code.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldSiasgCodeNumber($tab = null)
    {
        CRUD::addField([
            'name' => 'siasg_code',
            'label' => __('fields_columns.siasg_code'),
            'type' => 'number',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to SIORG Code.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldSiorgCodeNumber($tab = null)
    {
        CRUD::addField([
            'name' => 'siorg_code',
            'label' => __('fields_columns.siorg_code'),
            'type' => 'number',
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to State.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldStateCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'state_id',
            'label' => __('fields_columns.state'),
            'type' => 'relationship',
            'model' => 'App\Models\State',
            'entity' => 'state',
            'attribute' => 'name',
            'placeholder' => __('fields_columns.select') . ' ' . __('fields_columns.state'),
            'allows_null' => true,
            'options' => (function (Builder $query) {
                return $query->orderBy('name', 'ASC')
                    ->where('status', true)
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Status.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldStatusCheckbox($tab = null)
    {
        CRUD::addField([
            'name' => 'status',
            'label' => __('fields_columns.status'),
            'type' => 'checkbox',
            'default' => true,
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Timezone.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldTimezoneCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'timezone',
            'label' => __('fields_columns.timezone'),
            'type' => 'select2_from_array',
            'allows_null' => true,
            'options' => \DateTimeZone::listIdentifiers(),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Type of creditor.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldTypeOfCreditorCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'type_id',
            'label' => trans('fields_columns.type_of_creditor'),
            'type' => 'relationship',
            'model' => 'App\Models\CodeItem',
            'entity' => 'type',
            'attribute' => 'description',
            'placeholder' => trans('fields_columns.select'). ' ' .trans('fields_columns.type_of_creditor'),
            'allows_null' => true,
            'attributes' => [
                'id' => 'type_id',
            ],
            'options' => (function (Builder $query) {
                return $query->orderBy('short_description', 'ASC')
                    ->where('code_id', Code::TYPE_CREDITORS)
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Type of unit.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addFieldTypeOfUnitCombo($tab = null)
    {
        CRUD::addField([
            'name' => 'type_id',
            'label' => __('fields_columns.type_of_unit'),
            'type' => 'relationship',
            'model' => 'App\Models\CodeItem',
            'entity' => 'type',
            'attribute' => 'description',
            'placeholder' => __('fields_columns.select') . ' ' . __('fields_columns.type_of_unit'),
            'allows_null' => true,
            'options' => (function (Builder $query) {
                return $query->orderBy('description', 'ASC')
                    ->where('code_id', Code::TYPE_UNITS)
                    ->get();
            }),
            'tab' => $tab
        ]);
    }

    /**
     * Add form field to Zip code.
     *
     * @author Heles Júnior <helesjunior@gmail.com>
     */
    protected function addFieldZipcodeText($tab = null)
    {
        CRUD::addField([
            'name' => 'zipcode',
            'label' => __('fields_columns.zipcode'),
            'type' => 'text',
            'wrapper' => [
                'class' => 'form-group col-md-6'
            ],
            'tab' => $tab
        ]);
    }
}
