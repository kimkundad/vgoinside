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
                    <p class="theme-breadcrumbs-item-title">
                    <a href="{{ url('/admin/brand') }}">จัดการ brand </a>
                    </p>
                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title active">สร้าง brand</p>
                  </li>
                </ul>
              </div>








              <div class="theme-search-results">



                  <div class="row row-col-gap" data-gutter="20">

                    <div class="col-md-12 ">

                      <div class="theme-account-preferences-item">
                        <div class="collapse in" id="ChangeHomeAirportChange" aria-expanded="true" style="">
                          <form id="contactForm">
                            {{ csrf_field() }}
                              <div class="" >
                                <p class="theme-account-preferences-item-change-description">ตั้งชื่อ brand (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                                <div class="form-group theme-account-preferences-item-change-form">
                                  <input class="form-control" type="text" name="bname" id="bname" value="{{ $objs->bname }}">
                                  <input class="form-control" type="hidden" name="b_id" id="b_id" value="{{ $objs->id }}">
                                </div>
                                <br />

                                <p class="theme-account-preferences-item-change-description">รูปภาพหลัก brand </p>
                                <div class="form-group theme-account-preferences-item-change-form">
                                  <img src="{{ url('img/brand/'.$objs->bimage) }}" style="width:350px" />
                                </div>

                                <br />

                                <p class="theme-account-preferences-item-change-description">รูปภาพหลักของ brand รูปต้องเป็น type jpg png เท่านั้น (<span class="text-danger">*จำเป็นต้องใส่ </span>)</p>
                                <div class="form-group theme-account-preferences-item-change-form">
                                  <input class="" type="file" name="file" id="file">
                                </div>

                                <br />

                                <div class="theme-account-preferences-item-change-actions">
                                  <a class="btn btn-sm btn-primary" id="btnSendData">บันทึกข้อมูล</a>
                                </div>
                              </div>
                              </form>
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

  var bname = document.getElementById("bname").value;

  console.log(formData);
  if(bname == ''){

  swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

  }else{


    $.ajax({
      url: "{{url('/api/edit_my_brand')}}",
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
                window.location.replace("{{url('admin/edit_brand/')}}/"+data.data.data_id);
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
