<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Str;

class Candidate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'candidat';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'candidat_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'postnom',
        'prenom',
        'email',
        'telephone',
        'adresse',
        'diplome',
        'domaine',
        'description',
        'profil',
        'image',
        'cv',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_enregistrement'=>'datetime:d/m/Y H:i'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_enregistrement'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;




}
