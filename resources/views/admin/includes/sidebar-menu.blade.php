
<ul class="sidebar-menu">
    <li class="header">Settings</li>
    <li{{ HTML::activeLink('/admin/locations') }}><a href="/admin/locations"><i class="fa fa-map"></i> <span>Locations</span></a></li>
    <li{{ HTML::activeLink('/admin/categories') }}><a href="/admin/categories"><i class="fa fa-info"></i> <span>Categories</span></a></li>
    <li class="header">User Management</li>
    <li{{ HTML::activeLink('/admin/users') }}><a href="/admin/users"><i class="fa fa-user"></i> <span>Users</span></a></li>
    <li class="header">Payments</li>
    <li{{ HTML::activeLink('/admin/payments') }}><a href="/admin/payments"><i class="fa fa-money"></i> Last Payments</a></li>
    <li{{ HTML::activeLink('/admin/withdraw') }}><a href="/admin/withdraw"><i class="fa fa-credit-card"></i> Withdraw line</a></li>
</ul>