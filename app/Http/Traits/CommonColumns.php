<?php

/**
 * Traits to group CRUD Backpack common columns.
 *
 * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
 */
namespace App\Http\Traits;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CommonColumns for Backpack common columns.
 *
 * @package App\Http\Traits
 * @example Method name for generic column should be 'addColumn' + 'Name' + 'Text/Combo/Checkbox/...()'
 *          addColumnDescriptionText()
 *          Or, specifically, should be 'addColumn' + 'Model/Table' + 'Text/Combo/Checkbox/...()'
 *          addColumnCountryCombo()
 * @see https://backpackforlaravel.com/docs/4.0/crud-columns
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
 */
trait CommonColumns
{
    // All columns should be shown in alphabetical order

    /**
     * Add column to grid view for Abbreviation field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnAbbreviation(): void
    {
        CRUD::addColumn([
            'name' => 'abbreviation',
            'label' => __('fields_columns.abbreviation'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'abbreviation',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for City field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnCity(): void
    {
        CRUD::addColumn([
            'name' => 'city_id',
            'label' => __('fields_columns.city'),
            'type' => 'select',
            'model' => 'App\Models\City',
            'entity' => 'city',
            'attribute' => 'name',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhereHas('city', function ($q) use ($column, $searchTerm) {
                    $q->where(
                        'name',
                        'iLike',
                        '%' . $searchTerm . '%'
                    );
                });
            }
        ]);
    }

    /**
     * Add column to grid view for Code field.
     *
     * @author Saulo Soares <saulosao@gmail.com>
     */
    protected function addColumnCode(): void
    {
        CRUD::addColumn([
            'name' => 'code',
            'label' => __('fields_columns.code'),
            'type' => 'number',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
        ]);
    }

    /**
     * Add column to grid view for Country field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnCountry(): void
    {
        CRUD::addColumn([
            'name' => 'country_id',
            'label' => __('fields_columns.country'),
            'type' => 'select',
            'model' => 'App\Models\Country',
            'entity' => 'country',
            'attribute' => 'name',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhereHas('country', function ($q) use ($column, $searchTerm) {
                    $q->where(
                        'name',
                        'iLike',
                        '%' . $searchTerm . '%'
                    );
                });
            }
        ]);
    }

    /**
     * Add column to grid view for Currency field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnCurrency(): void
    {
        CRUD::addColumn([
            'name' => 'currency_id',
            'label' => __('fields_columns.currency'),
            'type' => 'select',
            'model' => 'App\Models\Currency',
            'entity' => 'currency',
            'attribute' => 'name',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhereHas('currency', function ($q) use ($column, $searchTerm) {
                    $q->where(
                        'name',
                        'iLike',
                        '%' . $searchTerm . '%'
                    );
                });
            }
        ]);
    }

    /**
     * Add column to grid view for Description field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnDescription(): void
    {
        CRUD::addColumn([
            'name' => 'description',
            'label' => __('fields_columns.description'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'description',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Full name field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnFullName(): void
    {
        CRUD::addColumn([
            'name' => 'full_name',
            'label' => __('fields_columns.full_name'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'full_name',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Status field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnIsCapital(): void
    {
        CRUD::addColumn([
            'name' => 'is_capital',
            'label' => __('fields_columns.is_capital'),
            'type' => 'boolean',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true
        ]);
    }

    /**
     * Add column to grid view for Latitude field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnLatitude(): void
    {
        CRUD::addColumn([
            'name' => 'latitude',
            'label' => __('fields_columns.latitude'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'latitude',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Longitude field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnLongitude(): void
    {
        CRUD::addColumn([
            'name' => 'longitude',
            'label' => __('fields_columns.longitude'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'longitude',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Name field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnName(): void
    {
        CRUD::addColumn([
            'name' => 'name',
            'label' => __('fields_columns.name'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'name',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Nature expediture field.
     *
     * @author Saulo Soares <saulosao@gmail.com>
     */
    protected function addColumnNatureExpediture(): void
    {
        CRUD::addColumn([
            'name' => 'nature_expediture_description',
            'label' => __('fields_columns.nature_expediture_description'),
            'type' => 'string',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true
        ]);
    }

