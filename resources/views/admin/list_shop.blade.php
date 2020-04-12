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
.theme-account-card {
    height: 165px;
}
.theme-search-results-item-preview {
    padding: 23px 20px;
    position: relative;
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
                      @switch($objs->GEO_ID)
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
                    <p class="theme-breadcrumbs-item-title active">{{$objs->PROVINCE_NAME}}</p>
                    <p class="theme-breadcrumbs-item-subtitle">{{ number_format($count)}} ร้านค้า</p>
                  </li>
                </ul>
              </div>


              <div class="theme-search-results">

                <h1 class="theme-account-page-title">ร้านค้าทั้งหมด</h1>

                <div class="row row-col-gap" data-gutter="20">

                  <div class="col-md-6 ">
                    <div class="theme-account-card theme-account-card-new">
                      <a class="theme-account-card-mask-link" href="{{ url('admin/create_shop/'.$objs->PROVINCE_ID) }}"></a>
                      <p class="theme-account-card-new-title">+ เพิ่มร้านค้าใหม่ </p>
                    </div>
                  </div>

                  @if($count > 0)



                  @if(isset($shop))
                  @foreach($shop as $u)
                  <div class="col-md-6 ">

                    <div class="theme-search-results-item _mb-10 theme-search-results-item-">
                      <div class="theme-search-results-item-preview">
                        <a class="theme-search-results-item-mask-link" href="{{ url('admin/edit_shop/'.$u->id) }}"></a>
                        <div class="row" data-gutter="20">
                          <div class="col-md-4 ">
                            <div class="theme-search-results-item-img-wrap">
                              <img class="theme-search-results-item-img" src="{{ url('img/shop/'.$u->shop_image) }}" alt="{{ $u->shop_name }}t" title="{{ $u->shop_name }}"/>
                            </div>
                          </div>
                          <div class="col-md-8 ">
                            <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">{{ $u->shop_name }}</h5>
                            <div class="theme-search-results-item-car-location">
                              <div class="theme-search-results-item-price">
                                <p class="theme-search-results-item-price-tag">{{ number_format($u->view) }}</p>
                                <p class="theme-search-results-item-price-sign">ยอดเข้าดู</p>
                              </div>
                              <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" href="{{ url('admin/edit_shop/'.$u->id) }}">ดูข้อมูลเพิ่ม</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                   </div>
                   @endforeach
                   @endif





                      @else



                      @endif


                </div>

              </div>

          </div>
        </div>
      </div>
    </div>




@endsection

@section('scripts')


@stop('scripts')