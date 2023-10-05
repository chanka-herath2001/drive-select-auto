<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;


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



}
