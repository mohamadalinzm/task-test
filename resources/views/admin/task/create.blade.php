@component('admin.layouts.content' , ['title' => 'ایجاد تسک جدید'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">تسک ها</li>
    @endslot

    @slot('script')
        <script>


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
            <main>
                <section>
                    <form action="{{ route('web.task.store') }}" method="POST" enctype="multipart/form-data">
                        @include('admin.task.form')

                        <button type="submit" class="btn btn-primary my-2">ذخیره</button>
                    </form>
                </section>
            </main>

        </div>
    </div>
@endcomponent
