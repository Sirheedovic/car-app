<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    //manipulating the key 
    protected $primaryKey = 'id';
    //manipulating creating_at and updated_at

    /*
    protected $timestamps = 'true';

    protected $dateformat = 'h:m:s';
    */
    protected $fillable  = [
        'name', 'founded', 'description'
    ];
    protected $hidden = [
        'created_at' 
    ];
    protected $visible = [
        'name', 'description', 'founded', 'updated_at'
    ];

    public function carModels(){
        return $this->hasMany(CarModel::class);
    }
    public function headquarter() {
        return $this->hasOne(Headquarter::class);
    }
    
    public function engines()
{
    return $this->hasManyThrough(
        Engine::class,
        CarModel::class,
        'car_id',  //Foreign key on carModel table
        'model_id' //Foreign key on Engine table
);
}

//Define a hasOneThrough relationship
public function productionDate()
{
    return $this->hasOneThrough(
        CarProduction::class,
        CarModel::class, //intermediary
        'car_id',
        'model_id'
    );
}
public function products()
{
    return $this->belongsToMany(Product::class);
}

}
