@extends('layouts.CoreLayout')

@section('content')
<!-- header -->
<header class = "header" id = "header">
    <div class = "head-top">
        <div class = "site-name">
        </div>
        <div class = "site-nav">
            <span id = "nav-btn">MENU <i class = "fas fa-bars"></i></span>
        </div>
    </div>

    <div class = "head-bottom flex">
        <h2>NICE AND COMFORTABLE PLACE TO STAY</h2>
        <p>We got luxurious rooms and stuff</p>
    </div>
</header>
<!-- end of header -->



<!-- side navbar -->
<div class = "sidenav" id = "sidenav">
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>

    <ul class = "navbar">
        <li><a href = "#header">home</a></li>
        <li><a href = "#services">services</a></li>
        <li><a href = "#rooms">rooms</a></li>
        <li><a href = "#customers">customers</a></li>
    </ul>
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><button class = "btn Dashboard">Dashboard</button></a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><button class = "btn log-in">log in</button></a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><button class = "btn sign-up">sign up</button></a>
            @endif
        @endauth
    @endif



</div>
<div id = "modal"></div>
<!-- end of side navbar -->


<!--start of services-->
<section class = "services sec-width" id = "services">
    <div class = "title">
        <h2>services</h2>
    </div>
    <div class = "services-container">

        <!-- single service 0-->
        <article class = "service">
            <div class = "service-icon">
                <span>
                    <i class = "fas fa-utensils"></i>
                </span>
            </div>
            <div class = "service-content">
                <h2>Food Services</h2>
                <p>We got multiple restaurants all serving the local cuisine, exotic foods and all time favourites. if you prefer eating while enjoying the beach view
                we got 2 beach bars. If you prefer to stay in the comfort of our luxury rooms the options of ordering to the room is also available</p>
            </div>
        </article>

        <!-- single service 1-->
        <article class = "service">
            <div class = "service-icon">
                        <span>
                            <i class = "fas fa-swimming-pool"></i>
                        </span>
            </div>
            <div class = "service-content">
                <h2>Refreshment</h2>
                <p>We got multiple indoor and outdoor pools for your those who enjoy swimming but not enough to get into a cold ocean.
                    pools are heated to a nice 30 °C and for those who enjoy hot water we got 2 indoor and 3 outdoor Jacuzzis for our customers.
                    The best rooms have their own jacuzzis</p>
            </div>
        </article>

        <!-- single service 2-->
        <article class = "service">
            <div class = "service-icon">
                        <span>
                            <i class = "fas fa-broom"></i>
                        </span>
            </div>
            <div class = "service-content">
                <h2>Housekeeping</h2>
                <p>To keep our place tidy we clean up often every 12 hours our staff will clean the entire indroos.
                    However you can also ask for your room o be cleaned earlier or if you spilled something</p>
            </div>
        </article>

        <!-- single service 3-->
        <article class = "service">
            <div class = "service-icon">
                        <span>
                            <i class = "fas fa-door-closed"></i>
                        </span>
            </div>
            <div class = "service-content">
                <h2>Room Security</h2>
                <p>We've got the most modern security system to date halls are monitered by nearly ivisible cctv cameras and our doors use keycards
                so you needn't worry about anyone picking the locks. Additionally, if the card reading mechanisms would be damaged or the door forced opened
                a loud alarm would be triggered</p>
            </div>
        </article>
    </div>
</section>
<!--end of services-->


<div class = "book">
    @livewire('search')
    @if($errors->any())
        <div class="w-3/4 m-auto text-center">
            @foreach($errors->all() as $error)
                <li class="text-red-600 list-none">
                    {{$error}}
                </li>
            @endforeach
        </div>
    @endif
</div>

