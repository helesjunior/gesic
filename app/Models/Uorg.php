<?php

namespace App\Models;

use App\Integrations\SiorgWS;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Uorg extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'uorgs';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'siorg_id',
        'unit_id',
        'father_id',
        'code',
        'short_description',
        'description',
        'status',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getIdByCode($code)
    {
        return @$this->where('code',$code)->first()->id;
    }

    public function firstOrCreateUorg($uorg)
    {
        $code = [
            'code' => $uorg['code'],
        ];

        unset($uorg['code']);

        $return = $this->firstOrCreate(
            $code,
            $uorg
        );

        return $return;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
