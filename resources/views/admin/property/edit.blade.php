<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mülkü düzenle
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-property.index')}}" class="fullwidth-btn">Geri</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3>Galeri resimleri</h3>

                    <div class="flex flex-wrap mt-3">
                        @foreach($property->gallery as $gallery)
                            <div style="min-width: 100px" class="mr-4 relative mb-4 border border-gray-100">
                                <div class="flex items-center justify-center h-full">
                                    <img style="max-width: 100px;" src="/uploads/{{$gallery->name}}" alt="">
                                </div>

                                <form method="post" action="{{route('delete-media', $gallery->id)}}" onsubmit="return confirm('Resmi gerçekten silmek istiyor musunuz?');" class="absolute right-0 top-0"> @csrf
                                    <button style="font-size: 8px" type="submit" class="text-white bg-red-600 px-3 py-1">Silmek</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>


                <form action="{{route('dashboard-property.update', $property->id)}}" method="post" class="p-6 bg-white border-b border-gray-200"> @csrf @method('put')
                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name_tr">Başlık <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="text" id="name_tr" name="name_tr" value="{{$property->name_tr}}" required>

                            @error('name_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="name">Başlık - ingilizce <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="text" id="name" name="name" value="{{$property->name}}" required>

                            @error('name')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>


                    </div>

                    <div class="mb-6">
                        <label class="civanoglu-label" for="featured_image">Özellikli resim <span class="required-text">*</span></label>
                        <input class="civanoglu-input" type="file" id="featured_image" name="featured_image">

                        <div class="mt-3">
                            <img src="/uploads/{{$property->featured_image}}" alt="">
                        </div>

                        @error('featured_image')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="civanoglu-label" for="gallery_images">Galeri resimleri <span class="required-text">*</span></label>
                        <input class="civanoglu-input" type="file" id="gallery_images" name="gallery_images[]" multiple>

                        @error('gallery_images')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="location_id">Konum <span class="required-text">*</span></label>
                            <select class="civanoglu-input"  name="location_id" id="location_id" required>
                                <option value="">Konum seçin</option>
                                @foreach($locations as $location)
                                    <option {{$property->location->id == $location->id ? 'selected="selected"' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>

                            @error('location_id')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="price">Fiyat <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="number" id="price" name="price" value="{{$property->price}}" required>

                            @error('price')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="sale">İçin <span class="required-text">*</span></label>
                            <select class="civanoglu-input"  name="sale" id="sale" required>
                                <option value="">Türü seçin</option>
                                <option {{$property->sale == '0' ? 'selected="selected"' : ''}} value="0">Kira</option>
                                <option {{$property->sale == '1' ? 'selected="selected"' : ''}} value="1">Satış</option>
                            </select>

                            @error('sale')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="type">Type <span class="required-text">*</span></label>
                            <select class="civanoglu-input"  name="type" id="type" required>
                                <option value="">Mülk türünü seçin</option>
                                <option {{$property->type == '0' ? 'selected="selected"' : ''}} value="0">Arazi</option>
                                <option {{$property->type == '1' ? 'selected="selected"' : ''}} value="1">Daire</option>
                                <option {{$property->type == '2' ? 'selected="selected"' : ''}} value="2">Villa</option>
                            </select>

                            @error('type')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="drawing_rooms">çizim odaları</label>
                            <select class="civanoglu-input"  name="drawing_rooms" id="drawing_rooms">
                                <option value="">Birini seç</option>

                                @for($x = 0; $x <= 3; $x++)
                                    <option {{$property->drawing_rooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('drawing_rooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bedrooms">yatak odaları</label>
                            <select class="civanoglu-input"  name="bedrooms" id="bedrooms">
                                <option value="">Birini seç</option>
                                @for($x = 0; $x <= 3; $x++)
                                    <option {{$property->bedrooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bedrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="bathrooms">banyolar</label>
                            <select class="civanoglu-input"  name="bathrooms" id="bathrooms">
                                <option value="">Birini seç</option>
                                @for($x = 0; $x <= 5; $x++)
                                    <option {{$property->bathrooms == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bathrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="kitchens">Mutfaklar</label>
                            <select class="civanoglu-input"  name="kitchens" id="kitchens">
                                <option value="">Birini seç</option>
                                @for($x = 0; $x <= 6; $x++)
                                    <option {{$property->kitchens == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('kitchens')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="net_sqm">Net metrekare <span class="required-text">*</span></label>
                            <input class="civanoglu-input" type="number" id="net_sqm" name="net_sqm" value="{{$property->net_sqm}}" required>

                            @error('net_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="gross_sqm">brüt metrekare</label>
                            <input class="civanoglu-input" type="number" id="gross_sqm" name="gross_sqm" value="{{$property->gross_sqm}}">

                            @error('gross_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="pool">Havuz</label>
                            <select class="civanoglu-input"  name="pool" id="pool">
                                <option value="">Havuz seçin</option>
                                <option {{$property->pool == '0' ? 'selected="selected"' : ''}} value="0">Hayır</option>
                                <option {{$property->pool == '1' ? 'selected="selected"' : ''}} value="1">Özel</option>
                                <option {{$property->pool == '2' ? 'selected="selected"' : ''}} value="2">Halk</option>
                                <option {{$property->pool == '3' ? 'selected="selected"' : ''}} value="3">Her ikisi de</option>
                            </select>

                            @error('pool')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview_tr">genel bakış <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="overview_tr" id="overview_tr" cols="30" rows="3" required>{{$property->overview_tr}}</textarea>

                            @error('overview_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="overview">genel bakış - ingilizce <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="overview" id="overview" cols="30" rows="3" required>{{$property->overview}}</textarea>

                            @error('overview')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>


                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="why_buy_tr">neden satın al <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="why_buy_tr" id="why_buy_tr" cols="30" rows="5" required>{{$property->why_buy_tr}}</textarea>

                            @error('why_buy_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="why_buy">neden satın al - ingilizce <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="why_buy" id="why_buy" cols="30" rows="5" required>{{$property->why_buy}}</textarea>

                            @error('why_buy')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>


                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description_tr">Açıklama <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="description_tr" id="description_tr" cols="30" rows="10" required>{{$property->description_tr}}</textarea>

                            @error('description_tr')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="civanoglu-label" for="description">Açıklama - ingilizce <span class="required-text">*</span></label>
                            <textarea class="civanoglu-input" name="description" id="description" cols="30" rows="10" required>{{$property->description}}</textarea>

                            @error('description')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>


                    </div>

                    <button class="btn" type="submit">Mülkü Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
