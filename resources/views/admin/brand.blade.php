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
    height: 165px;
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
                  @if(Auth::user()->is_admin == 1)
                  <li>
                    <a href="{{url('admin/brand')}}">
                      <i class="fa fa-cube"></i>จัดการ brand
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
                    <p class="theme-breadcrumbs-item-title active">จัดการ brand</p>
                  </li>
                </ul>
              </div>








              <div class="theme-search-results">



                  <div class="row row-col-gap" data-gutter="20">

                    <div class="col-md-4 ">
                      <div class="theme-account-card theme-account-card-new">
                        <a class="theme-account-card-mask-link" href="{{ url('admin/create_brand/') }}"></a>
                        <p class="theme-account-card-new-title">+ เพิ่ม brand ใหม่ </p>
                      </div>
                    </div>

                    @if(isset($objs))
                    @foreach($objs as $u)

                     <div class="col-md-4 ">
                        <div class="banner _br-4 banner-sqr banner-animate banner-animate-mask-in">
                          <div class="banner-bg" style="background-image:url({{ url('img/brand/'.$u->bimage) }});"></div>
                          <div class="banner-mask"></div>
                          <a class="banner-link" href="{{ url('admin/edit_brand/'.$u->id) }}"></a>
                          <div class="banner-caption _bg-w _p-20 _w-a banner-caption-bottom banner-caption-dark">
                            <h5 class="banner-title">{{ $u->bname }}</h5>
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




@endsection

@section('scripts')


<script type="text/javascript">

$(document).ready(function() {
  $('.summernote').summernote({
    placeholder: 'ใส่ข้อมูล รายละเอียดร้านค้า',
    height: 450,
    tabsize: 2,
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['fontsize', ['fontsize']],
    ['table', ['table']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['insert', ['link', 'video']],
    ['height', ['height']]
  ]
});


});


@if ($message = Session::get('edit_success_img'))

    swal("ระบบทำการแกแ้ไขอัลบัมให้เรียบร้อยแล้ว");

@endif

@if ($message = Session::get('add_success_file'))

    swal("ระบบทำการเพิ่มไฟล์ข้อมูลให้เรียบร้อยแล้ว");

@endif


@if ($message = Session::get('del_success_folder_image'))

    swal("ระบบทำการลบไฟล์ข้อมูลให้เรียบร้อยแล้ว");

@endif



</script>


@stop('scripts')
