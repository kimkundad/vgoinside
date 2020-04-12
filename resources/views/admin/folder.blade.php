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
                    <a href="{{url('/')}}">
                      <i class="fa fa-home"></i>ไปหน้าบ้าน
                    </a>
                  </li>
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
                      @switch($objs2->GEO_ID)
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
                    <p class="theme-breadcrumbs-item-title "><a href="{{ url('admin/list_shop/'.$objs2->PROVINCE_ID) }}">{{$objs2->PROVINCE_NAME}}</a></p>
                    <p class="theme-breadcrumbs-item-subtitle">{{ number_format($count)}} ร้านค้า</p>
                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title active">
                      <a href="{{ url('/admin/edit_shop/'.$objs->id) }}"> {{ $objs->shop_name }} </a>
                    </p>
                  </li>
                </ul>
              </div>


              <div class="theme-search-results">

                <h1 class="theme-account-page-title">อัลบัม {{ $folder->folder_name }}</h1>

                <div class="theme-account-preferences" >

                  <div class="theme-account-preferences-item">
                    <div class="collapse in" id="ChangeHomeAirportChange" aria-expanded="true" style="">
                      <form action="{{url('api/edit_folder_image/')}}" name="edit_folder_image" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="" >
                            <p class="theme-account-preferences-item-change-description">ตั้งชื่ออัลบัม (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="form-control" type="text" name="folder_name" id="folder_name" value="{{ $folder->folder_name }}">
                              <input class="form-control" type="hidden" name="shop_id" value="{{ $objs->id }}">
                              <input class="form-control" type="hidden" name="folder_id" value="{{ $folder->id }}">
                            </div>
                            <br />



                            <div class="theme-account-preferences-item-change-actions">
                              <button type="submit" class="btn btn-sm btn-primary" id="btnSendData">บันทึกข้อมูล</button>
                              <a href="{{ url('api/del_my_folder/'.$folder->id.'/'.$objs->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" >ลบอัลบัมนี้</a>
                            </div>
                          </div>
                          </form>
                        </div>
                  </div>
                </div>
              </div>

              <br />







              <div class="theme-account-preferences-item">
                  <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">อัลบัมรูป</h5>

                  <div class=" _pb-0">

                    <div class="theme-account-history">
                      <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" data-toggle="modal" data-target="#myModal_file" href="#">+ เพิ่มรูปภาพ</a>

                      <!-- Modal -->
                        <div id="myModal_file" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">เพิ่ม อัลบัมรูป</h4>
                              </div>
                              <form action="{{url('api/add_all_image/')}}" name="add_all_image" method="post" enctype="multipart/form-data">
                              <div class="modal-body">

                                  {{ csrf_field() }}
                                    <div class="" >
                                      <p class="theme-account-preferences-item-change-description">เลือกรูปได้หลายรูป รูปต้องเป็น type jpg png เท่านั้น (<span class="text-danger">*จำเป็นต้องใส่ </span>)</p>
                                      <div class="form-group theme-account-preferences-item-change-form">
                                        <input class="" type="file" name="file[]" multiple="multiple">
                                        <input class="form-control" type="hidden" name="folder_id" value="{{ $folder->id }}">
                                      </div>

                                    </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" >บันทึกข้อมูล</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                              </div>
                              </form>
                            </div>

                          </div>
                        </div>

                      <div class="table-responsive ">
                      <table class="table">
                        <thead>
                          <tr>
                            <th></th>

                            <th>User</th>
                            <th>Date</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($file))
                          @foreach($file as $u)
                          <tr>

                            <td>
                              <div class="banner banner-sqr banner- magnific-gallery">
                                <div class="banner-bg" style="background-image:url({{ url('img/folder_image/'.$u->image) }});"></div>
                                <a class="banner-link" href="{{ url('img/folder_image/'.$u->image) }}"></a>
                              </div>
                            </td>
                            <td>
                                <a >{{$u->name}}</a>
                            </td>
                            <td class="theme-account-history-tr-date">
                              <p class="theme-account-history-date">{{$u->create}} </p>
                            </td>
                            <td>
                              <a href="{{ url('api/del_image_folder/'.$u->id_q.'/'.$folder->id) }}" onclick="return confirm('Are you sure?')" title="ลบรูปภาพทิ้ง">
                                <i class="fa fa-trash-o"></i>
                              </a>
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
