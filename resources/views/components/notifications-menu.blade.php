<li class="nav-item dropdown dropdown-notification mr-25">
    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
        <i class="ficon" data-feather="bell"></i>
        @if($unread)
            <span class="badge badge-pill badge-danger badge-up unread">{{ $unread }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
        <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                <div class="badge badge-pill badge-light-primary"><span id="unread" class="unread">{{ $unread }}</span> New</div>
            </div>
        </li>
        <li class="scrollable-container media-list">
            <div class="notifications">
                @foreach($notifications as $notification)
                    <a class="d-flex" href="{{ route('notifications.show',$notification->id) }}">
                        <div class="media d-flex align-items-start">
                            <div class="media-left">
                                <div class="avatar">
                                    <img src="{{ asset('dashboard_files/app-assets/images/portrait/small/avatar-s-15.jpg') }}" alt="avatar" width="32" height="32">
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="media-heading">
                                    @if($notification->unread())<b style="color: red">*</b>@endif
                                    {{$notification->data['title']}}
                                     <span class="font-weight-bolder">
                                    Congratulation Sam 🎉
                                     </span>
                                     winner!
                                </p>
                                <small class="notification-text">
                                    {{ $notification->data['body'] }}
                                    <span class="float-right text-muted text-sm">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="media d-flex align-items-center">
                <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                <div class="custom-control custom-control-primary custom-switch">
                    <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                    <label class="custom-control-label" for="systemNotification"></label>
                </div>
            </div><a class="d-flex" href="javascript:void(0)">
                <div class="media d-flex align-items-start">
                    <div class="media-left">
                        <div class="avatar bg-light-danger">
                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to hight CPU usage</small>
                    </div>
                </div>
            </a><a class="d-flex" href="javascript:void(0)">
                <div class="media d-flex align-items-start">
                    <div class="media-left">
                        <div class="avatar bg-light-success">
                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                    </div>
                </div>
            </a><a class="d-flex" href="javascript:void(0)">
                <div class="media d-flex align-items-start">
                    <div class="media-left">
                        <div class="avatar bg-light-warning">
                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                        </div>
                    </div>
                    <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                    </div>
                </div>
            </a>
        </li>
        <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read all notifications</a></li>
    </ul>
</li>
