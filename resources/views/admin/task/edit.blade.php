@component('admin.layouts.content' , ['title' => 'ویرایش محصولات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">محصولات</li>
    @endslot

    @slot('script')
        <script>
            $('#categories').select2({
                'placeholder' : 'دسته بندی مورد نظر را انتخاب کنید'
            })

            $('#tags').select2({
                'placeholder' : 'تگ مورد نظر را انتخاب کنید'
            })


            $('#sizes').select2({
                'placeholder' : 'سایز مورد نظر را انتخاب کنید'
            })

            $('#quantity').select2({
                'placeholder' : 'سایز مورد نظر را انتخاب کنید'
            })

            $("#sizes").on("select2:select", function (e) {
                console.log(e.params.data.text);
                let size = e.params.data.text;
                let bodyData = '<div id="size-'+size+'" class="row">' +
                    '<div class="form-group col-lg-4">' +
                    '<label for="size">سایز</label>' +
                    '<input type="text" name="size[]" value="'+size+'" class="form-control" disabled>' +
                    '</div>' +
                    '<div class="form-group col-lg-4">' +
                    '<label for="quantity">موجودی</label>' +
                    '<input type="text" name="quantity[]" value="1" class="form-control">' +
                    '</div>' +
                    '<div class="col-lg-4">' +
                    '<button type="button" style="margin-top: 35px;" class="btn btn-sm btn-danger delete-size size-'+size+'">حذف</button>' +
                    '</div>' +
                    '</divid>' ;
                $("#size-quantity").append(bodyData);
            });

            $("#types option.select-type").click(function (e) {
                let type = e;
                console.log('success');
                // $(".type-off").append(bodyData);
            });

            $('#size-quantity').on('click','button.delete-size',function(e){
                e.preventDefault();
                $(this).closest("div.row").remove();
            });
        </script>
        <link rel="stylesheet" type="text/css" id="u0" href="/tiny/skin.min.css">
        <script src="/tiny/tinymce.min.js"></script>
        <script>
            function initEditor(id){
                tinymce.init({
                    selector: 'textarea#'+id,
                    plugins : 'advlist autolink link lists table code pagebreak directionality image paste',
                    menubar: true,
                    language: 'fa',
                    height: 300,
                    relative_urls: false,
                    toolbar: ' removeformat | formatselect fontsizeselect bullist numlist | alignleft aligncenter alignright alignjustify | bold italic |  table link | ltr rtl | image',
                    images_file_types: 'jpg,svg,webp,png'

                });
            }
            initEditor('description');

        </script>
    @endslot

    <div class="row">
        <div class="col-12">
            <h1>ویرایش {{ $product->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="{{ route('product.update', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('admin.product.form')

                <button type="submit" class="btn btn-primary">ذخیره</button>
            </form>
        </div>
    </div>
@endcomponent
