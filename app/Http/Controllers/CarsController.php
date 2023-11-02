<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Headquarter;
use App\Rules\Uppercase;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //for pagination using querybuilder
        // $cars = DB::table('cars')->paginate(4);
        //Eloquent
        $cars = Car::paginate(3);
        //select * FROM cars
        // $cars = Car::all()->tojson();
        // $cars = json_decode($cars);-->> converting collections to JSON

        
        // var_dump($cars);
       
        // dd($cars);

        return view('cars.index',[
            'cars' => $cars
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //instance method
        // $car = new Car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description =$request->input('description');

        // $car->save();

        // return redirect('/cars');
        //or using create method
        //How to handle user data
/********
 * all() method-> 
 * requests for all input fields
        $test = $request->all();
 * Except() method->
 *  requests for all inputs and exempting the specified input
        $test = $request->except(['_token', 'name']);
    Only() method -> 
    inverse of except method()
        $test = $request->only(['name', '_token']);


        Has method
        * //to check if a user input field has been entered or not by using has() method
//         $test = $request->has('founded');
            dd($test); 
// //or
//         if ($request->has('founded')) {
//             dd('founded has been found!');
//         }

*Current Path
// how to show the current path..
        if ($request->is('cars')) {
            dd('endpoint is cars');
        }

        //Current Method
        if($request->isMethod('post'))
        {
            dd('Method is post');
        }

        // //show the url
        // dd($request->url()); 

        //show users IP
        dd($request->ip())  ;
 */
        //to Validate the inputs
       $request->validate([
        'name' => 'required|unique:cars',
        'founded' => 'required|integer|min:0|max:2023',
        'description' => 'required'
       ]);
       //if validated then it proceeds to the next stage 
       //else it throws a validation Exception
        
         

        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
            //protected $fillable on car.php
        ]);

        return redirect('/cars');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::with('carModels.engines')->find($id);
        $hq = Headquarter::find($id);

        // var_dump($car->productionDate);
        // var_dump($car->products);
        // dd($car);

        // var_dump($hq);

        // dd($car);
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id)->first();

        
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect('/cars');
    }
}

//for processing large amount of records which might lead to memory orlock issues
/** Retrieving data
 * breaking the records into smaller pieces by chunking it down
 *  $cars= Car::chunk(2, function ($cars){
            *foreach ($cars as $car) {
              *  print_r($car);
          *  }
        *});
 */
//print_r(Car::where('name', 'Saheed')->count());
//print_r(Car::all()->count());
// print_r(Car::avg('founded'));

