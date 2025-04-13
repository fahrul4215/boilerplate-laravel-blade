<x-front-end-layout>
    <div class="swiper hero-swiper container mx-auto w-full h-96">
        <div class="swiper-wrapper">
            {{-- <div class="swiper-slide relative bg-cover bg-center"
                style="background-image: url('{{ Storage::url($headline[0]->products[0]->images[0]->path ?? '') }}');">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                </div>
            </div> --}}
            @foreach ($headline as $item)
                <div class="swiper-slide relative bg-cover bg-center"
                    style="background-image: url('{{ Storage::url($item->products[0]->images[0]->path ?? '') }}');">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="container mx-auto">
                            <div
                                class="w-max px-6 tracking-wide bg-white dark:bg-gray-800 shadow bg-opacity-85 dark:bg-opacity-85 rounded-lg ml-4">
                                <a class="inline-block no-underline leading-relaxed hover:text-black hover:border-black text-black text-2xl my-4"
                                    href="{{ $item->url ?? '#' }}">
                                    {{ $item->name ?? '' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        {{-- <div
            class="swiper-button-prev prev w-16 h-16 mx-auto ml-2 md:ml-10 cursor-pointer text-sm font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">
        </div>
        <div
            class="swiper-button-next next w-16 h-16 mx-auto mr-2 md:mr-10 cursor-pointer text-sm font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">
        </div> --}}
    </div>


    {{-- Alternatively if you want to just have a single hero --}}
    {{-- <section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right"
        style="max-width:1600px; height: 32rem; background-image: url('{{ $headline[0]->images[0]->path ?? '' }}');">

        <div class="container mx-auto">

            <div
                class="flex flex-col w-max justify-center items-start px-6 tracking-wide bg-white dark:bg-gray-800 shadow bg-opacity-85 dark:bg-opacity-85 rounded-lg ml-4">
                <a class="text-xl inline-block no-underline leading-relaxed hover:text-black hover:border-black"
                    href="#">
                    <h1 class="text-black text-2xl my-4">
                        {{ $headline[0]->name ?? '' }}
                    </h1>
                </a>
            </div>

        </div>

    </section> --}}

    <section class="py-12">

        <div class="bg-white container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <nav id="store" class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
                        href="{{ route('shop') }}">
                        Hot Products
                    </a>

                    <div class="flex items-center" id="store-nav-content">

                        {{-- <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                        <a class="pl-3 inline-block no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a> --}}

                    </div>
                </div>
            </nav>

            @foreach ($products ?? [] as $product)
                {{-- @dd($product->toArray()) --}}
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    @php
                        $imgSrc = Vite::asset('resources/images/logo-trans.png');
                        if (count($product->images) > 0) {
                            $imgSrc = Storage::url($product->images[0]->path ?? '');
                        }
                    @endphp
                    <a href="{{ $product->url ?? '#' }}">
                        <img class="hover:grow hover:shadow-lg" width="400" height="400" src="{{ $imgSrc }}">
                    </a>
                    <a href="{{ $product->category->url ?? '#' }}" class="pt-2 text-yellow-500 hover:text-black font-bold">
                        <p class="">{{ $product->category->name ?? '' }}</p>
                    </a>
                    <a href="{{ $product->url ?? '#' }}">
                        <div class="pt-2 flex items-center justify-between">
                            <p class="">{{ $product->name ?? '' }}</p>
                            {{-- <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                            </svg> --}}
                        </div>
                        @if ($product->discount ?? 0 > 0)
                            <p class="pt-1 text-gray-500">
                                {{ config('app.currency', '$') }}
                                <span class="line-through">{{ number_format($product->price ?? 0, 0, ',', '.') }}</span>
                                <span
                                    class="inline-flex items-center rounded-md bg-red-700 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red-600/20">{{ $product->discount ?? 0 }}%</span>
                            </p>
                            <p class="pt-1 text-red-700">
                                {{ config('app.currency', '$') }}
                                {{ number_format($product->discounted_price, 0, ',', '.') }}
                            </p>
                        @else
                            <p class="pt-1 text-gray-900">
                                {{ config('app.currency', '$') }}
                                {{ number_format($product->price ?? 0, 0, ',', '.') }}
                            </p>
                        @endif
                    </a>
                </div>
            @endforeach

            <div class="w-full z-30 top-0 px-6 py-1 text-center">
                <button class="w-full md:w-1/3 xl:w-1/4 p-6 border border-gray-300 rounded-lg hover:bg-gray-100 text-xl hover:text-black mx-auto text-center"
                    onclick="window.location.href='{{ route('shop') }}'">
                    <span>More Products</span>
                </button>
            </div>
        </div>

    </section>
</x-front-end-layout>
