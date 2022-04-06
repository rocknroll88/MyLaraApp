<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все фотографии') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row" data-masonry="{&quot;percentPosition&quot;: true }" style="position: relative; height: 690px;">

            @foreach($photos as $photo)
            <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 362px;">
                <div class="card">
                    <a href="{{ $photo->regular }}" data-fancybox="gallery">
                        <img src="{{ $photo->regular }}" alt="">
                    </a>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>