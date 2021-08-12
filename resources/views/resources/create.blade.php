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
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('resources.store')}}"
                          method="post">
                        @csrf
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
                                    Purpose
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                    <a href="javascript:void(0)"
                                       class="bg-green-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 addRow"
                                       type="button">+</a>
                                </th>

                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200">
                                    <select
                                        class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500"
                                        name="resource_category_id[]">
                                        <option>----</option>
                                        @foreach($categories as  $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('resource_category_id[]')
                                    <span class="text-red-900 text-sm">{{$message}}</span>
                                    @enderror
                                </td>

                                <td class="px-6 py-3 border-b border-gray-200">
                                    <select class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500" name="unit_id[]">
                                        <option>----</option>
                                        @foreach($units as  $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('unit_id[]')
                                    <span class="text-red-900 text-sm">{{$message}}</span>
                                    @enderror
                                </td>

                                <td class="px-6 py-3 border-b border-gray-200">
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="quantity" name="quantity[]" type="text">
                                    @error('quantity')
                                    <span class="text-red-900 text-sm">{{$message}}</span>
                                    @enderror
                                </td>

                                <td class="px-6 py-3 border-b border-gray-200">
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="value[]" id="value" type="number">
                                    @error('value')
                                    <span class="text-red-900 text-sm">{{$message}}</span>
                                    @enderror
                                </td>

                                <td class="px-6 py-3 border-b border-gray-200">
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="purpose[]" id="purpose" type="text">
                                    @error('purpose')
                                    <span class="text-red-900 text-sm">{{$message}}</span>
                                    @enderror
                                </td>

                                <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">
                                    <a href="javascript:void(0)"
                                       class="bg-red-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 deleteRow"
                                       type="button">-</a>
                                </th>
                            </tr>
                            </tbody>

                        </table>
                        <div class="mb-4">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                                Create
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $('thead').on('click', '.addRow', function () {
            var tr = "<tr>" +
                "<td class='px-6 py-3 border-b border-gray-200'>" +
                "<select class='inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500' name='resource_category_id[]'>" +
                "<option>----</option>" +
                "@foreach($categories as  $category)" +
                "<option value='{{$category->id}}'>{{$category->name}}</option>" +
                "@endforeach"+
            "</select>" +
            "</td>" +
            "<td class='px-6 py-3 border-b border-gray-200'>" +
            "<select class='inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500' name='unit_id[]'>"+
            "<option>----</option>" +
            "@foreach($units as  $unit)" +
            "<option value='{{$unit->id}}'>{{$unit->name}}</option>" +
            "@endforeach" +
            " </select>" +
            "</td>" +
            "<td class='px-6 py-3 border-b border-gray-200'>" +
            "<input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' id='quantity' name='quantity[]' type='text'>" +
            "@error('quantity') <span class='text-red-900 text-sm'>{{$message}}</span>@enderror" +
            "</td>" +
            "<td class='px-6 py-3 border-b border-gray-200'>" +
            "<input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' name='value[]' id='value' type='number'>" +
            "@error('value') <span class='text-red-900 text-sm'>{{$message}}</span>@enderror" +
            "</td>" +
            " <td class='px-6 py-3 border-b border-gray-200'>"+
            "<input class='appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500' name='purpose[]' id='purpose' type='text'>"+
            "@error('purpose') <span class='text-red-900 text-sm'>{{$message}}</span>@enderror" +
            "</td>" +
            "<th class='px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider'>" +
            "<a href='#' class='bg-red-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 deleteRow' type='button'>-</a>" +
            "</th>"+
            "</tr>"
            $('tbody').append(tr);
        });

        $('tbody').on('click','.deleteRow',function (){
            $(this).parent().parent().remove();
        });


    </script>
</x-app-layout>
