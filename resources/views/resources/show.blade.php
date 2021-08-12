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
                    <table class="w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Category
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Unit
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Quantity
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Value
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                <a href="{{route('resource.changeStatus',$resource->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Close</a>
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">

                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->ResourceCategory->name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->unit->name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->quantity}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->value}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->event->event_name}}</td>
                            </tr>

                        </tbody>

                    </table>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
