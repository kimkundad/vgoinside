



@extends('layouts.template2')

@section('title')

@stop



@section('stylesheet')

<style>
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
.theme-page-section-xl {
    padding: 150px 0;
}
.help-block {
    display: block;
    margin-top: 5px;
    margin-bottom: 10px;
    color: #F44336;
}
</style>

@stop('stylesheet')

@section('content')


<div class="theme-hero-area ">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg" style="background-image:url( {{ url('img/photo-1586167339358-fff4375b02fb.jfif') }} );"></div>
        <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
      </div>
      <div class="theme-hero-area-body " style="padding: 100px 0px 130px 0px">
        <div class="theme-page-section _pt-100 theme-page-section-xl">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">

        <div class="theme-login theme-login-white">
          <div class="theme-login-header">
            <h1 class="theme-login-title">Password Reset</h1>
            <p class="theme-login-subtitle">Restore your forgotten password</p>
          </div>
          <div class="theme-login-box">
            <div class="theme-login-box-inner">
              <p class="theme-login-pwd-reset-text">Enter the email associated with your account in the field below and we'll email you a link to reset your password.</p>

              @if (session('status'))
              <br />
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                  <br />
              @endif

              <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
              {{ csrf_field() }}
              <div class="form-group theme-login-form-group">

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email Adress" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <button type="submit" class="btn btn-uc btn-dark btn-block btn-lg" >Reset Password</button>
              <a class="theme-login-pwd-reset-back" href="#">Remember the password?</a>

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
</div>



@endsection

@section('scripts')


@stop('scripts')
