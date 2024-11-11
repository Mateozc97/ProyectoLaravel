<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Materia extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Materia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email_profesor',
        'password',
        'cod_materia',
        'nombre_materia',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'string', // Asegúrate de que sea de tipo string
    ];

    public $timestamps = false;
}
