<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SubCategoria
 *
 * @property $id
 * @property $categoria_id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SubCategoria extends Model
{
    
    static $rules = [
		'categoria_id' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria_id','name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    

}
