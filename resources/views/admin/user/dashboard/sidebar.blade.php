<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.dashboard.index') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('subscription-plans.index') }}">
                    Subscription Plans
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.analytics.index') }}">
                    Analytics
                </a>
            </li>
        </ul>
    </div>
</nav>
