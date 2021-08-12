<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Status
        </h2>
    </x-slot>
    <div class="flex items-center justify-end py-4 text-right p">
        <a href="{{route('statues.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Statues</a>
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
                                Transformer
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Notes
                            </th>

                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Actions
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($statues as $status)
                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200">{{$status->id}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$status->transformer}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{\Illuminate\Support\Str::limit($status->description,30,$end='...')}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$status->event->event_name}}</td>

                                <td class="px-6 py-3 border-b border-gray-200">{{\Illuminate\Support\Str::limit($status->notes,30,$end='...')}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">
                                    <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('statues.show',$status->id)}}">Show</a>
                                    @if(auth()->user()->hasRole('Admin'))
                                    <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('statues.edit',$status->id)}}">Edit</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td class="px-6 py-3 border-b border-gray-200" colspan="7">No Status Found</td>
                        @endforelse

                        </tbody>

                    </table>
                    <div class="pt-4">
                        {{$statues->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
