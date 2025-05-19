<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('users.index') }}" class="brand-link">
{{--        <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> --}}
{{--                <div class="image">--}}
{{--                    <img src="{{ url('img/ashkan-emami.jpeg') }}" class="img-circle elevation-2" alt="User Image">--}}
{{--                </div>--}}
                {{-- <div class="info">
                    <a href="#" class="d-block">محمد علی ناظم البکاء</a>
                </div> --}}
            {{-- </div> --}}

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link {{ isActive('admin') }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>پنل مدیریت</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link {{ isActive('users.index') }}">
                           <i class="nav-icon fa fa-users"></i>
                            <p>کاربران</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item has-treeview {{ isActive(['users.index' , 'users.create' , 'users.edit'] , 'menu-open') }}">
                        <a href="#" class="nav-link {{ isActive('users.index') }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link {{ isActive('users.index') }}">
                                    <i class="nav-icon fas fa-user-plus"></i>
                                    <p>لیست کاربران</p>
                                </a>
                            </li>

                           <li class="nav-item">
                               <a href="{{ route('admin') }}" class="nav-link">
                                   <i class="nav-icon fas fa-user-lock"></i>
                                   <p>اجازه دسترسی</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link {{ isActive(['product.index' , 'product.create' , 'product.edit' , 'product.show']) }}">
                            <i class="nav-icon fas fa-gem"></i>
                            <p>محصولات</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link {{ isActive(['order.index' , 'order.create' , 'order.edit' , 'order.show']) }}">
                            <i class="nav-icon fas fa-shipping-fast"></i>
                            <p>سفارشات</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('payment.index') }}" class="nav-link {{ isActive(['payment.index' , 'payment.create' , 'payment.edit' , 'payment.show']) }}">
                            <i class="nav-icon far fa-credit-card"></i>
                            <p>پرداخت ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('coupon.index') }}" class="nav-link {{ isActive(['coupon.index' , 'coupon.create' , 'coupon.edit' , 'coupon.show']) }}">
                            <i class="nav-icon fas fa-ticket-alt"></i>
                            <p>کدهای تخفیف</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link {{ isActive(['category.index' , 'category.create' , 'category.edit' , 'category.show']) }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>دسته بندی ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tag.index') }}" class="nav-link {{ isActive(['tag.index' , 'tag.create' , 'tag.edit' , 'tag.show']) }}">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>تگ ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('slider.index') }}" class="nav-link {{ isActive(['slider.index' , 'slider.create' , 'slider.edit' , 'slider.show']) }}">
                            <i class="nav-icon far fa-images"></i>
                            <p>بنر ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('size.index') }}" class="nav-link {{ isActive(['size.index' , 'size.create' , 'size.edit' , 'size.show']) }}">
                            <i class="nav-icon fas fa-ruler"></i>
                            <p>سایز ها</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('comment.index') }}" class="nav-link {{ isActive(['comment.index' , 'comment.create' , 'comment.edit' , 'comment.show']) }}">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>نظرات</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('faq.index') }}" class="nav-link {{ isActive(['faq.index' , 'faq.create' , 'faq.edit' , 'faq.show']) }}">
                            <i class="nav-icon far fa-question-circle"></i>
                            <p>سوالات متداول</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('setting.index') }}" class="nav-link {{ isActive(['setting.index' , 'setting.create' , 'setting.edit' , 'setting.show']) }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>تنظیمات</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
