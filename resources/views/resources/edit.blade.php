<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resource
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('resources.update',$resources->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                                Quantity
                            </label>
                            <input class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"  name="quantity" value="{{$resources->quantity}}" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="value">
                                Value
                            </label>
                            <input class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"  name="value" value="{{$resources->value}}" disabled>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="purpose">
                                Purpose
                            </label>
                            <input class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none"  name="purpose" value="{{$resources->purpose}}" disabled>
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="event_id">
                                Status
                            </label>
                            <select class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" name="event_id">
                                @foreach($events as  $event)
                                    <option value="{{$event->id}}" {{$event->id == $resources->event_id ? 'selected' : ''}}>{{$event->event_name}}</option>
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
