@if ($orders)
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>

        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        @foreach($orders as  $key => $order)
            <tr>
                <td>#{{ $i++ }}</td>
                <td><a href="{{ route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id]) }}" target="_blank">{{ isset($order->product->pro_name) ? $order->product->pro_name : '' }}</a></td>
                <td>
                    <img style="width: 80px;height: 80px" src="{{ isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : ''}}" alt="">
                </td>
                <td>{{ number_format($order->or_price,0,',','.') }}đ</td>
                <td>{{ $order->or_qty }}</td>
                <td>{{ number_format($order->or_price * $order->or_qty,0,',','.') }} đ</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endif
