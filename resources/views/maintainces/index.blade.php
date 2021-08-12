<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Maintenance
        </h2>
    </x-slot>
    <div class="flex items-center justify-end py-4 text-right p">
        <a href="{{route('maintenance.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Maintenance</a>
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
                                Maintenance Type
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Description
                            </th>

                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Actions
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($maintainces as $maintenance)
                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200">{{$maintenance->id}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$maintenance->MaintainceCategory->name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$maintenance->event->event_name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$maintenance->description}}</td>
                                <td class="px-6 py-3 border-b border-gray-200 content-center">
                                    <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('maintenance.show',$maintenance->id)}}">Show</a>
                                    @if(auth()->user()->hasRole('Admin'))
                                    <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('maintenance.edit',$maintenance->id)}}">Edit</a>
                                        @endif
                                </td>

                            </tr>
                        @empty
                            <td class="px-6 py-3 border-b border-gray-200" colspan="7">No Maintenance Found</td>
                        @endforelse

                        </tbody>

                    </table>

                    <div class="pt-4">
                        {{$maintainces->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
