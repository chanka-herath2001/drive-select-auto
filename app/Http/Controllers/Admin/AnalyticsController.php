<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        return view('admin.user.analytics.index');
    }

    public function trackPageView()
    {
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        // Access data like $analyticsData['pageViews']
        // Store this data in your database for historical records

        return view('analytics.index', ['analyticsData' => $analyticsData]);
    }

    public function trackClick($adId)
    {
        Analytics::create(['ad_id' => $adId, 'event' => 'click']);
        // Additional logic as needed
        return redirect()->to(Ad::find($adId)->url);
    }

    public function showAnalytics()
{
    $clicks = Analytics::where('event', 'click')->count();
    $views = Analytics::where('event', 'view')->count();
    // Add more analytics data as needed

    return view('analytics.index', compact('clicks', 'views'));
}
}
