<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notification
        </h2>
    </x-slot>
    <div class="flex flex-col ...">

        <ul class="px-0">
            @foreach($notifications as $notification)

                    <li class="border list-none  rounded-sm px-3 py-3"
                        style='border-bottom-width:0'>
                        @if($notification->type == 'App\Notifications\NewmaintainceNotify')
                          New Maintenance Added Success
                            <a href="{{route('maintenance.show',$notification['data']['id'])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Show Maintenance</a>
                        @elseif($notification->type == 'App\Notifications\StatusNotification')
                            New Status Added Success
                            <a href="{{route('statues.show',$notification['data']['id'])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Show Status</a>
                        @elseif($notification->type == 'App\Notifications\ResourceNotification')
                            New Resource Added Success
                            <a href="{{route('resources.show',$notification['data']['id'])}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Show Resource</a>
                        @endif
                    </li>

            @endforeach

        </ul>
    </div>
</x-app-layout>
