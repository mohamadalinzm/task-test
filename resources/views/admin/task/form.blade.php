
<div class="row">

    <div class="form-group col-lg-6">
        <label for="title">نام</label>
        <input type="text" name="title" value="{{ old('title') ?? $task->title }}" class="form-control">
        <div class="alert-error">{{ $errors->first('title') }}</div>
    </div>

    <div class="form-group col-lg-12">
        <label for="description">توضیحات</label>

        <textarea id="description" type="text" name="description" value="{{ old('description') ?? $task->description }}" rows="4" class="form-control">{{ old('description') ?? $task->description }}</textarea>
        <div class="alert-error">{{ $errors->first('description') }}</div>
    </div>

    <div class="form-group col-lg-6">
        <label>وضعیت</label>
        <select name="status" id="status" class="form-control select2" data-placeholder=" وضعیت را انتخاب کنید"
                style="width: 100%;text-align: right">
            @foreach(\App\Enums\TaskStatusEnum::asArray() as $id => $name)
                <option value="{{ $id }}" {{ (old('status') ?? $task->status) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
        <div class="alert-error">{{ $errors->first('status') }}</div>
    </div>


</div>
@csrf
