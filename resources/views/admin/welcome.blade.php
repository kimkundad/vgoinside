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
</style>

@stop('stylesheet')

@section('content')


<div class="theme-page-section theme-page-section-gray theme-page-section-lg theme-page-section_pad">
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
                      <i class="fa fa-user-o"></i>ไปหน้าบ้าน
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
            <h1 class="theme-account-page-title">ภูมิภาคของประเทศไทย</h1>
            <div class="row row-col-gap" data-gutter="20">

              <div class="col-md-4 ">
                <div class="theme-account-traveler">
                  <p class="theme-account-traveler-name">ภาคกลาง</p>
                  <ul class="theme-sidebar-section-features-list">
                    @foreach($objs1 as $u)
                      <li><a href="{{ url('admin/list_shop/'.$u->PROVINCE_ID) }}">{{$u->PROVINCE_NAME}}</a></li>
                    @endforeach
                    </ul>
                    <br /><br />
                    <p class="theme-account-traveler-name">	ภาคตะวันออก</p>
                    <ul class="theme-sidebar-section-features-list">
                    @foreach($objs6 as $u)
                      <li><a href="{{ url('admin/list_shop/'.$u->PROVINCE_ID) }}">{{$u->PROVINCE_NAME}}</a></li>
                    @endforeach
                    </ul>
                </div>
              </div>

              <div class="col-md-4 ">
                <div class="theme-account-traveler">
                  <p class="theme-account-traveler-name">ภาคตะวันออกเฉียงเหนือ</p>
                  <ul class="theme-sidebar-section-features-list">
                    @foreach($objs2 as $u)
                      <li><a href="{{ url('admin/list_shop/'.$u->PROVINCE_ID) }}">{{$u->PROVINCE_NAME}}</a></li>
                    @endforeach
                    </ul>
                    <br /><br />

                    <p class="theme-account-traveler-name">ภาคตะวันตก</p>
                    <ul class="theme-sidebar-section-features-list">
                    @foreach($objs5 as $u)
                      <li><a href="{{ url('admin/list_shop/'.$u->PROVINCE_ID) }}">{{$u->PROVINCE_NAME}}</a></li>
                    @endforeach
                    </ul>
                </div>
              </div>

              <div class="col-md-4 ">
                <div class="theme-account-traveler">
                  <p class="theme-account-traveler-name">ภาคเหนือ</p>
                  <ul class="theme-sidebar-section-features-list">
                  @foreach($objs3 as $u)
                    <li><a href="{{ url('admin/list_shop/'.$u->PROVINCE_ID) }}">{{$u->PROVINCE_NAME}}</a></li>
                  @endforeach
                  </ul>
                </div>
              </div>

              <div class="col-md-4 ">
                <div class="theme-account-traveler">
                  <p class="theme-account-traveler-name">ภาคใต้</p>
                  <ul class="theme-sidebar-section-features-list">
                  @foreach($objs4 as $u)
                    <li><a href="{{ url('admin/list_shop/'.$u->PROVINCE_ID) }}">{{$u->PROVINCE_NAME}}</a></li>
                  @endforeach
                  </ul>
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
