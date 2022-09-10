<div>
    <div class="welcome w-full h-96 lg:h-screen flex justify-center items-center px-4 lg:px-32 py-4 lg:py-16">

        <div class="welcome-container w-full h-full p-2 lg:p-16 border-sky-500 border-4 flex flex-col justify-center items-center gap-4 rounded-xl">

            <livewire:livewire-line-chart key="{{ now() }}" :line-chart-model="$measurementsOverTime" />

        </div>

    </div>

    <div class="table w-full px-4 lg:px-32 py-4 lg:py-16 flex flex-col gap-16">

        @if($measurements->first()->mq > 3500)

            <div class="w-full bg-red-400 rounded-t-lg p-8">

                <p class="text-white">Warning! Smoke detected.</p>

                <audio autoplay src="{{ asset('assets/radar.mp3') }}"></audio>

            </div>

        @endif

        <table class="min-w-full">

            <thead class="bg-gray-100 rounded-lg">

            <tr>

                <th scope="col" class="text-gray-500 font-medium pl-2">Status</th>

                <th scope="col" class="text-gray-500 font-medium">MQ</th>

                <th scope="col" class="text-gray-500 font-medium">Date</th>

                <th scope="col" class="text-gray-500 font-medium">Time</th>

            </tr>

            </thead>

            <tbody>

            @foreach($measurements->sortByDesc('created_at') as $measurement)

                <tr class="bg-white h-10">

                    <td class="text-center pl-2">

                        @if($measurement->mq < 3500)

                            <i class="fa-solid fa-check text-green-400"></i>

                        @else

                            <i class="fa-solid fa-triangle-exclamation text-red-400" title="Smoke detected at this location."></i>

                        @endif

                    </td>

                    <td class="text-center text-sm lg:text-base">{{ $measurement->mq }}</td>

                    <td class="text-center text-xs lg:text-base">{{ date('jS \o\f F, Y', strtotime($measurement->created_at)) }}</td>

                    <td class="text-center text-sm lg:text-base">{{ date('H:i:s', strtotime($measurement->created_at)) }}</td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>
</div>
