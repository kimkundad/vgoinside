@extends('layouts.template2')

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
                      <a href="{{ url('/') }}">หน้าแรก </a>
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
                    <p class="theme-breadcrumbs-item-title active">{{ $objs->shop_name }}</p>

                  </li>
                </ul>
              </div>


              <div class="theme-payment-page-sections-item">
                <div class=" theme-sidebar-section _mb-10 theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                    <div class="col-md-12 ">
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">ข้อมูลร้าน {{ $objs->shop_name }}</h5>

                      <br /><br />
                      <p class="theme-search-results-item-car-location-title2">
                        {!! $objs->description !!}
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

                            @if(isset($folder))
                              @foreach($folder as $u)
                            <div class="col-md-4 ">
                              <div class="banner _h-30vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                @if(isset($u->option->image))
                                <div class="banner-bg" style="background-image:url({{ url('img/folder_image/'.$u->option->image) }});"></div>
                                @else
                                <div class="banner-bg" style="background-image:url({{ url('img/folder_open.png') }});"></div>
                                @endif
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="{{ url('gallery_detail/'.$u->id) }}"></a>
                                <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                                  <h5 class="banner-title" style="font-size: 14px;">{{ $u->folder_name }}</h5>
                                </div>
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

                @if(isset($file))
                @foreach($file as $u)
                <tr>
                  <td class="theme-account-history-type">
                    @if($u->type_file == 'Excel')
                    <i class="fa fa-file-excel-o theme-account-history-type-icon"></i>
                    @elseif($u->type_file == 'Word')
                    <i class="fa fa-file-word-o theme-account-history-type-icon"></i>
                    @elseif($u->type_file == 'Powerpoint')
                    <i class="fa fa-file-powerpoint-o theme-account-history-type-icon"></i>
                    @else
                    <i class="fa fa-file-pdf-o theme-account-history-type-icon"></i>
                    @endif

                  </td>
                  <td>
                    <p class="theme-account-history-type-title">{{$u->file_name}}</p>
                  </td>
                  <td>
                      <a >{{$u->type_file}}</a>
                  </td>

                  <td class="theme-account-history-tr-date">
                    <p class="theme-account-history-date">{{$u->created_at}} </p>
                  </td>
                  <td>
                    <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" href="{{ url('api/get_file_doc/'.$u->id) }}">ดาวน์โหลดไฟล์</a>
                  </td>
                </tr>
                @endforeach
                @endif


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
