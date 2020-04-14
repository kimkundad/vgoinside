<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



    <title>   ตอบโจทย์การรวบรวข้อมูล แบ่งปันข้อมูล สำหรับในองค์กร | vgoinside.com </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="googlebot" content="ALL">

  <!--  <meta property="og:url" content="https://masterphotonetwork.com">
    <meta property="og:title" content=" มาสเตอร์  Master Photo Network">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://masterphotonetwork.com/assets/image/n7.JPG">
    <meta property="og:description" content="ผู้นำด้านการอัดรูปสี, Digital Offset Print (นามบัตร การ์ด โบร์ชัวร์ แผ่นพับ ใบปลิว ฯลฯ), กรอบ, อัลบั้ม, Photobook และ Photo Gift">
    <meta property="fb:admins" content="100002037238809">
    <meta property="fb:app_id" content="1063323960509612"> -->




    <link rel="icon" type="image/png" href="{{url('/img/icon_vigoinside.png')}}">



    @include('admin.layouts.inc-style')
    @yield('stylesheet')

  </head>
  <body>

    @include('admin.layouts.inc-header')

    @yield('content')


    @include('admin.layouts.inc-footer')

    <!-- JavaScripts -->
    @include('admin.layouts.inc-script')
    @yield('scripts')


        </body>
</html>
