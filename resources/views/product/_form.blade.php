<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Tên sản phẩm" value="{{ old('name', $data_edit->name ?? '') }}">
                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="customer_id">Khách hàng <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="customer_id">
                        <option value="">Chọn khách hàng</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ isset($data_edit->customer_id) && $data_edit->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('customer_id', '<span class="error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="file">File @if($routeType == 'create')<span class="text-danger">*</span>@endif</label>
                    <input id="file" name="file" type="file" class="form-control">
                    {!! $errors->first('file', '<span class="error">:message</span>') !!}
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

                <div class="form-group">
                    <label for="image">Ảnh @if($routeType == 'create')<span class="text-danger">*</span>@endif</label>
                    <input id="image" name="image" type="file" class="form-control">
                    {!! $errors->first('image', '<span class="error">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Mô tả <span class="text-danger">*</span></h4>

        <textarea id="description" class="summernote mb-2" name="description">{{ isset($data_edit->description) ? $data_edit->description : '' }}</textarea>
        {!! $errors->first('description', '<span class="error">:message</span>') !!}

        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>

</div>