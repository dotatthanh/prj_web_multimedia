<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>

        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="title">Tiêu đề <span class="text-danger">*</span></label>
                    <input id="title" name="title" type="text" class="form-control" placeholder="Tiêu đề" value="{{ old('title', $data_edit->title ?? '') }}">
                    {!! $errors->first('title', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="category_id">Danh mục <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="category_id">
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($data_edit->category_id) && $data_edit->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('category_id', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="image">Ảnh đại diện</label>
                    <input id="image" name="image" type="file" class="form-control">
                    {!! $errors->first('image', '<span class="error">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Tóm tắt</h4>

        <textarea id="summary" class="summernote mb-2" name="summary">{{ isset($data_edit->summary) ? $data_edit->summary : '' }}</textarea>
        {!! $errors->first('summary', '<span class="error">:message</span>') !!}
    </div>

</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Mô tả</h4>

        <textarea id="content" class="summernote mb-2" name="content">{{ isset($data_edit->content) ? $data_edit->content : '' }}</textarea>
        {!! $errors->first('content', '<span class="error">:message</span>') !!}

        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('news.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>

</div>