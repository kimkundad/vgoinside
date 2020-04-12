@extends('admin.layouts.template2')

@section('title')
ยังไม่ได้ตั้งชื่อ | เว็บไซต์
@stop



@section('stylesheet')

<style>
.theme-payment-success-title {
    font-size: 26px;
}
.theme-account-traveler {
    background: #fff;
    padding: 30px;
    border-radius: 3px;
    height: auto;
    position: relative;
    -webkit-box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    box-shadow: 0 1px 4px rgba(0,0,0,0.05);
}
.theme-sidebar-section-features-list > li {
    margin-bottom: 10px;
    position: relative;
    padding-left: 20px;
}
.theme-breadcrumbs-item-title > a {
    color: #6b6868;
    text-decoration: underline;
}
.theme-breadcrumbs {
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    margin-top: 30px;
    color: #6b6868;
}
.theme-breadcrumbs > li:after {
    content: '\2192';
    color: #6b6868;
    position: absolute;
    top: 0;
    right: 12px;
}
.theme-search-results-item-title, .theme-search-results-item-title-sm {
    font-size: 15px;
}
.theme-search-results-item-price-btn {
    padding: 7px 7px;
}
.theme-search-results-item-price {
    text-align: left;
    margin-bottom: 10px;
}
.theme-page-404 {
    color: #9E9E9E;
}
.theme-search-results-item-car-location-title2{
  font-size: 13px;
    line-height: 2em;
    margin-bottom: 4px;
}
.theme-payment-page-sections-item {
    margin-bottom: 30px;
    padding-bottom: 0px;
    border-bottom: 1px solid #e6e6e6;
}
</style>

@stop('stylesheet')

@section('content')


