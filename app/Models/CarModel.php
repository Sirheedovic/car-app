<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarModel extends Model
{
    use HasFactory;

    protected $table = 'car_models';
    //manipulating the key 
    protected $primaryKey = 'id';


    //a car model belongs to a car...
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
    public function engines()
{
    return $this->hasOne(Engine::class, 'model_id');
}
}
