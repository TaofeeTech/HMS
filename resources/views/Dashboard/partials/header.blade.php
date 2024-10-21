@php
    $admin = Auth::guard('admin')->user();
    $customer = auth()->user();
@endphp
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        Dashboard
                    </div>
                </div>
                <div class="nav-item d-flex align-items-center">
                    <div class="input-group search-area">
                        <input type="text" class="form-control" placeholder="">
                        <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell-link " href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26.667" height="24" viewBox="0 0 26.667 24">
                          <g id="_014-mail" data-name="014-mail" transform="translate(0 -21.833)">
                            <path id="Path_1962" data-name="Path 1962" d="M26.373,26.526A6.667,6.667,0,0,0,20,21.833H6.667A6.667,6.667,0,0,0,.293,26.526,6.931,6.931,0,0,0,0,28.5V39.166a6.669,6.669,0,0,0,6.667,6.667H20a6.669,6.669,0,0,0,6.667-6.667V28.5A6.928,6.928,0,0,0,26.373,26.526ZM6.667,24.5H20a4.011,4.011,0,0,1,3.947,3.36L13.333,33.646,2.72,27.86A4.011,4.011,0,0,1,6.667,24.5ZM24,39.166a4.012,4.012,0,0,1-4,4H6.667a4.012,4.012,0,0,1-4-4V30.873L12.693,36.34a1.357,1.357,0,0,0,1.28,0L24,30.873Z" transform="translate(0 0)" fill="#135846"/>
                          </g>
                        </svg>
                            <span class="badge light text-white bg-primary rounded-circle">76</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link " href="javascript:void(0);" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.375" height="24" viewBox="0 0 19.375 24">
                                <g id="_006-notification" data-name="006-notification" transform="translate(-341.252 -61.547)">
                                  <path id="Path_1954" data-name="Path 1954" d="M349.741,65.233V62.747a1.2,1.2,0,1,1,2.4,0v2.486a8.4,8.4,0,0,1,7.2,8.314v4.517l.971,1.942a3,3,0,0,1-2.683,4.342h-5.488a1.2,1.2,0,1,1-2.4,0h-5.488a3,3,0,0,1-2.683-4.342l.971-1.942V73.547a8.4,8.4,0,0,1,7.2-8.314Zm1.2,2.314a6,6,0,0,0-6,6v4.8a1.208,1.208,0,0,1-.127.536l-1.1,2.195a.6.6,0,0,0,.538.869h13.375a.6.6,0,0,0,.536-.869l-1.1-2.195a1.206,1.206,0,0,1-.126-.536v-4.8a6,6,0,0,0-6-6Z" transform="translate(0 0)" fill="#135846" fill-rule="evenodd"/>
                                </g>
                              </svg>
                            <span class="badge light text-white bg-primary rounded-circle">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div id="DZ_W_TimeLine02" class="widget-timeline dlab-scroll style-1 ps ps--active-y p-3 height370">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>10 minutes ago</span>
                                        <h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                        <p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>30 minutes ago</span>
                                        <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>15 minutes ago</span>
                                        <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark">
                                    </div>
                                    <a class="timeline-panel text-muted" href="javascript:void(0);">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="{{ asset($customer->image ?? $admin->image)  }}" width="20" alt=""/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            @if ($customer)
                                <a href="{{ "customer" }}" class="dropdown-item ai-icon">
                                    <svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ms-2">Profile </span>
                                </a>
                            @else
                                <a href="{{ route('admin.profile') }}" class="dropdown-item ai-icon">
                                    <svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ms-2">Profile </span>
                                </a>
                            @endif
                            <a href="email-inbox.html" class="dropdown-item ai-icon">
                                <svg id="icon-inbox1" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span class="ms-2">Inbox </span>
                            </a>
                            <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon">
                                <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                <span class="ms-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
