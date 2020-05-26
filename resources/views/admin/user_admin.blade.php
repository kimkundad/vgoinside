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
                  @if(Auth::user()->is_admin == 1)
                  <li>
                    <a href="{{url('admin/user_admin')}}">
                      <i class="fa fa-cube"></i>ผู้ใช้งานทั้งหมด
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
                    <p class="theme-breadcrumbs-item-title active">ผู้ใช้งานทั้งหมด</p>
                  </li>
                </ul>
              </div>








              <div class="theme-account-preferences-item">

                  <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">ข้อมูลของผู้ใช้งานทั้งหมด</h5>

                  <div class=" _pb-0">

                    <div class="theme-account-history">



                      <div class="table-responsive ">
                      <table class="table" style="font-size: 11px;">
                        <thead>
                          <tr>
                            <th>Brand</th>
                            <th>ชื่อผู้ใช้งาน</th>
                            <th>อีเมล</th>
                            <th>เบอร์ติดต่อ</th>
                            <th>วันที่สร้าง</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                          @if($objs)
                            @foreach($objs as $u)

                            <tr>
                              <td>
                                @if(isset($u->bimage))
                                <img class="theme-account-avatar-img img-thumbnail" src="{{ url('img/brand/'.$u->bimage) }}" style="border-radius: 0%;     width: 50px;">
                                @endif
                              </td>
                              <td>
                                <img class="theme-account-avatar-img" src="{{ url('img/avatar/'.$u->avatar) }}" alt="kim" title="kim"> {{ $u->name }}
                              </td>
                              <td>
                                {{ $u->email }}
                              </td>
                              <td>
                                {{ $u->phone }}
                              </td>

                              <td>
                                {{ $u->created_at }}
                              </td>
                              <td>
                                <a href="{{ url('admin/user_edit/'.$u->id_u) }}" style="margin-right:10px;"  >
                                  <i class="fa fa-cog"></i>
                                </a>
                                <a href="{{ url('api/del_user/'.$u->id_u) }}" onclick="return confirm('Are you sure?')" >
                                  <i class="fa fa-trash-o"></i>
                                </a>
                              </td>
                            </tr>

                            @endforeach
                          @endif

                        </tbody>
                      </table>
                      </div>
                      <div class="pagination"> {{ $objs->links() }} </div>

                    </div>

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

@if ($message = Session::get('add_success'))

    swal("ระบบทำการเพิ่มรายชื่อให้เรียบร้อยแล้ว");

@endif

@if ($message = Session::get('add_success_file'))

    swal("ระบบทำการเพิ่มไฟล์ข้อมูลให้เรียบร้อยแล้ว");

@endif


@if ($message = Session::get('del_user'))

    swal("ระบบทำการลบข้อมูลให้เรียบร้อยแล้ว");

@endif



</script>


@stop('scripts')
