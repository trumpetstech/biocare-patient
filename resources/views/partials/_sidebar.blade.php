<div class="card border sidebar  d-print-none">
    <div class="p-4 text-center profile">
        <img style="width: 80px;height:80px;border-radius:100%;" src="{{ patient()->avatar_url }}" alt="">
        <div class="mt-2">
            <span class="d-block font-weight-bold mb-0">{{ patient()->name }}</span>
            <span class="d-block"><i class="fe-mail"></i> {{ substr(patient()->email, 0, 20) }}</span>
            <span><i class="fe-map-pin"></i> {{ substr(patient()->city, 0, 20) }}</span>
        </div>
    </div>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a href="/covid" class="nav-link {{ isActive('covid*') }}"><i class="fe-minimize mr-2"></i> COVID Package</a>
        </li>
        {{-- <li class="nav-item">
            <a href="/appointments" class="nav-link {{ isActive('appointments*') }}"><i class="fe-calendar mr-2"></i> Doctor Appointments</a>
        </li> --}}
        <li class="nav-item">
            <a href="/consultations" class="nav-link {{ isActive('consultations*') }}"><i class="fe-list mr-2"></i> Prescriptions</a>
        </li>
        {{-- <li class="nav-item">
            <a href="/lab-appointments" class="nav-link {{ isActive('lab-appointments*') }}"><i class="fe-edit-2 mr-2"></i> Lab Appointments</a>
        </li>
        <li class="nav-item">
            <a href="/orders" class="nav-link" {{ isActive('orders*') }}><i class="fe-grid mr-2"></i> My Orders</a>
        </li> --}}
        <li class="nav-item">
            <a href="/shared-videos" class="nav-link {{ isActive('shared-videos*') }}"><i class="fe-video mr-2"></i> Shared Videos</a>
        </li>
        {{-- <li class="nav-item">
            <a href="/covid" class="nav-link {{ isActive('covid*') }}"><i class="fe-minimize mr-2"></i> COVID Package</a>
        </li> --}}
        <li class="nav-item">
            <a href="/reports" class="nav-link {{ isActive('reports*') }}"><i class="fe-file-text mr-2"></i> Medical Reports</a>
        </li>
        <li class="nav-item">
            <a href="/profile" class="nav-link {{ isActive('profile*') }}"><i class="fe-user mr-2"></i> My Profile</a>
        </li>
        {{-- <li class="nav-item">
            <a href="/settings/members" class="nav-link {{ isActive('settings*') }}"><i class="fe-settings mr-2"></i> Manage Members</a>
        </li> --}}
    </ul>
</div>
