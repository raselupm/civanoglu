<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mesajlar
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto mb-6">
                        <thead>
                        <tr>
                            <th class="border px-4 py-2">İsim</th>
                            <th class="border px-4 py-2">E-posta</th>
                            <th class="border px-4 py-2">Telefon</th>
                            <th style="width: 250px" class="border px-4 py-2">Hareketler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td class="border px-4 py-2">{{$message->name}}</td>
                                <td class="border px-4 py-2">{{$message->email}}</td>
                                <td class="border px-4 py-2">{{$message->phone}}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a class="bg-green-500 text-white px-4 py-2 text-xs rounded" href="{{route('message', $message->id)}}">görüş</a>
                                    <form onsubmit="return confirm('Mesajı gerçekten silmek istiyor musunuz?');" action="{{route('delete-message', $message->id)}}" method="post" class="inline-block"> @csrf @method('delete')
                                        <button style="height: 27px;top:1.5px" type="submit" class="bg-red-500 text-white px-4 py-2 text-xs rounded relative">Silmek</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{$messages->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
