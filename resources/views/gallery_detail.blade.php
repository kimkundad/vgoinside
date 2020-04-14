@extends('layouts.template2')



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
                  @if(Auth::user()->hasRole('employee') == true || Auth::user()->hasRole('manager') == true)
                  <li>
                    <a href="{{url('admin/index')}}">
                      <i class="fa fa-user-o"></i>จัดการหลังบ้าน
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
                      <a href="{{ url('/index') }}">หน้าแรก </a>
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
                    <p class="theme-breadcrumbs-item-title "><a href="{{ url('/list_shop/'.$objs2->PROVINCE_ID) }}">{{$objs2->PROVINCE_NAME}}</a></p>
                    <p class="theme-breadcrumbs-item-subtitle">{{ number_format($count)}} ร้านค้า</p>
                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title">
                      <a href="{{ url('/shop_detail/'.$objs->id) }}"> {{ $objs->shop_name }} </a>
                    </p>

                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title active">{{ $folder->folder_name }}</p>

                  </li>
                </ul>
              </div>




              <br />


              <div class="theme-payment-page-sections-item">
                <div class=" theme-sidebar-section _mb-10 theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                    <div class="col-md-12 ">
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">รูปในอัลบัม {{ $folder->folder_name }}</h5>
                      <div class=" _pb-0">

                          <div class="row magnific-gallery row-col-gap" data-gutter="10">

                            @if(isset($file))
                            @foreach($file as $u)

                            <div class="col-xs-4 ">
                              <div class="banner banner-sqr banner-">
                                <div class="banner-bg" style="background-image:url({{ url('img/folder_image/'.$u->image) }});"></div>
                                <a class="banner-link" href="{{ url('img/folder_image/'.$u->image) }}"></a>
                              </div>
                            </div>


                            @endforeach
                            @endif





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
