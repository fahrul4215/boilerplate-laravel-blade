<div class="nm-page-overflow">
    <div class="nm-page-wrap">

        <div class="nm-page-wrap-inner">
            <div class="woocommerce-notices-wrapper"></div>
            <div id="product-246"
                class="layout-default gallery-col-7 summary-col-5 thumbnails-vertical has-bg-color meta-layout-default tabs-layout-default product type-product post-246 status-publish first instock product_cat-decoration product_tag-decor product_tag-interior has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="clear">

                    <div id="nm-shop-notices-wrap"></div>
                    <div class="nm-single-product-showcase">
                        <div class="nm-single-product-summary-row nm-row">
                            <div class="nm-single-product-summary-col col-xs-12">
                                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images lightbox-enabled pagination-enabled"
                                    data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out;">
                                    <div class="swiper hero-swiper container mx-auto w-full h-96">
                                        <div class="swiper-wrapper">
                                            @foreach ($product->images ?? [] as $item)
                                                <div class="swiper-slide relative bg-cover bg-center"
                                                    style="background-image: url('{{ Storage::url($item->path ?? '') }}');">
                                                    <img src="{{ Storage::url($item->path ?? '') }}"
                                                        class="h-full w-full object-cover rounded">
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- If we need pagination -->
                                        <div class="swiper-pagination"></div>
                                        <!-- If we need navigation buttons -->
                                        {{-- <div
                                            class="swiper-button-prev prev w-16 h-16 mx-auto ml-2 md:ml-10 cursor-pointer text-sm font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">
                                        </div>
                                        <div
                                            class="swiper-button-next next w-16 h-16 mx-auto mr-2 md:mr-10 cursor-pointer text-sm font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">
                                        </div> --}}
                                    </div>

                                    <p>
                                        {!! $product->description ?? '' !!}
                                    </p>
                                </div>

                                <div class="summary entry-summary">
                                    <div class="nm-product-summary-inner-col nm-product-summary-inner-col-1">
                                        <h1 class="product_title entry-title">
                                            {{ $product->name ?? '' }}
                                        </h1>
                                        <p class="price">
                                            @if ($product->discount ?? 0 > 0)
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span
                                                            class="woocommerce-Price-currencySymbol">{{ config('app.currency', '$') }}</span>
                                                        {{ number_format($product->discounted_price ?? 0, 0, ',', '.') }}
                                                    </bdi>
                                                </span>
                                                <span class="line-through">
                                                    {{ config('app.currency', '$') }}
                                                    {{ number_format($product->price ?? 0, 0, ',', '.') }}
                                                </span>
                                                <span
                                                    class="inline-flex items-center rounded-md ml-2 bg-red-700 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-red-600/20">{{ $product->discount ?? 0 }}%</span>
                                            @else
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>
                                                        <span
                                                            class="woocommerce-Price-currencySymbol">{{ config('app.currency', '$') }}</span>
                                                        {{ number_format($product->price ?? 0, 0, ',', '.') }}
                                                    </bdi>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="nm-product-summary-inner-col nm-product-summary-inner-col-2">
                                        <div class="woocommerce-product-details__short-description entry-content">
                                        </div>

                                        <form class="cart">
                                            <div class="nm-quantity-wrap qty-show">
                                                <label>Quantity</label>
                                                <label class="nm-qty-label-abbrev">Qty</label>

                                                <div class="quantity">
                                                    <div class="nm-qty-minus nm-font nm-font-media-play"
                                                        wire:click="SendQtyMinus">
                                                        <i class="fa-solid fa-caret-left"></i>
                                                    </div>
                                                    <input type="number" id="quantity_665188ba564b8"
                                                        class="input-text qty text" value="1"
                                                        aria-label="Product quantity" size="4" min="1"
                                                        max="" step="1" placeholder="" pattern="[0-9]*"
                                                        wire:model="send_qty">
                                                    <div class="nm-qty-plus nm-font nm-font-media-play"
                                                        wire:click="SendQtyPlus">
                                                        <i class="fa-solid fa-caret-right"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <button wire:click="AddToCart()"
                                                class="nm-simple-add-to-cart-button single_add_to_cart_button button alt">
                                                Add to cart
                                            </button>
                                        </form>

                                        <div class="nm-product-share-wrap has-share-buttons">
                                            <div class="nm-product-wishlist-button-wrap">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div> <!-- .nm-page-wrap-inner -->
        </div> <!-- .nm-page-wrap -->

    </div>
