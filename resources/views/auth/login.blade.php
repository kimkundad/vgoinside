
@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

<style>
.theme-hero-area-mask-strong {
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=66)";
    filter: alpha(opacity=66);
}
.theme-page-header-title {
    font-size: 30px;
    margin-top: 0;
    letter-spacing: 1px;
    font-weight: 300;
}
.theme-about-us-section-body > p {
    font-size: 14px;
    line-height: 1.6em;
    margin-bottom: 20px;
}
ul, li {
    margin: 0px;
    list-style-type: none;
}
.p-t-2 {
    padding-top: 2px;
}
.list-01 li {
    text-indent: -11px;
    padding-left: 22px;
}
.p-b-6 {
    padding-bottom: 6px;
}
.list-01 li::before {
    color: #233785;
}
.list-01 li::before {
    content: "\f058";
    font-family: FontAwesome;
    font-size: 15px;
    color: #233785;
    display: inline-block;
    margin-right: 5px;
}
.s-txt2 {
    font-family: Roboto-Regular;
    font-size: 15px;
    line-height: 1.618;
    color: #555555;
}
</style>

@stop('stylesheet')

@section('content')


<div class="theme-hero-area ">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg" style="background-image:url(./img/photo-1586167339358-fff4375b02fb.jfif);"></div>
        <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
      </div>
      <div class="theme-hero-area-body " style="padding: 120px 0px 150px 0px">
        <div class="theme-page-section _pt-100 theme-page-section-xl">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="theme-login theme-login-white">
          <div class="theme-login-header">
            <h1 class="theme-login-title">เข้าสู่ระบบ</h1>
            <p class="theme-login-subtitle">เข้าสู่ระบบ ด้วยบัญชีของคุณ</p>
          </div>
          <div class="theme-login-box">
            <div class="theme-login-box-inner">

              <form class="theme-login-form" id="my_form_login" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group theme-login-form-group">
                  <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="Email Address"/>
                  @if ($errors->has('email'))
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @endif
                </div>
                <div class="form-group theme-login-form-group">
                  <input class="form-control" type="password" name="password" placeholder="Password"/>
                  @if ($errors->has('password'))
                    <span class="help-block">
                       <strong>{{ $message }}</strong>
                    </span>
                @endif
                  <p class="help-block">
                    <a href="{{ url('/password/reset') }}">ลืมรหัสผ่าน?</a>
                  </p>
                </div>
                <div class="form-group">
                  <div class="theme-login-checkbox">
                    <label class="icheck-label">
                      <input class="icheck" type="checkbox"/>
                      <span class="icheck-title">ให้ฉันอยู่ในระบบ</span>
                    </label>
                  </div>
                </div>
                <a type="submit" class="btn btn-uc btn-dark btn-block btn-lg" href="javascript:{}" onclick="document.getElementById('my_form_login').submit();">เข้าสุ่ระบบ</a>
              </form>



            </div>
            <div class="theme-login-box-alt">
              <p>
              </p>
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
