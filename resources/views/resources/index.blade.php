<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resource
        </h2>
    </x-slot>
    <div class="flex items-center justify-end py-4 text-right p">
        <a href="{{route('resources.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Resource</a>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">id
                            </th>

                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Date
                            </th>

                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Category
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Status
                            </th>
                            @if(auth()->user()->hasRole('Admin'))
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Actions
                            </th>
                            @endif

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($resources as $resource)
                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->id}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->created_at->format('d-m-y')}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->ResourceCategory->name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$resource->event->event_name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">
                                    <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('resources.show',$resource->id)}}">Show</a>
                                    @if(auth()->user()->hasRole('Admin'))
                                        <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('resources.edit',$resource->id)}}">Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td class="px-6 py-3 border-b border-gray-200" colspan="7">No Resources Found</td>
                        @endforelse

                        </tbody>

                    </table>
                    <div class="pt-4">
                        {{$resources->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
