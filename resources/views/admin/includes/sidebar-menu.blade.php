
<ul class="sidebar-menu">
    <li class="header">Settings</li>
    <li{!!HTML::activeLink('/admin/location') !!}><a href="/admin/location"><i class="fa fa-map"></i> <span>Locations</span></a></li>
    <li{!!HTML::activeLink('/admin/category') !!}><a href="/admin/category"><i class="fa fa-info"></i> <span>Categories</span></a></li>
    <li class="header">User Management</li>
    <li{!!HTML::activeLink('/admin/user') !!}><a href="/admin/user"><i class="fa fa-user"></i> <span>Users</span></a></li>
    <li{!!HTML::activeLink('/admin/passport') !!}><a href="/admin/passport"><i class="fa fa-user"></i> <span>Passport approve</span></a></li>
    <li class="header">Payments</li>
    <li{!!HTML::activeLink('/admin/payment') !!}><a href="/admin/payment"><i class="fa fa-money"></i> <span>Last Payments</span></a></li>
    <li{!!HTML::activeLink('/admin/withdraw') !!}><a href="/admin/withdraw"><i class="fa fa-credit-card"></i> <span>Withdraw line</span></a></li>
</ul>