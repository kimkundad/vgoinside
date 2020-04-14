@extends('admin.layouts.template2')




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
    height: 40vh !important;
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
                    <a href="{{url('/index')}}">
                      <i class="fa fa-home"></i>ไปหน้าบ้าน
                    </a>
                  </li>
                  @if(Auth::user()->hasRole('manager') == true)
                  <li>
                    <a href="{{url('admin/user')}}">
                      <i class="fa fa-user-o"></i>จัดการรายชื่อ
                    </a>
                  </li>
                  @endif
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

                  <div class="col-md-12 ">
                    <form class="form-horizontal" action="{{url('admin/search_shop')}}" method="GET" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-10">
                        <div class="theme-search-area-section first theme-search-area-section-curved theme-search-area-section-fade-white">
                                <div class="theme-search-area-section-inner">
                                  <i class="theme-search-area-section-icon fa fa-search"></i>
                                  <input class="theme-search-area-section-input " name="search" value="{{$search}}" type="text" placeholder="ค้นหาร้านค้า">
                                  <input  name="prov_id" value="{{ $id }}" type="hidden" >
                                </div>
                              </div>
                      </div>
                      <div class="col-md-2">

                            <button type="submit" class="theme-search-area-submit _mt-0 theme-search-area-submit-no-border theme-search-area-submit-curved theme-search-area-submit-primary">ค้นหา</button>
                        </div>
                    </div>
                    </form>
                  </div>

                  <div class="col-md-4 ">
                    <div class="theme-account-card theme-account-card-new">
                      <a class="theme-account-card-mask-link" href="{{ url('admin/create_shop/'.$objs->PROVINCE_ID) }}"></a>
                      <p class="theme-account-card-new-title">+ เพิ่มร้านค้าใหม่ </p>
                    </div>
                  </div>

                  @if($count > 0)



                  @if(isset($shop))
                  @foreach($shop as $u)



                   <div class="col-md-4 ">
                      <div class="banner _h-40vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                        <div class="banner-bg" style="background-image:url({{ url('img/shop/'.$u->shop_image) }});"></div>
                        <div class="banner-mask"></div>
                        <a class="banner-link" href="{{ url('admin/edit_shop/'.$u->id) }}"></a>
                        <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                          <h5 class="banner-title">{{ $u->shop_name }}</h5>
                          <p class="banner-subtitle _mt-5 _fw-n">{{ number_format($u->view) }} ยอดเข้าดู</p>
                        </div>
                      </div>
                    </div>
                   @endforeach
                   @endif





                      @else



                      @endif


                </div>
                <div class="pagination"> {{ $shop->links() }} </div>
              </div>

          </div>
        </div>
      </div>
    </div>




@endsection

@section('scripts')


@stop('scripts')
