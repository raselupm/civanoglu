<a href="{{route('single-property', $property->id)}}" class="{{$width}} px-3 relative rounded-md mb-6 block">
    <div class="shadow-lg">
        <div class="py-20 bg-center" style="background-image: url('/img/hero-bg.jpg')"></div>
        <div class="p-3">
            <h2 class="leading-0 text-base">{{$property->name}}</h2>
            <h3 class="text-2xl py-3">{{isset($_GET['currency']) && $_GET['currency'] == 'usd' ? intval($property->lira_to_usd($property->price)) . ' USD' : $property->price . ' TL'}}</h3>
            <div class="border-t-2">
                <ul class="flex items-center -mx-1 my-4">
                    <li class="px-2 py-1 bg-blue-50 rounded-md text-xs mx-1 shadow-sm">{{$property->bedrooms}} bedrooms</li>
                    <li class="px-2 py-1 bg-blue-50 rounded-md text-xs mx-1 shadow-sm">{{$property->bathrooms}} bathrooms</li>
                    <li class="px-2 py-1 bg-blue-50 rounded-md text-xs mx-1 shadow-sm">{{$property->gross_sqm}} M<sup>2</sup></li>
                </ul>
                <span class="btn w-full text-center">More details</span>
            </div>
        </div>
    </div>
</a>
