<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;


class AnalyticsChart extends Component
{

    public $analyticsData;

    // public function mount()
    // {
    //     // Fetch analytics data when the component is mounted
    //     $this->analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    // }


    public function render()
    {
        return view('livewire.admin.analytics-chart');
    }
}
