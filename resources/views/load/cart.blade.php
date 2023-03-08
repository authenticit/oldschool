@if(Session::has('cart'))

<div class="dropdownmenu-wrapper">
    <div class="dropdown-cart-header">
        <span class="item-no">
            <span class="cart-quantity">
                {{ Session::has('cart') ? count(Session::get('cart')->items) : '0' }}
            </span> {{ __('Item(s)') }}
        </span>

        <a class="view-cart" href="{{ route('front.cart') }}">
            {{ __('View Cart') }}
        </a>
    </div>
    <ul class="dropdown-cart-products">

        @foreach(Session::get('cart')->items as $course)



            <li class="product cremove{{ $course['item']['id'] }}">
                <div class="product-details">
                    <div class="content">
                        <a href="{{ route('front.course',$course['item']['slug']) }}">
                            <h4 class="product-title">
                                {{ mb_strlen($course['item']['title'],'UTF-8') > 55 ? mb_substr($course['item']['title'],0,55,'UTF-8').'...' : $course['item']['title'] }}
                            </h4>
                        </a>

                        <span class="cart-product-info">
                            <span id="prct{{ $course['item']['id'] }}">{{$curr->sign}}{{round(($course['price'] * $curr->value),2)}}</span>
                        </span>
                    </div>
                </div>

                <figure class="product-image-container">
                    <a href="{{ route('front.course', $course['item']['slug']) }}" class="product-image">
                        <img src="{{ asset('assets/images/courses/'.$course['item']['photo']) }}" alt="product">
                    </a>
                    <div class="cart-remove" data-class="cremove{{ $course['item']['id'] }}"
                    data-href="{{ route('course.cart.remove',$course['item']['id']) }}">
                        <i class="fas fa-times"></i>
                    </div>
                </figure>
            </li>



        @endforeach

    </ul>

    <div class="dropdown-cart-total">
        <span>{{ __('Total') }}</span>

        <span class="cart-total-price">
            <span class="cart-total">{{ Session::has('cart') ? $curr->sign.round((Session::get('cart')->totalPrice * $curr->value),2) : '0.00' }}
            </span>
        </span>
    </div>

    <div class="dropdown-cart-action">
        <a href="{{ route('front.checkout') }}" class="mybtn1">{{ __('Checkout') }}</a>
    </div>
</div>

@else

<p class="mt-1 pl-3 text-left">{{ __('Cart is empty.') }}</p>

@endif
