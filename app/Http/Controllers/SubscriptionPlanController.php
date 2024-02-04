<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Price;


class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription-plans.index', compact('plans'));
    }

    public function create()
    {
        return view('subscription-plans.create');
    }

    public function store(Request $request)
{
    // Validate the request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'features' => 'required|string',
    ]);

    // Create a new plan
    $plan = new SubscriptionPlan();
    $plan->name = $validatedData['name'];
    $plan->price = $validatedData['price'];
    $plan->features = $validatedData['features'];
    $plan->save();

    return redirect()->route('subscription-plans.index')->with('success', 'Plan created successfully');
}



public function edit($id)
{
    $plan = SubscriptionPlan::findOrFail($id); // Retrieve the plan by its ID

    return view('subscription-plans.edit', compact('plan'));
}

public function update(Request $request, $id)
{
    // Validate the request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'features' => 'required|string',
    ]);

    // Find the plan by its ID
    $plan = SubscriptionPlan::findOrFail($id);

    // Update the plan with the validated data
    $plan->update($validatedData);

    return redirect()->route('subscription-plans.index')->with('success', 'Plan updated successfully');
}


public function destroy(string $plan)
{
    $plan = \App\Models\SubscriptionPlan::findOrFail($plan);

    $plan->delete();

    return redirect()
        ->route('subscription-plans.index')
        ->with('success', 'Subscription plan has been deleted!');
}




public function show($id)
{
    $plan = SubscriptionPlan::findOrFail($id); // Retrieve the plan by its ID

    return view('subscription-plans.show', compact('plan'));
}

// public function subscribe($planId)
//     {
//         $plan = SubscriptionPlan::findOrFail($planId);

//         // Retrieve the authenticated user
//         $user = auth()->user();

//         // Update the user's subscription plan
//         $user->subscription_plan_id = $plan->id;
//         $user->save();

//         return redirect()->route('subscription-plans.index')->with('success', 'Subscribed to ' . $plan->name);
//     }

    // public function subscribe($plan)
    // {
    //     // Retrieve the selected plan details from the database
    //     $selectedPlan = SubscriptionPlan::find($plan);

    //     // Set your Stripe secret key
    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     // Create a new Checkout Session
    //     $checkoutSession = Session::create([
    //         'payment_method_types' => ['card'],
    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'usd',
    //                 'product_data' => [
    //                     'name' => $selectedPlan->name,
    //                 ],
    //                 'unit_amount' => $selectedPlan->price * 100, // Convert to cents
    //             ],
    //             'quantity' => 1,
    //         ]],
    //         'mode' => 'subscription',
    //         'success_url' => route('subscription.success'),
    //         'cancel_url' => route('subscription.cancel'),
    //     ]);

    //     return response()->json(['sessionId' => $checkoutSession->id]);
    // }

    public function subscribe($plan)
{
    // Retrieve the selected plan details from the database
    $selectedPlan = SubscriptionPlan::find($plan);

    // Set your Stripe secret key
    Stripe::setApiKey(config('services.stripe.secret'));

    // Fetch the Price details from Stripe using the stripe_price_id
    $price = Price::retrieve($selectedPlan->stripe_price_id);

    // Create a new Checkout Session with detailed price data
    $checkoutSession = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price' => $price->id, // Use the retrieved Price ID
            'quantity' => 1,
        ]],
        'mode' => 'subscription',
        'success_url' => route('subscription.success'),
        'cancel_url' => route('subscription.cancel'),
    ]);

    return response()->json(['sessionId' => $checkoutSession->id]);
}



    public function success()
    {
        // Logic for successful payment
        return view('payment.success');
    }

    public function cancel()
    {
        // Logic for canceled payment
        return view('payment.cancel');
    }





}
