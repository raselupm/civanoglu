<x-guest-layout>
    {{-- Breadcrumb --}}
    <div class="shadow-md border-2 border-gray-300 py-2 bg-white mt-28">
        <div class="container mx-auto">
            <ul class="flex items-center">
                <li><a class="text-base text-red-800" href="{{route('home')}}">Property</a></li>
                <li class="mx-3"><i class="fa fa-angle-right"></i></li>
                <li>{{$page->name}}</li>
            </ul>
        </div>
    </div>

    <!-- Title & Share -->
    <div class="bg-white py-8" style="min-height: 400px">
        <div class="container mx-auto">
            <h2 class="text-3xl text-gray-600 mb-6">{{$page->name}}</h2>
            <div class="content">{{$page->content}}</div>
        </div>
    </div>
</x-guest-layout>
