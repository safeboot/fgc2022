<?php

namespace App\Http\Livewire;

use App\Models\Measurement;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Livewire\Component;

class Home extends Component
{
    public $measurements;

    protected $listeners = ['echo:measurements,NewMeasurementCollected' => 'render'];

    public function render() {

        $this->measurements = Measurement::all()->sortByDesc('created_at')->take(20);

        $measurementsOverTime = (new LineChartModel())
            ->setSmoothCurve()
            ->setAnimated(true)
            ->enableShades()
            ->singleLine();

        foreach ($this->measurements->sortBy('created_at') as $measurement) {

            $measurementsOverTime->addPoint(date('j M, Y - H:i:s', strtotime($measurement->created_at)), $measurement->mq);

        }

        return view('livewire.home', ['measurementsOverTime' => $measurementsOverTime]);

    }
}
