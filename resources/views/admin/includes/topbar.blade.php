

<div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div>
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name"><span class="hidden-md-down">{{ Auth::user()->name }}</span></span>
            <img src="@if(isset(Auth::user()->image)){{ asset('backend/profile/'. Auth::user()->image) }}
                      @else{{ asset('backend/img/img3.jpg') }} @endif " class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href="{{ route('admin.password.change') }}"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="navicon-right">
        <a id="btnRightMenu" href="" class="pos-relative">
          <i class="icon ion-ios-bell-outline"></i>

          <span class="square-8 bg-danger"></span>

        </a>
      </div>
    </div>
</div>


