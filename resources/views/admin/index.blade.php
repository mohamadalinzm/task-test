@component('admin.layouts.content' , ['title' => 'پنل مدیریت'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">پنل مدیریت</li>
    @endslot

    <h2>صفحه اصلی</h2>

    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ 0 }}</h3>

                    <p>تسک ها</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pizza"></i>
                </div>
                <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ 0 }}</h3>

                    <p>سفارشات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cube"></i>
                </div>
                <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ 0 }}</h3>

                    <p>کاربران ثبت شده</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ 0 }}</h3>

                    <p>نظرات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-chatbubbles"></i>
                </div>
                <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
<!-- ./col -->

<!-- Secend row-->

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>تسک ها</p>
            </div>
            <div class="icon">
                <i class="ion ion-pizza"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>سفارشات پرداخت شده/نیاز به اقدام</p>
            </div>
            <div class="icon">
                <i class="ion ion-cube"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>کاربران دارای خرید</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>نظرات بررسی نشده</p>
            </div>
            <div class="icon">
                <i class="ion ion-chatbubbles"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->

</div>

<!-- Third row-->

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>فروش روز</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>فروش ماه</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ 0 }}</h3>

                <p>فروش سال</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('web.task.index') }}" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>


</div>

@endcomponent
