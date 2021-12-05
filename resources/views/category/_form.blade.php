<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Tên danh mục <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Tên danh mục" value="{{ old('name', $data_edit->name ?? '') }}">
                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="type">Loại danh mục <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="type">
                        <option value="">Chọn loại danh mục</option>
                        <option value="0" {{ isset($data_edit->type) && $data_edit->type == 0 ? 'selected' : '' }}>Tin tức</option>
                        <option value="1" {{ isset($data_edit->type) && $data_edit->type == 1 ? 'selected' : '' }}>Sản phẩm</option>
                    </select>
                    {!! $errors->first('type', '<span class="error">:message</span>') !!}
                </div>
            </div>

        </div>
        
        <div>
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>
</div>