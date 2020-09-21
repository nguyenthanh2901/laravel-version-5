@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="{{{route('admin.home')}}}">Trang chủ Admin</a></li>
            <li><a href="" title="">Cập nhật tình trạng đơn hàng {{$transaction->id}}</a></li>
            <li class="active">cập nhật</li>
        </ol>
    </div>
   <div >
       <div class="row">
  <form action="" method="POST">
      @csrf
      <div class="form-group">
      <label for="name" >Tình trạng đơn hàng:</label>
          <select value="" name="tr_sta" id="" class="form-control">
             <option value="">{{old('tr_sta', isset($transaction->tr_sta)? $transaction->tr_sta:   '--Chọn tình trạng--')}}</option>                          
             <option value="Đã xác nhận đơn hàng">Đã xác nhận đơn hàng</option>
             <option value="Đã gửi hàng cho ĐVVC">Đã gửi hàng cho ĐVVC</option>
             <option value="Giao hàng thành công">Giao hàng thành công</option>
           </select>
       </div>
      <div class="form-group">
          <label for="name">Đơn vị vận chuyển:</label>
          <input type="text" class="form-control" placeholder="Đơn vị vận chuyển" value="{{old('tr_shipper', isset($transaction->tr_shipper)? $transaction->tr_shipper:   '')}}" name="tr_shipper">
         
      </div>
      <div class="form-group">
          <label for="name">Mã vận đơn:</label>
          <input type="text" class="form-control" placeholder="Mã vận đơn" value="{{old('tr_codeship', isset($transaction->tr_codeship)? $transaction->tr_codeship:   '')}}" name="tr_codeship">
         
      </div>
      
      <button  type="submit" class="btn btn-success">Lưu thông tin</button>
  </form>

       </div>
   </div>
@stop
