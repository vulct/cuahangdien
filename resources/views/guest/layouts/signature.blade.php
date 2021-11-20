<div class="signature">
    <div class="inner">
        <p class="note">Quý khách hàng có nhu cầu tư vấn về giá bán hoặc thông tin kỹ thuật vui
            lòng liên hệ với chúng tôi theo hotline bên dưới để được tư vấn tốt nhất.</p>

        <p class="hotline"><span>HOTLINE:</span> <a href="tel:{{$info->hotline1 ?? ""}}">{{$info->hotline1 ?? ""}}</a></p>
        <img height="70"
             src="{{asset('guest/images/icon/contact-now.gif')}}"
             width="125" class="gif" alt="contact">
        <div class="text-center">
            <p class="highlight">☞ TẠI SAO NÊN CHỌN {{$info->name ?? config('app.name')}}</p>
            <ul>
                <li>✔ HÀNG CHÍNH HÃNG CHẤT LƯỢNG TỐT NHẤT</li>
                <li>✔ CAM KẾT GIÁ TỐT NHẤT KHU VỰC</li>
                <li>✔ DỊCH VỤ BẢO HÀNH HẬU MÃI TẬN TÌNH LÂU DÀI</li>
            </ul>
            <p><i><b>{{$info->name ?? config('app.name')}}</b> nhà cung cấp sỉ, lẻ thiết bị điện xây dựng
                    dân dụng và công nghiệp tại TP. Hồ Chí Minh. Cam kết giá tốt nhất trong khu
                    vực, hỗ trợ giao hàng đến các tỉnh thành.</i></p>
        </div>
    </div>
</div>
