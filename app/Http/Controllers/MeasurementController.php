    <?php

    namespace App\Http\Controllers;

    use App\Events\NewMeasurementCollected;
    use App\Models\Measurement;
    use Illuminate\Http\Request;

    class MeasurementController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function __invoke(Request $request) {

            $measurement = new Measurement();

            $measurement->mq = $request->mq;

            $measurement->save();

            event(new NewMeasurementCollected($measurement));

            return response()->json('success', 200);

        }
    }
