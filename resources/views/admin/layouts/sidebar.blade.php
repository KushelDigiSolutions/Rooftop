<style type="text/css">
    .nav .menu ul li.active .sub-menu {
    display: block !important;
}
</style>
<div class="sidebar">
    <div class="menu-btn"><i class="bi bi-list"></i></div>
    <div class="head">
        <div class="user-img">
            <img src="{{ url('images/rooftop_logo.png') }}" alt="">
        </div>
    </div>
    <div class="nav">
        <div class="menu w-100">
            <ul class="p-0">
                @if (Auth::user()->getRoleNames()[0] == 'Super Admin')
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('super.admin.dashboard') }}">
                            <i class="bi bi-house"></i><span class="text">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="{{ request()->is('user_list') ? 'active' : '' }}">
                        <a href="/user_list">
                            <i class="bi bi-people"></i><span class="text">Users</span>
                        </a>
                    </li> --}}

                    {{-- <li class="{{ request()->is('franchise_approval') ? 'active' : '' }}">
                        <a href="{{ route('franchise.temp.index') }}">
                            <i class="bi bi-building-add"></i><span class="text">Franchise</span>
                        </a>
                    </li> --}}

                    
                    <li class="{{ request()->routeIs('leads.list.index') ? 'active' : '' }}">
                        <a href="{{ route('leads.list.index') }}">
                            <i class="bi bi-journal"></i><span class="text">Leads</span>
                        </a>
                    </li>
                    
                    <li class="{{ request()->is('customer_list') ? 'active' : '' }}">
                        <a href="{{ route('customer.list.index') }}">
                            <i class="bi bi-people"></i><span class="text">Customers</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('products') ? 'active' : '' }}">
                        <a href="/products">
                            <i class="bi bi-box2"></i><span class="text">Products</span>
                        </a>
                    </li>
                    {{-- <li class="{{ request()->is('querybooked') ? 'active' : '' }}">
                        <a href="{{ route('querybooked.list') }}">
                            <i class="bi bi-journal"></i><span class="text">Query Booked</span>
                        </a>
                    </li> --}}
                    <li class="{{ request()->is('bids') ? 'active' : '' }}">
                        <a href="{{ route('quotations.list') }}">
                            <i class="bi bi-tools"></i><span class="text">Customer Bids</span>
                        </a>
                    </li>
                    <li class="{{ request()->is(['sub_contractor','create/sub_contractor']) ? 'active' : '' }}">
                        <a href="{{route('sub_contractor')}}">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Sub Contractor</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#?">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Jobs</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#?">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Appointments</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#?">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Quick Book</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('zipcodes*') || request()->is('product-types*') || request()->is('suppliers*') || request()->is('supplier-collections*') || request()->is('supplierCollectionDesigns*') || request()->is('compositions*') || request()->is('types*') || request()->is('usages*') || request()->is('design-types*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="bi bi-database"></i><span class="text">Masters</span><i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            {{-- <li class="{{ request()->is('zipcodes') ? 'active' : '' }}">
                                <a href="{{ route('zipcodes.index') }}"><span class="text">ZIP Codes</span></a>
                            </li> --}}
                            <li class="{{ request()->is('product-types') ? 'active' : '' }}">
                                <a href="{{ route('product-types.index') }}"><span class="text">Product Type</span></a>
                            </li>
                            {{-- <li class="{{ request()->is('suppliers') ? 'active' : '' }}">
                                <a href="{{ route('suppliers.index') }}"><span class="text">Supplier Name</span></a>
                            </li> --}}
                            {{-- <li class="{{ request()->is('supplier-collections') ? 'active' : '' }}">
                                <a href="{{ route('supplier-collections.index') }}"><span class="text">Supplier Collection</span></a>
                            </li> --}}
                            {{-- <li class="{{ request()->is('supplierCollectionDesigns') ? 'active' : '' }}">
                                <a href="{{ route('supplierCollectionDesigns.index') }}"><span class="text">Supplier Design</span></a>
                            </li> --}}
                            {{-- <li class="{{ request()->is('compositions') ? 'active' : '' }}">
                                <a href="{{ route('compositions.index') }}"><span class="text">Composition</span></a>
                            </li> --}}
                            {{-- <li class="{{ request()->is('types') ? 'active' : '' }}">
                                <a href="{{ route('types.index') }}"><span class="text">Type</span></a>
                            </li> --}}
                            {{-- <li class="{{ request()->is('usages') ? 'active' : '' }}">
                                <a href="{{ route('usages.index') }}"><span class="text">Usage</span></a>
                            </li> --}}
                            {{-- <li class="{{ request()->is('design-types') ? 'active' : '' }}">
                                <a href="{{ route('design-types.index') }}"><span class="text">Design Type</span></a>
                            </li> --}}
                        </ul>
                    </li>
                    {{-- <li class="{{ request()->is('orders') ? 'active' : '' }}">
                        <a href="{{route('order.list')}}">
                            <i class="bi bi-truck"></i><span class="text">Orders</span>
                        </a>
                    </li> --}}
                    {{-- <li class="{{ Route::is('reports.franchiseWiseSales') || Route::is('reports.cityWiseSales') || Route::is('reports.customerDatabase') || Route::is('reports.orderReports') ? 'active' : '' }}"><a href="#"><i class="bi bi-database"></i><span class="text">Reports</span><i class="arrow ph-bold ph-caret-down"></i></a>
                        <ul class="sub-menu">
                            <li class="{{ Route::is('reports.franchiseWiseSales') ? 'active' : '' }}"><a href="{{ route('reports.franchiseWiseSales') }}"><span class="text">franchise Wise Sales</span></a>
                            </li>
                            <li class="{{ Route::is('reports.cityWiseSales') ? 'active' : '' }}"><a href="{{ route('reports.cityWiseSales') }}"><span class="text">City Wise Sales</span></a>
                            </li>
                            <li class="{{ Route::is('reports.customerDatabase') ? 'active' : '' }}"><a href="{{ route('reports.customerDatabase') }}"><span class="text">Customer Database</span></a>
                            </li>
                            <li class="{{ Route::is('reports.orderReports') ? 'active' : '' }}"><a href="{{ route('reports.orderReports') }}"><span class="text">Order Reports</span></a>
                            </li>
                        </ul>
                    </li> --}}

                @endif
                @if (Auth::user()->getRoleNames()[0] == 'Admin 2')
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('super.admin.dashboard') }}"><i class="bi bi-house"></i><span class="text">Dashboard</span></a></li>
                    <li class="{{ request()->is('franchise_approval') ? 'active' : '' }}"><a href="{{ route('franchise.temp.index') }}"><i class="bi bi-building-add"></i><span class="text">Franchise</span></a></li>
                    <li class="{{ request()->is('products') ? 'active' : '' }}"><a href="/products"><i class="bi bi-box2"></i><span class="text">Products</span></a></li>
                    <li class="{{ request()->is('leads.list.index') ? 'active' : '' }}"><a href="{{ route('leads.list.index') }}"><i class="bi bi-journal"></i></i><span class="text">Appointments</span></a></li>
                    <li class="{{ request()->is('quotations') ? 'active' : '' }}">
                        <a href="{{ route('quotations.list') }}">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Quotations</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('zipcodes*') || request()->is('product-types*') || request()->is('suppliers*') || request()->is('supplier-collections*') || request()->is('supplierCollectionDesigns*') || request()->is('compositions*') || request()->is('types*') || request()->is('usages*') || request()->is('design-types*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="bi bi-database"></i><span class="text">Masters</span><i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="{{ request()->is('zipcodes') ? 'active' : '' }}">
                                <a href="{{ route('zipcodes.index') }}"><span class="text">ZIP Codes</span></a>
                            </li>
                            <li class="{{ request()->is('product-types') ? 'active' : '' }}">
                                <a href="{{ route('product-types.index') }}"><span class="text">Product Type</span></a>
                            </li>
                            <li class="{{ request()->is('suppliers') ? 'active' : '' }}">
                                <a href="{{ route('suppliers.index') }}"><span class="text">Supplier Name</span></a>
                            </li>
                            <li class="{{ request()->is('supplier-collections') ? 'active' : '' }}">
                                <a href="{{ route('supplier-collections.index') }}"><span class="text">Supplier Collection</span></a>
                            </li>
                            <li class="{{ request()->is('supplierCollectionDesigns') ? 'active' : '' }}">
                                <a href="{{ route('supplierCollectionDesigns.index') }}"><span class="text">Supplier Design</span></a>
                            </li>
                            <li class="{{ request()->is('compositions') ? 'active' : '' }}">
                                <a href="{{ route('compositions.index') }}"><span class="text">Composition</span></a>
                            </li>
                            <li class="{{ request()->is('types') ? 'active' : '' }}">
                                <a href="{{ route('types.index') }}"><span class="text">Type</span></a>
                            </li>
                            <li class="{{ request()->is('usages') ? 'active' : '' }}">
                                <a href="{{ route('usages.index') }}"><span class="text">Usage</span></a>
                            </li>
                            <li class="{{ request()->is('design-types') ? 'active' : '' }}">
                                <a href="{{ route('design-types.index') }}"><span class="text">Design Type</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('orders') ? 'active' : '' }}">
                        <a href="{{route('order.list')}}">
                            <i class="bi bi-truck"></i><span class="text">Orders</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getRoleNames()[0] == 'Franchise')
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('super.admin.dashboard') }}"><i class="bi bi-house"></i><span class="text">Dashboard</span></a></li>
                    <li class="{{ request()->is('admin/calculator') ? 'active' : '' }}">
                        <a href="{{ url('admin/calculator') }}">
                            <i class="bi bi-building-add"></i><span class="text">Calculator</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('leads.list.index') ? 'active' : '' }}"><a href="{{ route('leads.list.index') }}"><i class="bi bi-journal"></i></i><span class="text">Appointments</span></a></li>
                    <li class="{{ request()->is('quotations') ? 'active' : '' }}">
                        <a href="{{ route('quotations.list') }}">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Quotations</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('orders') ? 'active' : '' }}">
                        <a href="{{route('order.list')}}">
                            <i class="bi bi-truck"></i><span class="text">Orders</span>
                        </a>
                    </li>

                @endif
                @if (Auth::user()->getRoleNames()[0] == 'Help Desk')
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('super.admin.dashboard') }}"><i class="bi bi-house"></i><span class="text">Dashboard</span></a></li>
                    <li class="{{ request()->is('leads.list.index') ? 'active' : '' }}"><a href="{{ route('leads.list.index') }}"><i class="bi bi-journal"></i></i><span class="text">Appointments</span></a></li>
                    <li class="{{ request()->is('quotations') ? 'active' : '' }}">
                        <a href="{{ route('quotations.list') }}">
                            <i class="bi bi-receipt-cutoff"></i><span class="text">Quotations</span>
                        </a>
                    </li>
                    <li class="{{ request()->is('orders') ? 'active' : '' }}">
                        <a href="{{route('order.list')}}">
                            <i class="bi bi-truck"></i><span class="text">Orders</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getRoleNames()[0] == 'Fulfillment Desk')
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('super.admin.dashboard') }}"><i class="bi bi-house"></i><span class="text">Dashboard</span></a></li>
                    <li class="{{ request()->is('orders') ? 'active' : '' }}">
                        <a href="{{route('order.list')}}">
                            <i class="bi bi-truck"></i><span class="text">Orders</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->getRoleNames()[0] == 'Data Entry Operator')
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('super.admin.dashboard') }}"><i class="bi bi-house"></i><span class="text">Dashboard</span></a></li>
                    <li class="{{ request()->is('products') ? 'active' : '' }}">
                        <a href="/products">
                            <i class="bi bi-box2"></i><span class="text">Products</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
  </div>