<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" href="{{ route('dentist.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Dashboard
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" href="{{ route('pending') }}">
        <i class="c-sidebar-nav-icon cil-book"></i>Appointment History
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" href="{{ route('diagnosis.index') }}">
        <i class="c-sidebar-nav-icon cil-clipboard"></i>Diagnosis Aid Tool
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" href="{{ route('statement.index') }}">
        <i class="c-sidebar-nav-icon cil-playlist-add"></i>Generate Prescription <br>Statement
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" href="{{ route('dentist.home') }}">
        <i class="c-sidebar-nav-icon cil-notes"></i>Prescription History
    </a>
</li>

<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link xc-active" style="background: #c26a6a" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="c-sidebar-nav-icon cil-account-logout"></i>Logout
    </a>
</li>
