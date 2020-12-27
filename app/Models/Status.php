<?php

namespace App\Models;

class Zone extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at',
        'updated_at',
        'piemonte',
        'veneto',
        'lombardia',
        'emiliaromagna',
        'umbria',
        'lazio',
        'toscana',
        'abruzzo',
        'molise',
        'basilicata',
        'puglia',
        'marche',
        'sicilia',
        'sardegna',
        'liguria',
        'trento',
        'bolzano',
        'friuliveneziagiulia',
        'valledaosta',
        'campania',
        'calabria',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];
}
