@component('admin.layouts.content' , ['title' => 'جزییات تسک' ])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">تسک</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <h1>جزییات {{ $task->name }}</h1>
            <p><a href="{{ route('web.task.edit', ['task' => $task]) }}">ویرایش</a></p>

{{--            <form action="{{ route('web.task.destroy', ['task' => $task]) }}" method="POST">--}}
{{--                @method('DELETE')--}}
{{--                @csrf--}}

{{--                <button class="btn btn-danger" type="submit">حذف</button>--}}
{{--            </form>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>نام</strong> {{ $task->title }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>توضیحات</strong> {{ strip_tags($task->description) }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>وضعیت</strong> {{ \App\Enums\TaskStatusEnum::from($task->status)->name() }}</p>
        </div>
    </div>



@endcomponent