<!-- rooms -->
<section class = "rooms sec-width" id = "room">
    <div class = "title">
        <h2>rooms</h2>
    </div>
    <div class = "rooms-container">
        <!-- single room 0-->
        <article class = "room">
            <div class = "room-image">
                <img src = "{{asset('images/img1.jpg')}}" alt = "room image">
            </div>
            <div class = "room-text">
                <h3>Luxury Rooms</h3>
                <ul>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        extra food ordering options
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        big jacuzzi in balcony (up to 6 people)
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        max 6 people
                    </li>
                </ul>
                <p>One of the best, most luxurious and most expensive of the rooms for those with who want to go all out for their vacation</p>
                <p>3 fluffy king size beds, oak furniture and gold coated surfaces will make you feel like royalty</p>
                <p class = "rate">
                    <span>$99.00 /</span> Per Night
                </p>
                <a href="{{route('rooms.index')}}"><button type = "button" class = "btn">book now</button></a>

            </div>
        </article>


        <!-- single room 1-->
        <article class = "room">
            <div class = "room-image">
                <img src = "{{asset('images/img2.jpg')}}" alt = "room image">
            </div>
            <div class = "room-text">
                <h3>Luxury Rooms</h3>
                <ul>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        small jacuzzi in balcony (up to 2 people)
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        max 2 people
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        premium room services
                    </li>
                </ul>
                <p>one of our more luxury rooms for those on a stricter bugget</p>
                <p>An oak queen size bed most modern and fancy furniture</p>
                <p class = "rate">
                    <span>$99.00 /</span> Per Night
                </p>
                <a href="{{route('rooms.index')}}"><button type = "button" class = "btn">book now</button></a>
            </div>
        </article>


        <!-- single room 2-->
        <article class = "room">
            <div class = "room-image">
                <img src = "{{asset('images/img3.jpg')}}" alt = "room image">
            </div>
            <div class = "room-text">
                <h3>Luxury Rooms</h3>
                <ul>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        sekks room
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        unique option to order kinky/sexy attire
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        adults toys
                    </li>
                    <li>
                        <i class = "fas fa-arrow-alt-circle-right"></i>
                        max 3 people
                    </li>
                </ul>
                <p>A room option for those who are looking to explore their sexuality and pleasure sensors</p>
                <p>This also happens to be the only room in the hotel where the staff will call the customer before entering and it is the most soundproof
                of all rooms</p>
                <p class = "rate">
                    <span>$99.00 /</span> Per Night
                </p>
                <a href="{{route('rooms.index')}}"><button type = "button" class = "btn">book now</button></a>
            </div>
        </article>
    </div>
</section>

<!--reviews/testimonials-->
<section class = "customers" id = "customers">
    <div class = "sec-width">
        <div class = "title">
            <h2>customers</h2>
        </div>
        <div class = "customers-container">
            <!-- single customer 0-->
            <div class = "customer">
                <div class = "rating">
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                </div>
                <h3>I Loved it</h3>
                <p>I bought the most luxurious room and was treated like royalty</p>
                <img src = "{{asset('images/cus1.jpg')}}" alt = "customer image">
                <span>Customer Name, Country</span>
            </div>


            <!-- single customer 1-->
            <div class = "customer">
                <div class = "rating">
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "far fa-star"></i></span>
                </div>
                <h3>Comfortable Living</h3>
                <p>The beds were so comfortable and fluffy</p>
                <img src = "{{asset('images/cus2.jpg')}}" alt = "customer image">
                <span>Customer Name, Country</span>
            </div>


            <!-- single customer 2-->
            <div class = "customer">
                <div class = "rating">
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "fas fa-star"></i></span>
                    <span><i class = "far fa-star"></i></span>
                </div>
                <h3>Nice Place</h3>
                <p>The hotel looks great. beautiful scenery indoors and outdoors</p>
                <img src = "{{asset('images/cus3.jpg')}}" alt = "customer image">
                <span>Customer Name, Country</span>
            </div>
        </div>
    </div>
</section>
<!--end of reviews/testimonials-->

<!-- footer -->
<footer class = "footer">
    <div class = "footer-container">
        <div>
            <h2>About Us </h2>
            <p>went rent luxurious rooms with great amount of options and additional services</p>
            <ul class = "social-icons">
                <li class = "flex">
                    <i class = "fa fa-twitter fa-2x"></i>
                </li>
                <li class = "flex">
                    <i class = "fa fa-facebook fa-2x"></i>
                </li>
                <li class = "flex">
                    <i class = "fa fa-instagram fa-2x"></i>
                </li>
            </ul>
        </div>

        <div>
            <h2>Useful Links</h2>
            <a href = "#">Blog</a>
            <a href = "#">Rooms</a>
            <a href = "#">Newsletter Subscription</a>
            <a href = "#">Gift Card</a>
        </div>

        <div>
            <h2>Privacy</h2>
            <a href = "#">Career</a>
            <a href = "#">About Us</a>
            <a href = "#services">Services</a>
        </div>

        <div>
            <h2>Contacts</h2>
            <div class = "contact-item">
                        <span>
                            <i class = "fas fa-map-marker-alt"></i>
                        </span>
                <span>
                            12 none street, digonys, Lithuania
                        </span>
            </div>
            <div class = "contact-item">
                        <span>
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                <span>
                            +1-202-555-0175
                        </span>
            </div>
            <div class = "contact-item">
                        <span>
                            <i class = "fas fa-envelope"></i>
                        </span>
                <span>
                            info@none.com
                        </span>
            </div>
        </div>
    </div>
</footer>
@endsection
<!-- end of footer -->

