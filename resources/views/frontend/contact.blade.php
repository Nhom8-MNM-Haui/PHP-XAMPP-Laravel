@extends("frontend.layout")
@section("do-du-lieu-vao-layout")
<div class="col-xs-12 col-sm-12 col-md-3">
  <div class="title-page-contact">
    <h1>Thông tin liên hệ</h1>
    <h4>Đại học Công nghiệp Hà Nội</h4>
  </div>
  <div class="content-page-contact">
    <ul>
      <li>
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        <span>&nbsp; Địa chỉ: Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội</span>
      </li>
      <li>
        <i class="fa fa-phone" aria-hidden="true"></i>
        <span>&nbsp; Điện thoại: 09876546548</span>
      </li>
      <li>
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <span>&nbsp; Email: <a href="mailto:contact@nhanh.vn" class="text-danger">contact@haui.com</a></span>
      </li>
      <li>
        <i class="fa fa-home" aria-hidden="true"></i>
        <span>&nbsp; Website: <a href="https://www.haui.edu.vn/vn" class="text-danger">https://www.haui.edu.vn/vn</a></span>
      </li>
    </ul>
  </div>
</div>
<div class="col-md-9 col-sm-12 col-xs-12">
  <div class="title-page-contact">
    <h1>Chỉ đường</h1>
  </div>
  <div class="box-maps">
    <div class="iFrameMap">
      <div class="google-map">
        <div id="contact_map" class="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.47323655086!2d105.73305412294096!3d21.053753042432128!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1629229623201!5m2!1svi!2s" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen="" loading="lazy"></iframe> 
       </div>
     </div>
   </div>
 </div>
</div>
@endsection