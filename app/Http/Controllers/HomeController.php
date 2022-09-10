<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {

        $measurements = Measurement::all()->take(20);

        $measurementsOverTime = (new LineChartModel())
            ->setSmoothCurve()
            ->setAnimated(true)
            ->enableShades()
            ->singleLine();

        foreach ($measurements->sortBy('created_at')->take(20) as $measurement) {

            $measurementsOverTime->addPoint(date('j M, Y - H:i:s', strtotime($measurement->created_at)), $measurement->mq);

        }

        return view('home', compact(['measurements', 'measurementsOverTime']));

    }
}
