<form action="" method="POST" enctype="multipart/form-data">
    @csrf
   <div class="row">
       <div class="col-sm-8">
           <div class="form-group">
               <label for="pro_name">Tên sản phẩm:</label>
               <input type="text" class="form-control" placeholder="Tên sản phẩm" value="{{old('pro_name', isset($product->pro_name)? $product->pro_name:   '')}}" name="pro_name">
               @if($errors->has('pro_name'))
                   <div class="error-text">
                       {{$errors->first('pro_name')}}
                   </div>
               @endif
           </div>
           <div class="form-group">
               <label for="name">Mô tả:</label>
               <input type="text" class="form-control" placeholder="Mô tả" value="{{old('pro_description', isset($product->pro_description)? $product->pro_description:   '')}}" name="pro_description">
               @if($errors->has('pro_description'))
                   <div class="error-text">
                       {{$errors->first('pro_description')}}
                   </div>
               @endif
           </div>
           <div class="form-group">
               <label for="name">Nội dung:</label>
               <textarea name="pro_content" class="form-control" id="pro_content" cols="30" rows="3" placeholder="Nội dung">{{ old('pro_content',isset($product->pro_content) ? $product->pro_content : '') }}</textarea>
               @if($errors->has('pro_content'))
                   <div class="error-text">
                       {{$errors->first('pro_content')}}
                   </div>
               @endif
           </div>
           <div class="form-group">
               <label for="name">Meta Description:</label>
               <input type="text" class="form-control" placeholder="Meta Description" value="{{old('pro_description_ceo', isset($product->pro_description_ceo)? $product->pro_description_ceo : '')}}" name="pro_description_ceo" >
           </div>
           <div class="form-group">
               <label for="name">Meta Title:</label>
               <input type="text" class="form-control" placeholder="Meta Title" value="{{old('pro_title_ceo', isset($product->pro_title_ceo)? $product->pro_title_ceo : '')}}" name="pro_title_ceo" >
           </div>

       </div>
       <div class="col-sm-4">
           <div class="form-group">
               <label for="name"> Loại sản phẩm:</label>
               <select name="pro_category_id" id="" class="form-control">
                   <option value="">--Chọn loại sản phẩm--</option>
                   @if(isset($categories))
                       @foreach($categories as $category)
                           <option value="{{$category->id}}" {{old('pro_category_id', isset($product->pro_category_id) ? $product->pro_category_id : '') == $category->id ? "selected='selected" : "" }}>{{$category->c_name}}</option>
                       @endforeach
                   @endif
               </select>
               @if($errors->has('pro_category_id'))
                   <div class="error-text">
                       {{$errors->first('pro_category_id')}}
                   </div>
               @endif
           </div>
           <div class="form-group">
               <label for="name"> Giá sản phẩm:</label>
               <input type="number" placeholder="Giá sản phẩm"  class="form-control" value="{{old('pro_price', isset($product->pro_price)? $product->pro_price : '')}}" name="pro_price">
               @if($errors->has('pro_price'))
                   <div class="error-text">
                       {{$errors->first('pro_price')}}
                   </div>
               @endif
           </div>
           <div class="form-group">
               <label for="name"> Số lượng:</label>
               <input type="number" placeholder="Số lượng"  class="form-control" value="{{old('pro_number', isset($product->pro_number)? $product->pro_number : '0')}}" name="pro_number">
           </div>

           <div class="form-group">
               <label for="name"> Màu sắc:</label>
               <input type="text" placeholder="Màu sác"  class="form-control" value="{{old('pro_color', isset($product->pro_color)? $product->pro_color : '')}}" name="pro_color">
           </div>

           <div class="form-group">
               <label for="name"> Dung lượng:</label>
               <input type="text" placeholder="Dung lượng"  class="form-control" value="{{old('pro_memory', isset($product->pro_memory)? $product->pro_memory : '')}}" name="pro_memory">
           </div>

           <div class="form-group">
               <label for="name"> % Giảm giá:</label>
               <input type="number" placeholder="% giảm giá"  class="form-control" name="pro_sale" value="{{old('pro_sale', isset($product->pro_sale)? $product->pro_sale : '0')}}">
           </div>
           <div class="form-group">
               <img  id="out_img" src="{{ asset('images/no_image.jpg') }}" alt="" style="width: 100%;height: 300px">
           </div>
           <div class="form-group">
               <label for="name"> Avatar:</label>
               <input type="file" name="avatar" id="input_img" class="form-control">
           </div>
           <div class="form-group">
               <div class="checkbox">
                   <label><input name="pro_hot" value="1" type="checkbox"> Nổi bật</label>
               </div>
           </div>
       </div>
   </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'pro_content' );
    </script>
@stop
