<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="index.html">
                    <img src="assets/images/logo@2x.png" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li>
                <a href="/admin/">
                    <i class="entypo-chart-pie"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('product.index')}}">
                    <i class="entypo-suitcase"></i>
                    <span class="title">Product</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="">
                    <i class="entypo-docs"></i>
                    <span class="title">Category|SubCategory|Size</span>
                </a>
                <ul>
                        <li>
                            <a href="{{route('category.index')}}">
                                <i class="entypo-docs"></i>
                                <span class="title">Product Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product_sub_category.index')}}">
                                <i class="entypo-docs"></i>
                                <span class="title">Product Sub-Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product_size.index')}}">
                                <i class="entypo-docs"></i>
                                <span class="title">Product Size</span>
                            </a>
                        </li>
                </ul>
            </li>


            <li class="has-sub">
                <a href="">
                    <i class="entypo-book"></i>
                    <span class="title">Bookings</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('delivery_details.index')}}">
                            <i class="entypo-database"></i>
                            <span class="title">Reseller</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/merchant-bookings">
                            <i class="entypo-database"></i>
                            <span class="title">Merchant</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="">
                    <i class="entypo-layout"></i>
                    <span class="title">Delivery City And Areas</span>
                </a>
                <ul>
                    <li>
                        <a href="{{route('deliverycity.index')}}">
                            <span class="title">Delivery City</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('delivery_zone.index')}}">
                            <span class="title">Delivery Zone</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('delivery_area.index')}}">
                            <span class="title">Delivery Area</span>
                        </a>
                    </li>
                </ul>
            </li>
                    <li>
                        <a href="{{route('contact_messages.index')}}">
                            <i class="entypo-mail"></i>
                            <span class="title">Contact Messages</span>
                        </a>
                    </li>
                    <li class="has-sub">
                        <a href="">
                            <i class="entypo-menu"></i>
                            <span class="title">Customer List</span>
                        </a>
                        <ul>

                            <li>
                                <a href="/admin/reseller_list">
                                    <i class="entypo-list"></i>
                                    <span class="title">Reseller List</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/merchant_list">
                                    <i class="entypo-list"></i>
                                    <span class="title">Merchant List</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="has-sub">
                        <a href="">
                            <i class="entypo-map"></i>
                            <span class="title">Coverage Area & Charges</span>
                        </a>
                        <ul>

                            <li>
                                <a href="/admin/coverage_area">
                                    <i class="entypo-map"></i>
                                    <span class="title">Coverage Area</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="/admin/area-charge">
                                    <i class="entypo-map"></i>
                                    <span class="title">Coverage Area Charge</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="/admin/charge-type">
                                    <i class="entypo-map"></i>
                                    <span class="title">Charge Type</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="">
                            <i class="entypo-book"></i>
                            <span class="title">Payment</span>
                        </a>
                        <ul>
                        <li>
                            <a href="/admin/reseller_payment">
                                <i class="entypo-trophy"></i>
                                <span class="title">Reseller Payment</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/merchant-payment">
                                <i class="entypo-trophy"></i>
                                <span class="title">Merchant Payment</span>
                            </a>
                        </li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="">
                            <i class="entypo-calendar"></i>
                            <span class="title">Payment History</span>
                        </a>
                        <ul>
                        <li>
                            <a href="/admin/reseller-payment/history">
                                <i class="entypo-layout"></i>
                                <span class="title">Reseller History</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/merchant-payment-history">
                                <i class="entypo-layout"></i>
                                <span class="title">Merchant History</span>
                            </a>
                        </li>
                        </ul>
                    </li>



                    <li class="has-sub">
                        <a href="">
                            <i class="entypo-heart"></i>
                            <span class="title">Interests</span>
                        </a>
                        <ul>
                        <li>
                            <a href="/admin/interests">
                                <i class="entypo-heart"></i>
                                <span class="title">Reseller Interest</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/merchant-interests">
                                <i class="entypo-heart"></i>
                                <span class="title">Merchant Interest</span>
                            </a>
                        </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/mega-menu">
                            <i class="entypo-layout"></i>
                            <span class="title">Mega Menu</span>
                        </a>
                    </li>


                    <li class="has-sub">
                        <a href="">
                            <i class="entypo-tools"></i>
                            <span class="title">Application Settings</span>
                        </a>
                        <ul>
                            <li>
                                <a href="/admin/app_settings">
                                    <i class="entypo-cog"></i>
                                    <span class="title">Basic Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('our_services.index')}}">
                                    <i class="entypo-thumbs-up"></i>
                                    <span class="title">Our Services Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('about_us.index')}}">
                                    <i class="entypo-user-add"></i>
                                    <span class="title">About Us Settings</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
    </div>

</div>
