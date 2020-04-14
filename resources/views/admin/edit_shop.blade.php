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
                    <p class="theme-breadcrumbs-item-title active"><a href="{{ url('admin/list_shop/'.$objs2->PROVINCE_ID) }}">{{$objs2->PROVINCE_NAME}}</a></p>
                    <p class="theme-breadcrumbs-item-subtitle">{{ number_format($count)}} ร้านค้า</p>
                  </li>
                </ul>
              </div>


              <div class="theme-search-results">

                <h1 class="theme-account-page-title">ข้อมูลร้าน {{ $objs->shop_name }}
                @if(Auth::user()->hasRole('manager') == true)
                <a href="{{ url('api/del_my_shop/'.$objs->id.'/'.$objs2->PROVINCE_ID) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger " style="float:right" >ลบ</a>
                @endif
              </h1>

                <div class="theme-account-preferences" >

                  <div class="theme-account-preferences-item">
                    <div class="collapse in" id="ChangeHomeAirportChange" aria-expanded="true" style="">
                      <form id="contactForm">
                        {{ csrf_field() }}
                          <div class="" >
                            <p class="theme-account-preferences-item-change-description">ตั้งชื่อร้านค้า (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="form-control" type="text" name="shop_name" id="shop_name" value="{{ $objs->shop_name }}">
                              <input class="form-control" type="hidden" name="prov_id" value="{{ $objs2->PROVINCE_ID }}">
                              <input class="form-control" type="hidden" name="shop_id" value="{{ $objs->id }}">
                            </div>
                            <br />

                            <p class="theme-account-preferences-item-change-description">รูปภาพหลักของร้าน </p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <img src="{{ url('img/shop/'.$objs->shop_image) }}" style="width:350px" />
                            </div>

                            <br />

                            <p class="theme-account-preferences-item-change-description">รูปภาพหลักของร้าน รูปต้องเป็น type jpg png เท่านั้น (<span class="text-danger">*จำเป็นต้องใส่ </span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="" type="file" name="file" id="file">
                            </div>

                            <br />
                            <p class="theme-account-preferences-item-change-description">รายละเอียด (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <textarea class="summernote form-control" name="description" rows="5" id="textareaAutosize" >{{ $objs->description }}</textarea>
                            </div>

                            <div class="theme-account-preferences-item-change-actions">
                              <a class="btn btn-sm btn-primary" id="btnSendData">บันทึกข้อมูล</a>
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


                  <div class="row" data-gutter="20">
                    <div class="col-md-12 ">

                      <div class=" _pb-0">

                          <div class="row  row-col-gap" data-gutter="10">

                            <div class="col-md-3 ">
                              <div class="theme-account-card theme-account-card-new _h-30vh">
                                <a class="theme-account-card-mask-link" href="#" data-toggle="modal" data-target="#myModal"></a>
                                <p class="theme-account-card-new-title">+ เพิ่ม </p>
                              </div>
                            </div>

                          <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">เพิ่ม อัลบัมรูป</h4>
                                  </div>
                                  <form action="{{url('api/post_folder_image/')}}" method="post" enctype="multipart/form-data">
                                  <div class="modal-body">

                                      {{ csrf_field() }}
                                        <div class="" >
                                          <p class="theme-account-preferences-item-change-description">ตั้งชื่ออัลบัม (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                                          <div class="form-group theme-account-preferences-item-change-form">
                                            <input class="form-control" type="text" name="folder_name" id="folder_name">
                                            <input class="form-control" type="hidden" name="shop_id" value="{{ $objs->id }}">
                                          </div>
                                          <br />

                                          <p class="theme-account-preferences-item-change-description">เลือกรูปได้หลายรูป รูปต้องเป็น type jpg png เท่านั้น (<span class="text-danger">*จำเป็นต้องใส่ </span>)</p>
                                          <div class="form-group theme-account-preferences-item-change-form">
                                            <input class="" type="file" name="file[]" multiple="multiple">
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

                            @if(isset($folder))
                              @foreach($folder as $u)

                            <div class="col-md-3 ">
                              <div class="banner _h-30vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-mask-in banner-animate-zoom-in banner-animate-slow">
                                @if(isset($u->option->image))
                                <div class="banner-bg" style="background-image:url({{ url('img/folder_image/'.$u->option->image) }});"></div>
                                @else
                                <div class="banner-bg" style="background-image:url({{ url('img/folder_open.png') }});"></div>
                                @endif
                                <div class="banner-mask"></div>
                                <a class="banner-link" href="{{ url('admin/folder/'.$u->id) }}"></a>
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




              <div class="theme-account-preferences-item">
                  <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">ดาวน์โหลดเอกสาร</h5>

                  <div class=" _pb-0">

                    <div class="theme-account-history">
                      <a class="btn btn-primary-inverse  theme-search-results-item-price-btn" data-toggle="modal" data-target="#myModal_file" href="#">+ เพิ่มเอกสาร</a>

                      <!-- Modal -->
                        <div id="myModal_file" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">เพิ่ม อัลบัมรูป</h4>
                              </div>
                              <form action="{{url('api/post_file_download/')}}" method="post" enctype="multipart/form-data">
                              <div class="modal-body">

                                  {{ csrf_field() }}
                                    <div class="" >
                                      <p class="theme-account-preferences-item-change-description">ตั้งชื่อไฟล์ (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                                      <div class="form-group theme-account-preferences-item-change-form">
                                        <input class="form-control" type="text" name="file_name" id="file_name" required>
                                        <input class="form-control" type="hidden" name="shop_id" value="{{ $objs->id }}">
                                      </div>
                                      <br />

                                      <p class="theme-account-preferences-item-change-description">เลือกไฟล์เอกสาร (<span class="text-danger">*จำเป็นต้องใส่ </span>)</p>
                                      <div class="form-group theme-account-preferences-item-change-form">
                                        <input class="" type="file" name="file" >
                                      </div>

                                      <p class="theme-account-preferences-item-change-description">เลือกชนิดไฟล์เอกสาร </p>
                                      <div class="form-group theme-account-preferences-item-change-form">
                                        <select class="form-control" name="typefile">
                                          <option value="Excel">Excel</option>
                                          <option value="Word">Word</option>
                                          <option value="Powerpoint">Powerpoint</option>
                                          <option value="PDF">PDF</option>
                                        </select>
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
                            <th></th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Date</th>

                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($file))
                          @foreach($file as $u)
                          <tr>
                            <td>
                              <a href="{{ url('api/get_file_doc/'.$u->id) }}" style="margin-right:10px;"  title="ดาวน์โหลดเอกสาร">
                                <i class="fa fa-cloud-download"></i>
                              </a>
                              <a href="{{ url('api/del_file_doc/'.$u->id.'/'.$objs->id) }}" onclick="return confirm('Are you sure?')" title="ลบเอกสารทิ้ง">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>
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


@if ($message = Session::get('add_success_img'))

    swal("ระบบทำการสร้างอัลบัมให้เรียบร้อยแล้ว");

@endif

@if ($message = Session::get('add_success_file'))

    swal("ระบบทำการเพิ่มไฟล์ข้อมูลให้เรียบร้อยแล้ว");

@endif


@if ($message = Session::get('del_success_file'))

    swal("ระบบทำการลบไฟล์ข้อมูลให้เรียบร้อยแล้ว");

@endif

@if ($message = Session::get('del_success_folder_my'))

    swal("ระบบทำการลบข้อมูลให้เรียบร้อยแล้ว");

@endif

$(document).on('click','#btnSendData',function (event) {
  event.preventDefault();


  $.LoadingOverlay("show", {
  background  : "rgba(255, 255, 255, 0.4)",
  image       : "",
  fontawesome : "fa fa-cog fa-spin"
});


  var form = $('#contactForm')[0];
  var formData = new FormData(form);
  var files = $('#file')[0].files[0];

  formData.append('file',files);

  var shop_name = document.getElementById("shop_name").value;
  var textareaAutosize = document.getElementById("textareaAutosize").value;

  console.log(formData);
  if(shop_name == '' || textareaAutosize == ''){

  swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

  }else{


    $.ajax({
      url: "{{url('/api/edit_my_shop')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: formData,
      processData: false,
      contentType: false,
      cache:false,
      type: 'POST',
      success: function (data) {

      //  console.log(data.data.status)
          if(data.data.status == 200){


            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 0);

            swal("สำเร็จ!", "ระบบได้ทำการเพิ่มข้อมูลสำเร็จ", "success");

          setTimeout(function(){
                window.location.replace("{{url('admin/edit_shop/')}}/"+data.data.data_id);
          }, 3000);

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

          }
      },
      error: function () {

      }
  });


  }

  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 2500);

});


</script>


@stop('scripts')
