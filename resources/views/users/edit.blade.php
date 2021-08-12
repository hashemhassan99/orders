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
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('users.update',$user->id)}}" method="post">
                        @csrf
                        @method('put')
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                        Name
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="name" name="name" value="{{$user->name}}">
                                    @error('name')
                                    <span class="text-red-900 text-sm">{{$message}}</span>
                                    @enderror
                                </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="name" name="name" value="{{$user->email}}" disabled>
                            @error('email')
                            <span class="text-red-900 text-sm">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="roles">
                                Roles
                            </label>
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="roles[]" value="Admin" {{$user->hasRole('Admin') ? 'checked' :''}}><span class="ml-2 text-gray-700">Admin</span>
                            <br>
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" name="roles[]" value="User"  {{$user->hasRole('User') ? 'checked' :''}}><span class="ml-2 text-gray-700">User</span>

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
