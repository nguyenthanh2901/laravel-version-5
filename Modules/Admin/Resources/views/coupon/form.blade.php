<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên mã giảm giá:</label>
        <input type="text" class="form-control" placeholder="Tên mã giảm giá" value="{{old('name', isset($coupon->co_name)? $coupon->co_name:   '')}}" name="name">
    </div>
    <div class="form-group">
        <label for="name">Mã giảm giá:</label>
        <input type="text" class="form-control" placeholder="Mã giảm giá" value="{{old('co_code', isset($coupon->co_code)? $coupon->co_code:   '')}}" name="co_code">
    </div>
    <div class="form-group">
        <label for="name">Loại giảm giá:</label>
        <select name="co_type" id="" class="form-control">
                
                <option value="Trừ trực tiếp">Trừ trực tiếp</option>
         </select>
    </div>
    <div class="form-group">
        <label for="name">Giá trị:</label>
        <input type="number" class="form-control" placeholder="Giá trị mã giảm giá" value="{{old('co_value', isset($coupon->co_value)? $coupon->co_value:   '')}}" name="co_value">
    </div>
     <div class="form-group">
        <label for="name">Số lượng:</label>
        <input type="number" class="form-control" placeholder="Số lượng mã giảm giá" value="{{old('co_number', isset($coupon->co_number)? $coupon->co_number:   '')}}" name="co_number">
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>
