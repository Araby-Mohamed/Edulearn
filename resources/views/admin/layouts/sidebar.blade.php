
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start open {{ Request::is('admin') ? 'active' : '' }} ">
                            <a href="{{url('/admin')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Menu</h3>
                        </li>

                        @if(auth()->guard('admin')->user()->level != 3)
                            <li class="nav-item {{ Request::is('admin/admins*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Admin</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/admins')}}" class="nav-link ">
                                            <span class="title">All Admin</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/admins/create')}}" class="nav-link ">
                                            <span class="title">Add New Admin</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  {{ Request::is('admin/employee*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-users"></i>
                                    <span class="title">Employee</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/employee')}}" class="nav-link ">
                                            <span class="title">All Employee</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/employee/create')}}" class="nav-link ">
                                            <span class="title">Add New Employee</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item {{ Request::is('admin/student*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-graduation"></i>
                                    <span class="title">Student</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/student')}}" class="nav-link ">
                                            <span class="title">All Student</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/student/create')}}" class="nav-link ">
                                            <span class="title">Add New Student</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ Request::is('admin/professor*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-user-following"></i>
                                    <span class="title">Professor</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/professor')}}" class="nav-link ">
                                            <span class="title">All Professor</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/professor/create')}}" class="nav-link ">
                                            <span class="title">Add New Professor</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item {{ Request::is('admin/subject*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-notebook"></i>
                                    <span class="title">Subject</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/subject')}}" class="nav-link ">
                                            <span class="title">All Subject</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/subject/create')}}" class="nav-link ">
                                            <span class="title">Add New Subject</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ Request::is('admin/event*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-list"></i>
                                    <span class="title">Event</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/event')}}" class="nav-link ">
                                            <span class="title">All Event</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/event/create')}}" class="nav-link ">
                                            <span class="title">Add New Event</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ Request::is('admin/table*') ? 'active' : '' }} ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-grid"></i>
                                <span class="title">Lecture Table</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{url('admin/table')}}" class="nav-link ">
                                        <span class="title">All Lecture Table</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{url('admin/table/create')}}" class="nav-link ">
                                        <span class="title">Add New Lecture Table</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ Request::is('admin/question_bank*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-question"></i>
                                    <span class="title">Question Bank</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/question_bank')}}" class="nav-link ">
                                            <span class="title">All Question Bank</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item {{ Request::is('admin/exam*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-notebook"></i>
                                    <span class="title">Exam</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/exam')}}" class="nav-link ">
                                            <span class="title">All Exam</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @else
                            <li class="nav-item {{ Request::is('admin/student*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-graduation"></i>
                                    <span class="title">Student</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/student')}}" class="nav-link ">
                                            <span class="title">All Student</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/student/create')}}" class="nav-link ">
                                            <span class="title">Add New Student</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ Request::is('admin/professor*') ? 'active' : '' }} ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-user-following"></i>
                                    <span class="title">Professor</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/professor')}}" class="nav-link ">
                                            <span class="title">All Professor</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('admin/professor/create')}}" class="nav-link ">
                                            <span class="title">Add New Professor</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