<div class="theme-page-section theme-page-section-gray theme-page-section-lg theme-page-section_pad" >
      <div class="container">
        <div class="row">
          <div class="col-md-2-5 ">
            <div class="theme-account-sidebar">
              <div class="theme-account-avatar">
                @if(Auth::user()->provider == 'email')
              <img class="theme-account-avatar-img" src="{{url('img/avatar/'.Auth::user()->avatar)}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}"/>
              @else
              <img class="theme-account-avatar-img" src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}"/>

              @endif
              <p class="theme-account-avatar-name">Welcome,
                <br/>{{Auth::user()->name}}
              </p>
              </div>
              <nav class="theme-account-nav">
                <ul class="theme-account-nav-list">
                  <li>
                    <a href="{{url('logout')}}">
                      <i class="fa fa-lock"></i>ออกจากระบบ
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-md-9-5 ">
            <div class="theme-search-area-header _mb-20">
                <ul class="theme-breadcrumbs _mt-20">
                  <li>
                    <p class="theme-breadcrumbs-item-title">
                      <a href="{{ url('/admin/index') }}">หน้าแรก </a>
                    </p>
                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title">
                      @switch(10)
                          @case(5)
                              <a href="#">ภาคตะวันออก</a>
                              @break

                          @case(4)
                              <a href="#">ภาคตะวันตก</a>
                              @break

                           @case(6)
                                  <a href="#">ภาคใต้</a>
                              @break

                           @case(1)
                                  <a href="#">ภาคเหนือ</a>
                           @break

                            @case(3)
                                  <a href="#">ภาคตะวันออกเฉียงเหนือ</a>
                            @break

                          @default
                              <a href="#">ภาคกลาง</a>
                      @endswitch

                    </p>

                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title">
                      <a href="{{ url('/') }}">กรุงเทพมหานคร </a>
                    </p>
                    <p class="theme-breadcrumbs-item-subtitle">2438 ร้านค้า</p>
                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title active">ชื่อร้านค้า</p>

                  </li>
                </ul>
              </div>


              <div class="theme-payment-page-sections-item">
                <div class=" theme-sidebar-section _mb-10 theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                    <div class="col-md-12 ">
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">Mazda CX-5</h5>
                      <div class="theme-search-results-item-car-location">
                        <i class="fa fa-home theme-search-results-item-car-location-icon"></i>
                        <div class="theme-search-results-item-car-location-body">
                          <p class="theme-search-results-item-car-location-title">Newark Liberty International Airport</p>
                          <p class="theme-search-results-item-car-location-subtitle">Shuttle to car</p>
                        </div>
                      </div>
                      <br /><br />
                      <p class="theme-search-results-item-car-location-title2">
                        🍉 Contact us: channel@hgmedia.vn <br />
                        🌿 Submit music: https://bit.ly/2VcIDxx <br />
                        ------------------------------------------------------------------ <br />
                        ✔️HG Media is created to promote and support new artists, (musicians/labels, composers, producers, photographers/filmmakers) who want to create a fan base. Send your song or video on HG Music and HG Club.<br />
                        If any producer, label, artist or photographer has an issue with any of the music or video uploads please contact us and we will remove your work immediately. Thank you!<br />
                        🔔 We strive to find the best and most enjoyable music for you guys! We hope to make your days more beautiful with the music we share ! Peace love and music.<br />
                        I'm also a music producer, I'm working on this project !<br />
                        🚫 If you have any problem with copyright issues, or question please do not report me, take your time to contact us via mail, and we will response within 48h<br />
                        💌 channel@hgmedia.vn 💌<br />
                        ✚ Please share this video in social sites (Facebook, Google +, Twitter.)<br />
                      </p>
                    </div>


                  </div>
                </div>
              </div>



              <div class="theme-payment-page-sections-item">
                <div class=" theme-sidebar-section _mb-10 theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                    <div class="col-md-12 ">
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">อัลบัมรูป</h5>
                      <div class=" _pb-0">

                          <div class="row  row-col-gap" data-gutter="10">
                            <div class="col-xs-4 ">
                              <div class="banner _h-40vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                <div class="banner-bg" style="background-image:url({{ url('assets/home/img/show_img.jpg') }});"></div>
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="{{ url('gallery_detail/1') }}"></a>
                                <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                                  <h5 class="banner-title">San Francisco</h5>
                                </div>
                              </div>
                            </div>
                            <div class="col-xs-4 ">
                              <div class="banner _h-40vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                <div class="banner-bg" style="background-image:url({{ url('assets/home/img/product_recomment1.jpg') }});"></div>
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="#"></a>
                                <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                                  <h5 class="banner-title">San Francisco</h5>
                                </div>
                              </div>


                            </div>
                            <div class="col-xs-4 ">
                              <div class="banner _h-40vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                <div class="banner-bg" style="background-image:url({{ url('assets/home/img/gw_product_resizeimage.jpg') }});"></div>
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="{{ url('gallery_detail/1') }}"></a>
                                <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                                  <h5 class="banner-title">San Francisco</h5>
                                </div>
                              </div>


                            </div>
                            <div class="col-xs-7 ">
                              <div class="banner _h-40vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                <div class="banner-bg" style="background-image:url({{ url('assets/home/img/home_img3.jpg') }});"></div>
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="{{ url('gallery_detail/1') }}"></a>
                                <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                                  <h5 class="banner-title">San Francisco</h5>
                                </div>
                              </div>


                            </div>
                            <div class="col-xs-5 ">
                              <div class="banner _h-40vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                <div class="banner-bg" style="background-image:url({{ url('assets/home/img/img5.jpg') }});"></div>
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="{{ url('gallery_detail/1') }}"></a>
                                <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                                  <h5 class="banner-title">San Francisco</h5>
                                </div>
                              </div>


                            </div>
                          </div>

                      </div>

                    </div>


                  </div>
                </div>
              </div>




              <div class="theme-payment-page-sections-item">
                <div class=" theme-sidebar-section _mb-10 theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                    <div class="col-md-12 ">
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">ดาวน์โหลดเอกสาร</h5>
                      <div class=" _pb-0">

                        <div class="theme-account-history">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="theme-account-history-type">
                    <i class="fa fa-file-excel-o theme-account-history-type-icon"></i>
                  </td>
                  <td>
                    <p class="theme-account-history-type-title">เอกสารประกอบการ</p>
                  </td>
                  <td>
                      <a href="#">Excel</a>
                  </td>

                  <td class="theme-account-history-tr-date">
                    <p class="theme-account-history-date">Sep 23, 2017 </p>
                  </td>
                  <td>
                    <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" href="{{ url('shop_detail/1') }}">ดาวน์โหลดไฟล์</a>
                  </td>
                </tr>
                <tr>
                  <td class="theme-account-history-type">
                    <i class="fa fa-file-word-o theme-account-history-type-icon"></i>
                  </td>

                  <td>
                    <p class="theme-account-history-type-title">เอกสารประกอบการ1</p>
                  </td>
                  <td>
                      <a href="#">Word</a>
                  </td>
                  <td class="theme-account-history-tr-date">
                    <p class="theme-account-history-date">Sep 23, 2017 </p>
                  </td>
                  <td>
                    <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" href="{{ url('shop_detail/1') }}">ดาวน์โหลดไฟล์</a>
                  </td>
                </tr>
                <tr>
                  <td class="theme-account-history-type">
                    <i class="fa fa-file-powerpoint-o theme-account-history-type-icon"></i>
                  </td>

                  <td>
                    <p class="theme-account-history-type-title">เอกสารประกอบการ1</p>
                  </td>
                  <td>
                      <a href="#">Powerpoint</a>
                  </td>
                  <td class="theme-account-history-tr-date">
                    <p class="theme-account-history-date">Sep 20, 2017 </p>
                  </td>
                  <td>
                    <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" href="{{ url('shop_detail/1') }}">ดาวน์โหลดไฟล์</a>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

                      </div>

                    </div>


                  </div>
                </div>
              </div>



          </div>
        </div>
      </div>
    </div>




@endsection

@section('scripts')


@stop('scripts')
