<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SubscriptionPlan;
use App\Models\Ad;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {

        $totalAllUsers = User::count();
        $totalUsers = User::where('role_id', '7')->count();
        $totalAdmins = User::where('role_id', '1')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');
        
        $totalSubscriptionPlans = SubscriptionPlan::count();
        $totalAds = Ad::count();
        $todayAds = Ad::whereDate('created_at', $todayDate)->count();
        $thisMonthAds = Ad::whereMonth('created_at', $thisMonth)->count();
        $thisYearAds = Ad::whereYear('created_at', $thisYear)->count();



        return view('admin.user.dashboard.index', compact('totalAllUsers', 'totalUsers', 'totalAdmins', 'totalSubscriptionPlans', 'totalAds', 'todayAds', 'thisMonthAds', 'thisYearAds'));
    }
}
