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
                    <p class="theme-breadcrumbs-item-title ">
                      <a href="{{ url('/admin/user') }}">จัดการรายชื่อ</a>
                      </p>
                  </li>
                  <li>
                    <p class="theme-breadcrumbs-item-title active">เพิ่มรายชื่อ</p>
                  </li>
                </ul>
              </div>


              <div class="theme-search-results">

                <h1 class="theme-account-page-title">เพิ่มรายชื่อ</h1>

                <div class="theme-account-preferences" >

                  <div class="theme-account-preferences-item">
                    <div class="collapse in" id="ChangeHomeAirportChange" aria-expanded="true" style="">
                      <form id="contactForm">
                        {{ csrf_field() }}
                          <div class="" >
                            <p class="theme-account-preferences-item-change-description">ชื่อผู้ใช้งาน (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="form-control" type="text" name="name" id="name" placeholder="ชื่อผู้ใช้งาน">
                            </div>
                            <br />

                            <p class="theme-account-preferences-item-change-description">อีเมล (<span class="text-danger">*จำเป็นต้องใส่</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="form-control" type="email" name="email" id="email" placeholder="อีเมล">
                            </div>
                            <br />

                            <p class="theme-account-preferences-item-change-description">password (<span class="text-danger">*password ต้องมีอย่างน้อย 8 ตัวอักษรขึ้นไป</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="form-control" type="password" name="password" id="password">
                            </div>
                            <br />

                            <p class="theme-account-preferences-item-change-description">Confirm Password (<span class="text-danger">*ยืนยัน Password อีกครั้ง</span>)</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                            </div>
                            <br />

                            <p class="theme-account-preferences-item-change-description">ตำแหน่งของผู้ใช้งาน</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <select class="form-control" name="position" id="position" >
                                  <option value="customer">A Customer User</option>
                                  <option value="employee">A Employee User</option>
                                  <option value="manager">A Manager User</option>
                                </select>
                            </div>
                            <br />

                            @if(Auth::user()->is_admin == 1)
                            <p class="theme-account-preferences-item-change-description">เลือก brand</p>
                            <div class="form-group theme-account-preferences-item-change-form">
                              <select class="form-control" name="brand" id="brand" >
                                  <option value="">-- เลือก brand --</option>
                                  @if(isset($objs))
                                  @foreach($objs as $u)
                                  <option value="{{$u->id}}">{{$u->bname}}</option>
                                  @endforeach
                                  @endif
                                </select>
                            </div>
                            <br />

                            @endif

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


  var password = document.getElementById("password").value;
  var password_confirmation = document.getElementById("password_confirmation").value;
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;

  var n_password = password.length;
  var n_password_confirmation = password_confirmation.length;

  if(n_password == 8 || n_password_confirmation == 8){

  if (validateEmail(email)) {


  console.log(formData);
  if(password == '' || password_confirmation == '' || name == '' || email == ''){

  swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

  }else{

    if(password == password_confirmation){


    $.ajax({
      url: "{{url('/api/post_new_user')}}",
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
                window.location.replace("{{url('admin/user/')}}/");
          }, 3000);

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal("อีเมลนี้มีในระบบอยู่แล้ว กรุณาเปลี่ยนอีเมลใหม่");

          }
      },
      error: function () {

      }
  });

}else{

  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 500);

  swal("password ไม่ตรงกัน");

}


  }

}else{
  /////////////////////////////
  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 500);

  swal("email ของท่านไม่ถูกต้อง");
}

}else{
  /////////////////////////////
  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 500);

  swal("password ของท่านต้องมีอย่างน้อย 8 ตัว");
}

  setTimeout(function(){
      $.LoadingOverlay("hide");
  }, 2500);

});


});


function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

</script>


@stop('scripts')
