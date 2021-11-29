<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate new link') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Source: https://tailwindui.com/components/application-ui/forms/form-layouts -->
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="/feedback-session" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div  class="col-span-6 sm:col-span-3">
                                    <label for="patient" class="block text-sm font-medium text-gray-700">Patient</label>
                                    <select type="text" name="patient" id="patient" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($patients as $patient)
                                            <option value={{$patient->id}}>{{$patient->initialen}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="session" class="block text-sm font-medium text-gray-700">Session</label>
                                    <input type="number" required name="session" id="session" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="questionList" class="block text-sm font-medium text-gray-700">Question-list</label>
                                    <select type="text" name="questionList" id="questionList" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach($questionLists as $questionList)
                                            <option value={{$questionList->id}}>{{$questionList->naam}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="dateSession" class="block text-sm font-medium text-gray-700">Date session</label>
                                    <input type="date" required name="dateSession" id="dateSession" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Generate link
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @isset($link)
        <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-10 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    The patient can fill in their feedback using the following link: <a target="_blank" class="underline text-black font-bold text-blue-800" href="{{$link}}">LINK</a>
                </div>
            </div>
        </div>
        @endisset
        @isset($message)
            <div class="max-w-7xl mt-6 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white mb-10 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{$message}}
                    </div>
                </div>
            </div>
        @endisset
    </div>
</x-app-layout>
