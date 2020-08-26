<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" value="{{old('name', isset($category->c_name)? $category->c_name:   '')}}" name="name">
        @if($errors->has('name'))
            <div class="error-text">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
     <div class="form-group">
        <label for="name">Logo:</label>
        <input type="text" class="form-control" placeholder="Logo" value="{{ old('icon',isset($category->c_icon) ? $category->c_icon : '') }}" name="icon">
        @if($errors->has('icon'))
            <span class="error-text">
                        {{$errors->first('icon')}}
                    </span>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Meta Title:</label>
        <input type="text" class="form-control" placeholder="Meta Title" value="{{old('c_title_ceo',isset($category->c_title_ceo)? $category->c_title_ceo: '')}}" name="c_title_ceo" >
    </div>
    <div class="form-group">
        <label for="name">Mô tả:</label>
        <input type="text" class="form-control" placeholder="Mô tả" value="{{old('c_description_ceo', isset($category->c_description)? $category->c_description : '')}}" name="c_description_ceo" >
    </div>
    
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
