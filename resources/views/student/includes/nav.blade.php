<ul class="menu-list">
    <li>
        <a href="{{route('student-dashboard')}}" class="{{request()->path() == 'student/dashboard' ? 'active' : ''}}">
            {{__('My Courses')}}
        </a>
    </li>
    <li>
        <a href="{{ route('student-wishlists') }}"
        class="
        @if(request()->path() == 'student/wishlists')active
        @elseif(request()->is('student/wishlists/*'))active

        @endif
        "
        >
            {{__('Wishlist')}}
        </a>
    </li>
    <li>
        <a href="{{route('student-messages')}}" class="
            @if(request()->path() == 'student/messages') active
            @elseif(request()->path() =='student/message')active
            @elseif(request()->is('student/message/*'))active

            @endif
            ">
            {{__('My messages')}}
        </a>
    </li>

    <li>

        <a href="{{route('student-order-index')}}" class="
            @if(request()->is('student/orders'))active
            @elseif(request()->is('student/orders/*'))active
            @endif
            ">
            {{__('Purchase History')}}
        </a>

    </li>
    <li>

        <a href="{{route('student.book.index')}}" class="
            @if(request()->is('student/book-orders'))active
            @elseif(request()->is('student/book-orders/*'))active
            @endif
            ">
            {{__('Book Order History')}}
        </a>

    </li>
    <li>
        <a href="{{route('student-profile')}}" class="{{request()->path() == 'student/profile' ? 'active' : ''}}">
            {{__('Profile')}}
        </a>
    </li>
    <li>
        <a href="{{ route('student-affilate-links')}}" class="{{ request()->path() == 'student/affilate-links' ? 'active' : ''}}">
            Referral Links
        </a>
    </li>

    <li>

        <a href="{{route('student-affilate')}}" class="
            @if(request()->is('student/affilates'))active
            @elseif(request()->is('student/affilate/history'))active
            @endif
            ">
            {{__('Referral Program')}}
        </a>

    </li>

</ul>
