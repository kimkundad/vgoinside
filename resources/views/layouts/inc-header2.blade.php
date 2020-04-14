<nav class="navbar navbar-default navbar-inverse navbar-theme" id="main-nav">
  <div class="container">
    <div class="navbar-inner nav">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-target="#navbar-main" data-toggle="collapse" type="button" area-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}" >
          <img src="{{url('img/vigoinside.png')}}" alt="vgoinside website" title="vgoinside website"/>
        </a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-main" >
        <ul class="nav navbar-nav">


          <li class=" dropdown">
            <a href="#contact" >ติดต่อเรา</a>
          </li>
          <li class=" dropdown">
            <a href="{{url('index')}}">ใช้งานระบบ</a>
          </li>


        </ul>


        <ul class="nav navbar-nav navbar-right">

          <li class=" dropdown">
            <a href="{{url('index')}}">ใช้งานระบบ</a>
          </li>


          <li class="navbar-nav-item-user dropdown">
            @if (Auth::guest())
            <a  href="{{url('login')}}" >
              <i class="fa fa-user-circle-o navbar-nav-item-user-icon"></i>เข้าสู่ระบบ
            </a>
            @else

            <a lass="dropdown-toggle" href="{{url('/')}}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle-o navbar-nav-item-user-icon"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{url('index')}}">ใช้งานระบบ</a>
              </li>
              <li>
                <a href="{{url('logout')}}">ออกจากระบบ</a>
              </li>
            </ul>
            @endif
          </li>


        </ul>
      </div>
    </div>
  </div>
</nav>
