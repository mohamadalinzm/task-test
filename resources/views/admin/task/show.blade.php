@component('admin.layouts.content' , ['title' => 'جزییات محصول' ])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">محصول</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <h1>جزییات {{ $product->name }}</h1>
            <p><a href="{{ route('product.edit', ['product' => $product]) }}">ویرایش</a></p>

{{--            <form action="{{ route('product.destroy', ['product' => $product]) }}" method="POST">--}}
{{--                @method('DELETE')--}}
{{--                @csrf--}}

{{--                <button class="btn btn-danger" type="submit">حذف</button>--}}
{{--            </form>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>نام</strong> {{ $product->title }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>قیمت</strong> {{ number_format($product->price) }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>قیمت با تخفیف</strong> {{ number_format($product->off) }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>میزان تخفیف</strong> {{ number_format($product->offPrice) }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>درصد تخفیف</strong> {{ $product->offPercent }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>میزان کارمزد</strong> {{ $product->feePrice }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>درصد کارمزد</strong> {{ $product->feePercent }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>وزن</strong> {{ $product->weight }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>رنگ</strong> {{ $product->color }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>نوع</strong> {{ $product->type }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>عیار</strong> {{ $product->cutting }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>میزان فروش</strong> {{ $product->saleCount }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>موجودی</strong> {{ $product->inventory }}</p>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <img src="/image/{{ $product->cover() }}" alt="" class="img-thumbnail">
        </div>
    </div>
@endcomponent
