<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
        </li>
        @can('message-list')
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.show-message')}}" class="nav-link">Contact Us</a>
        </li>
        @endcan
    </ul>

    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
{{--  Language--}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-globe"></i>
                <span class="badge badge-info navbar-badge">{{ strtoupper(app()->getLocale()) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Change Language</span>
                <div class="dropdown-divider"></div>
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}" class="dropdown-item">
                    <i class="flag-icon flag-icon-us mr-2"></i>
                    {{ $properties['native'] }}
                </a>
                    <div class="dropdown-divider"></div>
                @endforeach
            </div>


        </li>

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                @if($contacts_message_count>0)

                <span class="badge badge-danger navbar-badge">{{$contacts_message_count}}</span>

                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @forelse($contacts_message  as $message)
                <a href="{{route('admin.show-message')}}" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{asset('dashboard/dist/img/profile.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{$message->email}}
                            </h3>
                            <p class="text-sm">
                                {{ \Illuminate\Support\Str::limit($message->message, 30) }}
                            </p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$message->created_at}}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                @empty
                    <p class="text-sm text-gray-500">
                       You currently have no unread messages.
                    </p>
                    <div class="dropdown-divider"></div>
                @endforelse
                <a href="{{route('admin.show-message')}}" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <li class="nav-item">
            <form action="{{route('admin.logout')}}" method="POST" class="nav-link" >
                @csrf
                <button type="submit" class="btn-danger" title="logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
