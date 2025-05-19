@component('admin.layouts.content' , ['title' => 'لیست تسک ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست تسک ها</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تسک ها</h3>

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
                            <a href="{{ route('web.task.create') }}" class="btn btn-info">ایجاد تسک جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>نام</th>
                            <th>وضعیت</th>
                            <th>اقدامات</th>
                        </tr>

                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ \App\Enums\TaskStatusEnum::from($task->status)->name() }}</td>
                                @if(auth()->user()->hasRole('Admin'))
                                    <td class="d-flex">
                                        <form action="{{ route('web.task.destroy' , ['task' => $task->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
                                        <a href="{{ route('web.task.edit' , ['task' => $task->id]) }}" class="btn btn-sm btn-primary">ویرایش</a>
                                        <a href="{{ route('web.task.show' , ['task' => $task->id]) }}" class="btn btn-sm btn-secondary mx-1">نمایش</a>
                                    </td>
                                @else
                                    <td class="d-flex">
                                        <a href="{{ route('web.task.show' , ['task' => $task->id]) }}" class="btn btn-sm btn-secondary mx-1">نمایش</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $tasks->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