    /**
     * Add column to grid view for Organ field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnOrgan(): void
    {
        CRUD::addColumn([
            'name' => 'orgao_id',
            'label' => __('fields_columns.organ'),
            'type' => 'select',
            'model' => 'App\Models\Organ',
            'entity' => 'organ',
            'attribute' => 'name',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhereHas('organ', function ($q) use ($column, $searchTerm) {
                    $q->where(
                        'name',
                        'iLike',
                        '%' . $searchTerm . '%'
                    );
                });
            }
        ]);
    }

    /**
     * Add column to grid view for Phone # field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnPhone(): void
    {
        CRUD::addColumn([
            'name' => 'phone',
            'label' => __('fields_columns.phone'),
            'type' => 'phone',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $charsToRemove = ['+', ' ', '(', ')', '-', '_', '.'];
                $query->orWhere(
                    'phone',
                    'iLike',
                    '%' . str_replace($charsToRemove,'', $searchTerm) . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Short Name field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnShortName(): void
    {
        CRUD::addColumn([
            'name' => 'short_name',
            'label' => __('fields_columns.short_name'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'short_name',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for SIAFI Code field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnSiafiCode(): void
    {
        CRUD::addColumn([
            'name' => 'siafi_code',
            'label' => __('fields_columns.siafi_code'),
            'type' => 'number',
            'thousands_sep' => '',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'siafi_code',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for SIASG Code field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnSiasgCode(): void
    {
        /*
         * Don't show this column
         *
        CRUD::addColumn([
            'name' => 'siasg_code',
            'label' => __('fields_columns.siasg_code'),
            'type' => 'number',
            'thousands_sep' => '',
            'visibleInTable' => false, // true
            'visibleInModal' => false, // true
            'visibleInShow' => false, // true
            'visibleInExport' => false, // true
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'siasg_code',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
        */
    }

    /**
     * Add column to grid view for Integrations Code field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnSiorgCode(): void
    {
        CRUD::addColumn([
            'name' => 'siorg_code',
            'label' => __('fields_columns.siorg_code'),
            'type' => 'number',
            'thousands_sep' => '',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'siorg_code',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Sub items field.
     *
     * @author Saulo Soares <saulosao@gmail.com>
     */
    protected function addColumnSubItens(): void
    {
        CRUD::addColumn([
            'name' => 'subItems',
            'label' => __('fields_columns.nature_expenditure_subitens'),
            'type' => 'table',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'columns' => [
                'description' => 'Description',
                'show_status' => 'Active?'
            ]
        ]);
    }

    /**
     * Add column to grid view for State field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnState(): void
    {
        CRUD::addColumn([
            'name' => 'state_id',
            'label' => __('fields_columns.state'),
            'type' => 'select',
            'model' => 'App\Models\State',
            'entity' => 'state',
            'attribute' => 'name',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhereHas('state', function ($q) use ($column, $searchTerm) {
                    $q->where(
                        'name',
                        'iLike',
                        '%' . $searchTerm . '%'
                    );
                });
            }
        ]);
    }

    /**
     * Add column to grid view for Status field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnStatus(): void
    {
        CRUD::addColumn([
            'name' => 'status',
            'label' => __('fields_columns.status'),
            'type' => 'boolean',
            'options' => [0 => 'Inactive', 1 => 'Active'], // Try comment this line
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true
        ]);
    }

    /**
     * Add column to grid view for Timezone field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     */
    protected function addColumnTimezone(): void
    {
        CRUD::addColumn([
            'name' => 'timezone',
            'label' => __('fields_columns.timezone'),
            'type' => 'text',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhere(
                    'short_name',
                    'iLike',
                    '%' . $searchTerm . '%'
                );
            }
        ]);
    }

    /**
     * Add column to grid view for Type field.
     *
     * @author Anderson Sathler M. Ribeiro <asathler@gmail.com>
     * @todo TYPE of What? Must split in each possible type!
     */
    protected function addColumnType(): void
    {
        CRUD::addColumn([
            'name' => 'type_id',
            'label' => __('fields_columns.type'),
            'type' => 'select',
            'model' => 'App\Models\CodeItem',
            'entity' => 'type',
            'attribute' => 'description',
            'visibleInTable' => true,
            'visibleInModal' => true,
            'visibleInShow' => true,
            'visibleInExport' => true,
            'searchLogic' => function (Builder $query, $column, $searchTerm) {
                $query->orWhereHas('type', function ($q) use ($column, $searchTerm) {
                    $q->where(
                        'description',
                        'iLike',
                        '%' . $searchTerm . '%'
                    );
                });
            }
        ]);
    }
}
