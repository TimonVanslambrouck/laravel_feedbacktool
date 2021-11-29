<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bedankt!') }}
        </h2>
    </x-slot>

{{--    https://www.youtube.com/watch?v=zu6JLBQr7Nk&ab_channel=WebDevMatics--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bedankt om de vragenlijst in te vullen!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
