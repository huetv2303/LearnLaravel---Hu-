@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

@endsection

@section('content')
    <form method="POST" action="">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhap ten danh muc">
            </div>

            <div class="form-group">
                <label for="menu">Danh mục </label>
                <select class="form-control" name="parent_id">
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả </label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="menu">Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="active" value="1" name="active">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>

                </div>
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );

    </script>
@endsection
