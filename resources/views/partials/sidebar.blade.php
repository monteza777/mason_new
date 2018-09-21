@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i>
                    <span class="title ">@lang('quickadmin.qa_home')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#usersnav">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" id='usersnav'>
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.user-actions.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>
            @endcan

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>@lang('quickadmin.users.calendar')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('events.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.users.event')</span>
                        </a>
                    </li>
                    
                   
                    <li>
                        <a href="{{url('admin/calendar')}}">
                            <i class="fa fa-calendar"></i>
                            <span>@lang('quickadmin.users.calendar')</span>
                        </a>
                    </li>
                </ul>
            </li>

{{-- Lodges List --}}

            @can('user_management_access')
            <li class="treeview">
                <a href="#lodges">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.lodges.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" id='lodges'>
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.district_lodges.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('quickadmin.district_lodges.list')</span>
                        </a>
                    </li>
                    @endcan
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.lodges.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('quickadmin.lodges.list')</span>
                        </a>
                    </li>
                    @endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.lodge_users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.lodge_users.list')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>
            @endcan
{{--End of Lodges list  --}}
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-list"></i>
                    <span>@lang('quickadmin.financial_reports.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.financial_reports.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.financial_reports.list')</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            {{-- Change Password & Log-out --}}
            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

