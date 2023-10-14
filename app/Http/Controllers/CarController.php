<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;
use App\Models\CarTag;

class CarController extends Controller
{

    //shows all cars in Admin
    public function index()
    {

        $cars = Car::all();

        return view('back.cars.index', ['cars' => $cars]);
    }


    //returns create car View in Admin
    public function create()
    {

        $tags = Tag::all();
        return view('back.cars.create', ['tags' => $tags]);
    }


    //insert car data in DB
    public function store(StoreCarRequest $request)
    {
        $data = $request->validated();

        $tags = $data['tags'];

        $car = Car::create([
            'brand' => $data['brand'],
            'model' => $data['model'],
            'registration_date' => $data['registration_date'],
            'engine_size' => $data['engine_size'],
            'price' => $data['price'],
            'is_active' => $data['is_active']
        ]);

        //when creating a car assocciate each selected tag for that car
        foreach ($tags as $tag) {
            $carTag = new CarTag();
            $carTag->car_id = $car->id;
            $carTag->tag_id = $tag;
            $carTag->save();
        }

        return redirect()->route('cars.index')->with('success', 'Car created successfully');
    }


    //returns edit car view by ID
    public function edit($id)
    {
        $car = Car::where('id', $id)->with('tags')->first();
        $carTagsIds = $car->tags->pluck('id')->toArray();
        $tags = Tag::all();

        return view('back.cars.edit', ['tags' => $tags, 'car' => $car, 'carTagsIds' => $carTagsIds]);
    }


    //modifies car data in DB by ID
    public function update(StoreCarRequest $request, $id)
    {
        $data = $request->validated();

        $tags = $data['tags'];

        $car = Car::where('id', $id)->first();


        //remove existing tags
        $car->tags()->detach();

        $car->update([
            'brand' => $data['brand'],
            'model' => $data['model'],
            'registration_date' => $data['registration_date'],
            'engine_size' => $data['engine_size'],
            'price' => $data['price'],
            'is_active' => $data['is_active']
        ]);

        //when modifying a car assocciate each selected tag for that car
        foreach ($tags as $tag) {
            $carTag = new CarTag();
            $carTag->car_id = $car->id;
            $carTag->tag_id = $tag;
            $carTag->save();
        }

        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }


    //deletes car data in DB by ID
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }


    //modifies cars field to approve Cars to show in frontend
    public function approveCar($id)
    {
        $car = Car::where('id', $id)->first();

        $car->is_active = 1;
        $car->update();

        return redirect()->route('cars.index')->with('success', 'Car Approved.');
    }


    // make car field unactive
    public function disapproveCar($id)
    {
        $car = Car::where('id', $id)->first();

        $car->is_active = 0;
        $car->update();

        return redirect()->route('cars.index')->with('success', 'Car Disapproved.');
    }
}
