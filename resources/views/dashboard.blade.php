<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

{{--    https://www.youtube.com/watch?v=zu6JLBQr7Nk&ab_channel=WebDevMatics--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset($patients)
            @foreach($patients as $patient)
{{--            Source: https://tailwindcomponents.com/component/user-card-1 --}}
                <a href='/dashboard/{{$patient->id}}'><div class="container mx-auto flex flex-col space-y-4 mb-3 justify-center items-center">
                <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
                    <div class="flex items-center space-x-4">
                        <svg class="w-16 h-16 rounded-full" fill="grey" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="font-semibold text-gray-700">
                            {{$patient->initialen}}
                        </div>
                        <div class="text-sm text-gray-500">
                            @if($patient->created_at == $patient->updated_at)
                                Patient has not yet given feedback.
                            @else
                                Last update: {{$patient->updated_at}}
                            @endif
                        </div>
                    </div>
                </div>
            </div></a>
            @endforeach
            @endisset

            @isset($specificPatient)
                    <a href='/dashboard'><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                        Back
                    </button></a>
                    <div class="container mx-auto flex flex-col space-y-4 mb-3 justify-center items-center">
                        <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
                            <div class="flex items-center space-x-4">
                                <svg class="w-16 h-16 rounded-full" fill="grey" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="flex-grow p-3">
                                <div class="font-semibold text-gray-700">
                                    {{$specificPatient->initialen}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    @if($specificPatient->created_at == $specificPatient->updated_at)
                                        Patient has not yet given feedback.
                                    @else
                                        Last update: {{$specificPatient->updated_at}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @include('chart', ['data' => $data])
                @endisset
        </div>
    </div>
</x-app-layout>
