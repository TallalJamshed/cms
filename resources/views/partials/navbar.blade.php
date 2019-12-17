 <!-- PAGE CONTAINER-->
 
 <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop header-mobile-view">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap ">
                            <a  title="Home Page" class="navbar-brand" id="navbar-brand" href="{{ route('Home') }}"><span class="btn" style="font-size:1.8rem"><i class="fa fa-home"></i></span>CMS</a>
                            
                            {{-- <a href="{{route("Home")}}" class="navbar-button">| Main Page |</a> --}}
                        <div class="header-button ml-auto" >
                            <div class="noti-wrap top-user-data">
                                
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                        
                                    
                                    <div class="image">
                                    {{-- {{Auth::user()->file_path}} --}}
                                    
                                        <img src="{{asset('/').'user_pic_uploads/'.Auth::user()->file_path}}" alt="avatar" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#" style="color:white">{{ Auth::user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    
                                                    <img src="{{public_path().'/'.'user_pic_uploads/'.Auth::user()->file_path}}" alt="avatar" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ Auth::user()->name }}</a>
                                                </h5>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{route('All Associates')}}"><i class="fas fa-plus-square"></i>Add Associates</a>
                                            </div>
                                            {{-- <div class="account-dropdown__item">
                                                <a href="{{route('Legal Notice')}}"><i class="fa fa-file-text"></i>Generate Legal Notice</a>
                                            </div> --}}
                                        </div>
                                        <div class="account-dropdown__footer">
                    
                                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                           <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                                        </a>
                    
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
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
        </header>
        <!-- HEADER DESKTOP-->