<?php

namespace App\Http\Controllers;

use App\Models\Ad; 
use Illuminate\Http\Request;

class AdController extends Controller
{
    
    public function index()
    {
        $ads = Ad::all();
        return view('usedCars', compact('ads'));
    }


    public function create()
    {
        return view('ads.create');
    }

    

    public function store(Request $request)
    {
        print_r("Request");
        print_r($request->all());
        // Validate request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image',
            'mileage' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'transmission' => 'required|string',
            'fuel_type' => 'required|string',
            'year' => 'required|numeric',
            'location' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            //'engine_capacity' => 'required|numeric',
            'condition' => 'required|string',
        ]);


       // $imagePath = $request->file('image')->storeAs('public', 'images');

       $image = $request->file('image');
$image->move(public_path('images'), $image->getClientOriginalName());
$validatedData['image'] = 'images/' . $image->getClientOriginalName();


       

//     $path = $request->file('file')->store('temp');
// $file = $request->file('file');
// $fileName = $file->getClientOriginalName();
// $file->move(public_path('uploads'), $fileName);

    // Create ad
    $ad = new Ad($validatedData);
    //$ad->user_id = auth()->user()->id;
    $ad->title = $validatedData['title'];
    $ad->image = $validatedData['image'];
    $ad->mileage = $validatedData['mileage'];
    $ad->price = $validatedData['price'];
    $ad->description = $validatedData['description'];
    $ad->brand = $validatedData['brand'];
    $ad->model = $validatedData['model'];
    $ad->transmission = $validatedData['transmission'];
    $ad->fuel_type = $validatedData['fuel_type'];
    $ad->year = $validatedData['year'];
    $ad->location = $validatedData['location'];
    $ad->phone = $validatedData['phone'];
    $ad->email = $validatedData['email'];
    
    $ad->condition = $validatedData['condition'];
    $ad->save();

        // return redirect()->route('ads.create')->with('success', 'Ad created successfully');
        return redirect()->back()->with('success', 'Ad created successfully');
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'title' => 'required|string',
    //         'image' => 'required|image',
    //         'mileage' => 'required|numeric',
    //         'price' => 'required|numeric',
    //         'description' => 'required|string',
    //         'brand' => 'required|string',
    //         'model' => 'required|string',
    //         'transmission' => 'required|string',
    //         'fuel_type' => 'required|string',
    //         'year' => 'required|numeric',
    //         'location' => 'required|string',
    //         'phone' => 'required|numeric',
    //         'email' => 'required|email',
    //         //'engine_capacity' => 'required|numeric',
    //         'condition' => 'required|string',
    //     ]);
    //     dd($validatedData);
    // }

    public function showDetails($id)
{
    $ad = Ad::find($id);

    if (!$ad) {
        abort(404); // Or handle the case when the ad is not found
    }

    return view('adDetails', compact('ad'));
}
    

public function show($id)
{
    $ad = Ad::find($id);

    if (!$ad) {
        abort(404); // Or handle the case when the ad is not found
    }

    return view('ads.show', compact('ad'));
}
}
