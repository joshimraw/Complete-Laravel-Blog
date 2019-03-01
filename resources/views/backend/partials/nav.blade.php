 <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>

<!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">SMALL ADMIN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">{{ auth::user()->unreadNotifications->count() }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                        
                            <li class="body">
                                <ul class="menu">
                                   
                             {{--       {!! $user = App\User::find(1) !!} --}}

                                   @foreach(auth::user()->unreadNotifications as $notification)
                                     
                                 
                                    <li>
                                        <a href="{{route('markasread')}}">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">label</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>{{ $notification->data['note'] }}</h4>
                                                <p>{{ $notification->data['tagname']. ' By '. $notification->data['author'] }}</p>
                                                <p>
                                                    <i class="material-icons">access_time</i> 
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </a>
                                    </li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>