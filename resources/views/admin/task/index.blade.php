@component('admin.layouts.content' , ['title' => 'لیست محصولات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست محصولات</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">محصولات</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
                            <a href="{{ route('product.create') }}" class="btn btn-info">ایجاد محصول جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>کد</th>
                            <th>تصویر</th>
                            <th>نام</th>
                            <th>قیمت</th>
                            <th>وضعیت تخفیف</th>
                            <th>موجودی</th>
                            <th>اقدامات</th>
                        </tr>

                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td><img style="width: 100px;height:100px" src="{{ $product->cover() }}" alt="" onerror="this.src='https://via.placeholder.com/100';"></td>
                                <td>{{ $product->title }}</td>
                                <td><span style="@if($product->off!=null) text-decoration: line-through @endif">{{ number_format($product->price) }}</span><br>{{ ($product->off !=null)?number_format($product->off):"" }}</td>
                                <td>@if ($product->off==null)
                                    ندارد
                                @else
                                  @if ($product->offPercent>0)
                                      {{ $product->offPercent }} درصد
                                  @else
                                  {{ number_format($product->offPrice) }} تومان

                                  @endif
                                @endif </td>
                                <td>@if ($product->inventory==0)
                                    ناموجود
                                @else
                                {{ $product->inventory }}
                                @endif</td>
                                <td class="d-flex">
                                    <form action="{{ route('product.destroy' , ['product' => $product->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                    </form>
                                    <a href="{{ route('product.edit' , ['product' => $product->id]) }}" class="btn btn-sm btn-primary">ویرایش</a>
                                    <a href="{{ route('product.upload' , ['product' => $product->id]) }}" class="btn btn-sm btn-warning mx-1">گالری</a>
                                    <a href="{{ route('product.quantity' , ['product' => $product->id]) }}" class="btn btn-sm btn-default mx-1">موجودی</a>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $products->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
