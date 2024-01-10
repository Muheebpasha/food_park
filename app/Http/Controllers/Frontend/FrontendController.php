<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class FrontendController extends Controller
{
    public function index() {
        $sliders = Slider::where('status',1)->get();
        $sectionTitles = $this->getStatusTitles();
        $whyChooseUs = WhyChooseUs::where('status',1)->get();
       return view('frontend.home.index',compact('sliders','whyChooseUs'));
    }

    function getStatusTitles() : Collection
    {
        $keys = [
            'why_choose_us_top_title',
            'why_choose_us_main_title',
            'why_choose_us_sub_title'
        ];
        return SectionTitle::whereIn('key',$keys)->pluck('value','key');
    }
}
