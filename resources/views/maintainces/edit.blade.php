<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Maintaince
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('maintenance.update',$maintaince->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="maintaince_category_id">
                                Category
                            </label>
                            <input class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"  name="maintaince_category_id" value="{{$maintaince->MaintainceCategory->name}}" disabled>
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4" name="description" disabled>{{$maintaince->description}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="event_id">
                                Status
                            </label>
                            <select class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" name="event_id">
                                @foreach($events as  $event)
                                    <option value="{{$event->id}}" {{$event->id == $maintaince->event_id ? 'selected' : ''}}>{{$event->event_name}}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                            <span class="text-red-900 text-sm">{{$message}}</span>

                            @enderror

                        </div>

                        <div class="mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                                Update
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
