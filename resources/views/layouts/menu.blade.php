<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Dashboard
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('pages.page') }}">
        <i class="c-sidebar-nav-icon cil-user"></i>Manage Profile
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('symptoms.index') }}">
        <i class="c-sidebar-nav-icon cil-healing"></i>Manage Symptoms,<br> Medical Conditions, Treatments
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('meeting') }}">
        <i class="c-sidebar-nav-icon cil-calendar"></i>Book Meeting
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('pending') }}">
        <i class="c-sidebar-nav-icon cil-calendar-check"></i>Update Meeting Status
    </a>
</li>


<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
        href="#">
        <svg class="c-sidebar-nav-icon">
            <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-puzzle"></use>
        </svg> Settings</a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link c-active" href="{{ route('records') }}">
                <i class="c-sidebar-nav-icon cil-medical-cross"></i>Manage Medical Record
            </a>
            <a class="c-sidebar-nav-link c-active" href="{{ route('pages.workload.appointmentSetting') }}">
                <i class="c-sidebar-nav-icon cil-chart-pie"></i>Manage Workload Settings edit from master
            </a>
        </li>
    </ul>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="c-sidebar-nav-icon cil-account-logout"></i>Logout
    </a>
</li>
