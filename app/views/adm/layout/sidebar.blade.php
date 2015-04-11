<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            {{ HTML::image("assets/images/default_avatar.png", "User Image", ["class" => "img-circle", "style" => "background: #FFFFFF;"]) }}
        </div>
        <div class="pull-left info">
            <p>Hello, {{ $_account->name_first }}</p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <!-- search form -->
    {{ Form::open(array("url" => URL::route("adm.search"), "method" => "GET", "class" => "sidebar-form")) }}
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
            <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
    </div>
    {{ Form::close() }}
    <!-- /.search form -->

    <ul class="sidebar-menu">
        @if($_account->hasChildPermission("adm/dashboard"))
            <li {{ (\Request::is('adm/dashboard*') ? ' class="active"' : '') }}>
                <a href="{{ URL::route("adm.dashboard") }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
        @endif
        <!--</li>
        <li>
            <a href="pages/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="badge pull-right bg-yellow">12</small>
                <small class="badge pull-right bg-red">SOON</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-table"></i> <span>vData</span>
                <i class="fa fa-angle-left pull-right"></i>
                <small class="badge pull-right bg-red">SOON</small>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Airline Database</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Aircraft Database</a></li>
                <li><a href="{{ URL::to('/adm/navdata/airport') }}"><i class="fa fa-angle-double-right"></i> Airport Database</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> ATC Database</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="ion ion-android-microphone"></i> <span>ATC Bookings</span>
                <small class="badge pull-right bg-blue">1721</small>
                <small class="badge pull-right bg-red">SOON</small>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ion ion-plane"></i> <span>Pilot Bookings</span>
                <small class="badge pull-right bg-green">3,456</small>
                <small class="badge pull-right bg-red">SOON</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bar-chart-o"></i>
                <span>Statistics</span>
                <i class="fa fa-angle-left pull-right"></i>
                <small class="badge pull-right bg-red">SOON</small>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-angle-double-right"></i> API Calls</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> Pilot Bookings</a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i> ATC Bookings</a></li>
            </ul>
        </li>-->
        @if($_account->hasChildPermission("adm/mship"))
            <li class="treeview {{ (\Request::is('adm/mship*') ? 'active' : '') }}">
                <a href="#">
                    <i class="ion ion-person-stalker"></i> <span>Members</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($_account->hasChildPermission("adm/mship/account"))
                        <li {{ (\Request::is('adm/mship/account*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.account.index") }}"><i class="fa fa-angle-double-right"></i> Accounts List</a>
                        </li>
                    @endif
                    @if($_account->hasChildPermission("adm/mship/role"))
                        <li {{ (\Request::is('adm/mship/role*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.role.index") }}"><i class="fa fa-angle-double-right"></i> Roles List</a>
                        </li>
                    @endif
                    @if($_account->hasChildPermission("adm/mship/permission"))
                        <li {{ (\Request::is('adm/mship/permission*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.permission.index") }}"><i class="fa fa-angle-double-right"></i> Permissions List</a>
                        </li>
                    @endif
                    @if($_account->hasChildPermission("adm/mshipx"))
                        <li {{ (\Request::is('adm/mship/qualification*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.account.index") }}"><i class="fa fa-angle-double-right"></i> Roles List*</a>
                        </li>
                    @endif
                    @if($_account->hasChildPermission("adm/mshipx"))
                        <li {{ (\Request::is('adm/mship/qualification*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.account.index") }}"><i class="fa fa-angle-double-right"></i> Qualification Settings</a>
                        </li>
                    @endif
                    @if($_account->hasChildPermission("adm/mshipx"))
                        <li {{ (\Request::is('adm/mship/note*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.account.index") }}"><i class="fa fa-angle-double-right"></i> Note Settings</a>
                        </li>
                    @endif
                    @if($_account->hasChildPermission("adm/mshipx"))
                        <li {{ (\Request::is('adm/mship/security*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.mship.account.index") }}"><i class="fa fa-angle-double-right"></i> Security Settings</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if($_account->hasChildPermission("adm/site"))
            <li class="treeview {{ (\Request::is('adm/site*') ? 'active' : '') }}">
                <a href="#">
                    <i class="ion ion-gear-b"></i> <span>Site</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if($_account->hasChildPermission("adm/site/content/page*"))
                        <li {{ (\Request::is('adm/site/content/page*') ? ' class="active"' : '') }}>
                            <a href="{{ URL::route("adm.site.content.page.index") }}"><i class="fa fa-angle-double-right"></i> Pages</a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if($_account->hasChildPermission("adm/system"))
            <li class="treeview {{ (\Request::is('adm/system*') ? 'active' : '') }}">
                <a href="#">
                    <i class="ion ion-gear-b"></i> <span>System</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ URL::route("adm.sys.timeline") }}">
                            <i class="fa fa-list"></i> <span>Timeline</span>
                        </a>
                    </li>
                    <li class="treeview {{ (\Request::is('adm/system/postmaster*') ? 'active' : '') }}">
                        <a href="#">
                            <i class="ion ion-email"></i> <span>Postmaster</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li {{ (\Request::is('adm/system/postmaster/queue*') ? ' class="active"' : '') }}>
                                <a href="{{ URL::route("adm.sys.postmaster.queue.index") }}"><i class="fa fa-bars"></i> Postmaster Queue</a>
                            </li>
                            <li {{ (\Request::is('adm/system/postmaster/template*') ? ' class="active"' : '') }}>
                                <a href="{{ URL::route("adm.sys.postmaster.template.index") }}"><i class="ion ion-email"></i> Postmaster Templates</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</section>
<!-- /.sidebar -->