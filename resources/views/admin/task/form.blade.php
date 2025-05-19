
<div class="row">

    <div class="form-group col-lg-6">
        <label for="title">نام</label>
        <input type="text" name="title" value="{{ old('title') ?? $product->title }}" class="form-control">
        <div class="alert-error">{{ $errors->first('title') }}</div>
    </div>
    <div class="form-group d-flex flex-column">
        <label for="image">تصویر شاخص</label>
        <input value="{{ old('image') ?? $product->cover() }}" type="file" class="py-2" name="image">
        <div class="alert-error">{{ $errors->first('image') }}</div>
    </div>

{{--    @if(isset($product->cover()))--}}
        <img src="{{ $product->cover() }}" alt="" style="width: 200px">
        <br>
{{--    @endif--}}
    <div class="form-group col-lg-12">
        <label for="description">توضیحات</label>

        <textarea id="description" type="text" name="description" value="{{ old('description') ?? convert($product->description) }}" rows="4" class="form-control">{{ old('description') ?? $product->description }}</textarea>
        <div class="alert-error">{{ $errors->first('description') }}</div>
    </div>

    <div class="form-group col-lg-6">
        <label>دسته بندی ها</label>
        <select name="categories[]" id="categories" class="form-control select2"  multiple="multiple" data-placeholder=" دسته بندی را انتخاب کنید"
                style="width: 100%;text-align: right">
            @foreach(\App\Category::all() as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
{{--                <option value="{{ $category->id }}" {{ (in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>--}}
            @endforeach
        </select>
        <div class="alert-error">{{ $errors->first('categories') }}</div>
    </div>

    <div class="form-group col-lg-6">
        <label for="tags" class="col-sm-2 select2 control-label">تگ ها</label>
        <select class="form-control select2" name="tags[]" id="tags" multiple="multiple">
            @foreach(\App\Tag::all() as $tag)
{{--                <option value="{{ $tag->id }}">{{ $tag->name }} </option>--}}
                <option value="{{ $tag->id }}" {{ in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>

            @endforeach
        </select>
        <div class="alert-error">{{ $errors->first('tags') }}</div>
    </div>

{{--    <div class="form-group col-lg-6">--}}
{{--        <label for="sizes" class="select2 col-sm-2 control-label">سایز ها</label>--}}
{{--        <select class="form-control select2" name="sizes[]" id="sizes">--}}
{{--            <option value="0">سایز مورد نظر خود را انتخاب کنید</option>--}}
{{--            @foreach(\App\Size::all() as $size)--}}
{{--                <option value="{{ $size->id }}">{{ $size->code }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--        <div class="alert-error">{{ $errors->first('sizes') }}</div>--}}
{{--    </div>--}}

{{--    <div class="col-lg-6">--}}

{{--    </div>--}}

{{--    <div id="size-quantity" class="col-lg-6">--}}
{{--        @if(isset($product->sizes))--}}
{{--            @foreach($product->sizes as $size)--}}
{{--                <div id="size-'+size+'" class="row">--}}
{{--                    <div class="form-group col-lg-4">--}}
{{--                        <label for="size">سایز</label>--}}
{{--                        <input type="text" name="size[]" value="{{ $size->code }}" class="form-control" disabled>--}}
{{--                    </div>--}}
{{--                    <div class="form-group col-lg-4">--}}
{{--                        <label for="quantity">موجودی</label>--}}
{{--                        <input type="text" name="quantity[]" value="{{ $size->pivot->quantity }}" class="form-control">--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4">--}}
{{--                        <button type="button" style="margin-top: 35px;" class="btn btn-sm btn-danger delete-size size-'+size+'">حذف</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}

{{--    <div class="col-lg-6">--}}

{{--    </div>--}}

    <div class="form-group col-lg-3">
        <label for="offType">نوع تخفیف</label>
        <select class="form-control select-off" name="offType" id="types">
            <option {{ isset($product->offPrice) ? 'selected' : '' }} value="1" selected>مقدار تخفیف</option>
            <option {{ isset($product->offPercent) ? 'selected' : '' }} value="0">درصد تخفیف</option>
        </select>
    </div>

    <div class="form-group type-off col-lg-3">
        <label for="offValue">تخفیف</label>
        <input type="text" name="offValue" value="{{ isset($product->offPercent) ? $product->offPercent : 0 }}" class="form-control">
{{--        <div class="alert-error">{{ $errors->first('offValue') }}</div>--}}
    </div>

    <div class="form-group col-lg-3">
        <label for="feePrice">اجرت نقدی</label>
        <input type="text" name="feePrice" value="{{  old('feePrice') ??  $product-> feePrice }}" class="form-control">
        <div class="alert-error">{{ $errors->first('feePrice') }}</div>
    </div>

    <div class="form-group col-lg-3">
        <label for="feePercent">اجرت درصدی</label>
        <input type="text" name="feePercent" value="{{ old('feePercent') ??  $product->feePercent  }}" class="form-control">
        <div class="alert-error">{{ $errors->first('feePercent') }}</div>
    </div>

    <div class="form-group col-lg-3">
        <label for="weight">وزن</label>
        <input type="text" name="weight" value="{{ old('weight') ?? $product->weight }}" class="form-control">
        <div class="alert-error">{{ $errors->first('weight') }}</div>
    </div>

    <div class="form-group col-lg-3">
        <label for="color">رنگ</label>
        <input type="text" name="color" value="{{ old('color') ?? $product->color }}" class="form-control">
        <div class="alert-error">{{ $errors->first('color') }}</div>
    </div>


    <div class="form-group col-lg-3">
        <label for="cutting">عیار</label>
        <input type="text" name="cutting" value="{{ 18 ?? $product->cutting }}" class="form-control">
        <div class="alert-error">{{ $errors->first('cutting') }}</div>
    </div>

    <div class="form-group col-lg-3">
        <label for="code">کد</label>
        <input type="text" name="code" value="{{ old('code') ?? $product->code }}" class="form-control">
        <div class="alert-error">{{ $errors->first('code') }}</div>
    </div>
</div>
@csrf
