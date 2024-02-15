<?php

namespace App\Http\Controllers;

use App\Models\Ad; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SubscriptionPlan;

class AdController extends Controller
{
    
    public function userAds()
    {
        // Retrieve the logged-in user
        $user = Auth::user();
    
        // Retrieve ads posted by the user
        $ads = Ad::where('user_id', $user->id)->get();
        $plans = SubscriptionPlan::all();
    
        return view('account', compact('ads', 'plans'));
    }
    public function usedCars()
    {
        $ads = Ad::where('condition', 'used')->get();
        return view('usedCars', compact('ads'));
    }

    public function newCars()
    {
        $ads = Ad::where('condition', 'new')->get();
        return view('newCars', compact('ads'));
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
            'location' => 'required|string|in:ampara,anuradhapura,badulla,batticaloa,colombo,galle,gampaha,hambantota,jaffna,kalutara,kandy,kegalle,kilinochchi,kurunegala,mannar,matale,matara,monaragala,mullaitivu,nuwaraeliya,polonnaruwa,puttalam,ratnapura,trincomalee,vavuniya',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            // 'capacity' => 'required|numeric',
            'condition' => 'required|string|in:new,used',
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
    $ad->user_id = auth()->user()->id;
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
    // $ad->capacity = $validatedData['capacity'];
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

    public function search(Request $request)
{
    $query = $request->input('query');
    $ads = Ad::where('title', 'like', '%' . $query . '%')->get();

    // Pass the search results to the Blade view
    return view('search', ['ads' => $ads]);
}


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

public function __construct()
{
    $this->middleware('auth.ad')->only(['create', 'store']);
}

public function showAccount()
    {
        // Fetch the subscription plans
        $plans = SubscriptionPlan::all();

        // Fetch the user's ads (if needed)
        $ads = Ad::where('user_id', auth()->id())->get();

        // Pass both data to the view
        return view('account', compact('plans', 'ads'));
    }


    public function liveSearch(Request $request)
{
    $query = $request->input('query');
    $ads = Ad::where('title', 'like', '%' . $query . '%')->get();

    // Return a Blade view with the live search results
    return view('live-search', ['ads' => $ads]);
}

public function newLiveSearch(Request $request)
{
    $query = $request->input('query');
    
    // Assuming 'condition' is a column in your 'ads' table
    $ads = Ad::where('title', 'like', '%' . $query . '%')
              ->where('condition', 'new') // Adjust this condition as needed
              ->get();

    // Return a Blade view with the live search results
    return view('new-live-search', ['ads' => $ads]);
}

public function usedLiveSearch(Request $request)
{
    $query = $request->input('query');
    
    // Assuming 'condition' is a column in your 'ads' table
    $ads = Ad::where('title', 'like', '%' . $query . '%')
              ->where('condition', 'used') // Adjust this condition as needed
              ->get();

    // Return a Blade view with the live search results
    return view('new-live-search', ['ads' => $ads]);
}

}
