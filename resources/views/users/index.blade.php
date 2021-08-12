<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users
        </h2>
    </x-slot>

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
                                Name
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Roles
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                Edit
                            </th>

                        </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200">{{$user->id}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$user->name}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">{{$user->email}}</td>
                                <td class="px-6 py-3 border-b border-gray-200">
                                    @foreach($user->roles as $role)
                                        {{$role->display_name}}
                                    @endforeach
                                </td>
                                <td class="px-6 py-3 border-b border-gray-200">
                                    <a class="h-10 px-5 m-2 text-blue-100 transition-colors duration-150 bg-blue-600 rounded-lg focus:shadow-outline hover:bg-blue-700" href="{{route('users.edit',$user->id)}}">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <td class="px-6 py-3 border-b border-gray-200" colspan="7">No Users Found</td>
                        @endforelse

                        </tbody>

                    </table>
                    <div class="pt-4">
                        {{$users->links()}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
