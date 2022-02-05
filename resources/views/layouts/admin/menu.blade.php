<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" href="{{ route('admin.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Dashboard
    </a>
</li>
<!-- <li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="{{ route('pages.page') }}">
        <i class="c-sidebar-nav-icon cil-user"></i>Manage Profile
    </a>
</li> -->

<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
        href="#">
        <i class="c-sidebar-nav-icon cil-calendar"></i>
         Appointment Settings</a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link xc-active" href="{{ route('pages.workload.appointmentSetting') }}">
                <i class="c-sidebar-nav-icon cil-chart-pie"></i>Manage Workload
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link xc-active" href="{{ route('pages.schedule.index') }}">
                <i class="c-sidebar-nav-icon cil-people"></i>Manage Dentist
            </a>
        </li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
        href="#">
        <i class="c-sidebar-nav-icon cil-clipboard"></i>
             Diagnosis Aid Settings</a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link xc-active" href="{{ route('symptoms.index') }}">
                <i class="c-sidebar-nav-icon cil-healing"></i>Manage Symptoms, <br>Medical Conditions, <br>Treatments/ Prescriptions
            </a>
        </li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle"
        href="#">
        <i class="c-sidebar-nav-icon cil-address-book"></i>
         Patients' Record <br>Management</a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link xc-active" href="{{ route('pages.medicalrecord.index') }}">
                <i class="c-sidebar-nav-icon cil-medical-cross"></i>Manage Medical Records
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link xc-active" href="{{ route('admin.home') }}">
                <i class="c-sidebar-nav-icon cil-user"></i>View Patients' Profile
            </a>
        </li>
    </ul>
</li>

<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" style="background: #c26a6a" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="c-sidebar-nav-icon cil-account-logout"></i>Logout
    </a>
</li>
