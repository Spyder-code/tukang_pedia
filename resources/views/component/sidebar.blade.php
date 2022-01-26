<li class="sidebar-item pt-2">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}"
        aria-expanded="false">
        <i class="far fa-clock" aria-hidden="true"></i>
        <span class="hide-menu">Dashboard</span>
    </a>
</li>
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('profile') }}"
        aria-expanded="false">
        <i class="fa fa-user" aria-hidden="true"></i>
        <span class="hide-menu">Profile</span>
    </a>
</li>
@if (Auth::id()==1)
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('category.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Category Management</span>
    </a>
</li>
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('mitra.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Mitra Management</span>
    </a>
</li>
@endif
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('product.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Product Management</span>
    </a>
</li>
{{-- <li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('transaction.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Transaction Management</span>
    </a>
</li> --}}
{{-- @if (Auth::id()==1)
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('review.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Review Management</span>
    </a>
</li>
@endif --}}
{{-- <li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('cart.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Cart Management</span>
    </a>
</li> --}}
<li class="sidebar-item">
    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('transactiondetail.index') }}"
        aria-expanded="false">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="hide-menu">Transaction Management</span>
    </a>
</li>
