<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vragenlijst') }}
        </h2>
    </x-slot>

{{--    {{$patient_id}},{{$sessionNumber}},{{$questionList}}--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-lg">
                    <span class="font-bold">Soort vragenlijst:</span> {{$questionList[0]->volledigeNaam}} <br>
                    <span class="font-bold">Hoofdvraag:</span> {{$questionList[0]->hoofdVraag}} <br>
                    <span class="font-bold">Instructies:</span> {{$questionList[0]->descriptie}} <br>
                </div>
            </div>

            <form method="post" action="/questionnaire/{{$patient_id}}/{{$sessionNumber}}/{{$questionList[0]->id}}/{{$date}}")}}>
                @csrf
            @foreach($questions as $question)
            <div class="bg-white mb-10 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-lg text-center text-xl">
                        {{$question[0]->beschrijving}}
                        {{--                    SOURCE: https://tailwindcss-custom-forms.netlify.app/ --}}
                        <div class="mt-2">
                            @for ($i = 1; $i <= $questionList[0]->puntenschaal; $i++)
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" class="form-radio" required name="{{$question[0]->id}}" value="{{$i}}">
                                <span class="ml-2 ">{{$i}}</span>
                            </label>
                            @endfor
                        </div>
                </div>
            </div>
            @endforeach
                <div class="px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="text-xl inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Klaar met invullen
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
