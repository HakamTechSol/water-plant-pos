<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a class="{{ Request::is('index') ? 'active' : '' }}" href="{{url('index')}}"><img src="{{ URL::asset('/assets/img/icons/dashboard.svg')}}" alt="img"><span> Dashboard (CS)</span> </a>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('productlist','addproduct','editbrand','product-details','editsize','editcategory','categorylist','editproduct','addcategory','sizelist','size','brandlist','addbrand','importproduct','barcode') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/product.svg')}}" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('productlist','editproduct') ? 'active' : '' }}" href="{{url('productlist')}}">Product List</a></li>
                        <!-- <li><a class="{{ Request::is('addproduct','product-details') ? 'active' : '' }}" href="{{url('addproduct')}}">Add Product</a></li> -->
                        <li><a class="{{ Request::is('categorylist') ? 'active' : '' }}" href="{{url('categorylist')}}">Category List</a></li>
                        <!-- <li><a class="{{ Request::is('addcategory','editcategory') ? 'active' : '' }}" href="{{url('addcategory')}}">Add Category</a></li> -->
                        <li><a class="{{ Request::is('sizelist') ? 'active' : '' }}" href="{{url('sizelist')}}">Size List</a></li>
                        <!-- <li><a class="{{ Request::is('size','editsize') ? 'active' : '' }}" href="{{url('size')}}">Add Size</a></li> -->
                        <li><a class="{{ Request::is('brandlist') ? 'active' : '' }}" href="{{url('brandlist')}}">Brand List</a></li>
                        <!-- <li><a class="{{ Request::is('addbrand','editbrand') ? 'active' : '' }}" href="{{url('addbrand')}}">Add Brand</a></li> -->
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('saleslist','pos','add-sales','sales-details','editsalesreturns','edit-sales','salesreturnlists','createsalesreturns') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/sales1.svg')}}" alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('saleslist','sales-details') ? 'active' : '' }}" href="{{url('saleslist')}}">Sales List</a></li>
                        <!-- <li><a class="{{ Request::is('add-sales','edit-sales') ? 'active' : '' }}" href="{{url('add-sales')}}">New Sales</a></li> -->

                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('purchaselist','addpurchase','editpurchase') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/purchase1.svg')}}" alt="img"><span> Order </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('list-all-purchases','editpurchase') ? 'active' : '' }}" href="{{ route('purchase.list') }}">Order List</a></li>
                        <!-- <li><a class="{{ Request::is('add-purchase') ? 'active' : '' }}" href="{{ route('add.purchase') }}">Add Order</a></li> -->
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('list-expense','create-expense','edit-expense') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/expense1.svg')}}" alt="img"><span> Expense </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('list-expense') ? 'active' : '' }}" href="{{ route('list.expense') }}">Expense List</a></li>
                        <!-- <li><a class="{{ Request::is('create-expense','edit-expense') ? 'active' : '' }}" href="{{ route('create.expense') }}">Add Expense</a></li> -->
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('create-account','list-all-account','editaccount') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/expense1.svg')}}" alt="img"><span> Accounts </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('list-all-account') ? 'active' : '' }}" href="{{ route('account.list') }}">Account List</a></li>
                        <!-- <li><a class="{{ Request::is('create-account','editaccount') ? 'active' : '' }}" href="{{ Route('preview.account.page') }}">Add Account</a></li> -->
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('plantlist','add-plant','editplant') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/expense1.svg')}}" alt="img"><span> Plants </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('plantlist') ? 'active' : '' }}" href="{{ route('plant.list') }}">Plant List</a></li>
                        <!-- <li><a class="{{ Request::is('createplant','editplant') ? 'active' : '' }}" href="{{ route('add.plant') }}">Add Plant</a></li> -->
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('add.attendance','employee.salary') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/expense1.svg')}}" alt="img"><span> Specifications</span> <span class="menu-arrow"></span></a>
                    <ul>
                     <!--    <li><a class="{{ Request::is('add.attendance') ? 'active' : '' }}" href="{{ route('add_specification') }}">Add Specification</a></li> -->
                        <li><a class="{{ Request::is('employee.salary') ? 'active' : '' }}" href="{{ route('Specificationlist') }}">Specification List</a></li>
                    </ul>

                </li>

                <li class="submenu">
                    <a class="{{ Request::is('quotationlist','addquotation','editquotation') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/quotation1.svg')}}" alt="img"><span> Quotation</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('quote-list','editquotation') ? 'active' : '' }}" href="{{ route('quotation.list') }}">Quotation List</a></li>
                        <!-- <li><a class="{{ Request::is('addquotation') ? 'active' : '' }}" href="{{ route('add.quote') }}">Add Quotation</a></li> -->
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('salesreturnlist','createsalesreturn','editsalesreturn','purchasereturnlist','editpurchasereturn','createpurchasereturn') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/return1.svg')}}" alt="img"><span> Return </span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('salesreturnlist','editsalesreturn') ? 'active' : '' }}" href="{{ route('sale.return.list') }}">Sales Return List</a></li>
                        <li><a class="{{ Request::is('purchasereturnlist') ? 'active' : '' }}" href="{{ route('purchase.return.list') }}">Purchase Return List</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('customerlist','addcustomer','editcustomer','edituser','editsupplier','editstore','supplierlist','addsupplier','userlist','adduser','storelist','addstore') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/users1.svg')}}" alt="img"><span> People</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('customerlist') ? 'active' : '' }}" href="{{url('customerlist')}}">Customer List</a></li>
                        <!-- <li><a class="{{ Request::is('addcustomer','editcustomer') ? 'active' : '' }}" href="{{url('addcustomer')}}">Add Customer </a></li> -->
                        <li><a class="{{ Request::is('supplierlist') ? 'active' : '' }}" href="{{url('supplierlist')}}">Supplier List</a></li>
                        <!-- <li><a class="{{ Request::is('addsupplier','editsupplier') ? 'active' : '' }}" href="{{url('addsupplier')}}">Add Supplier </a></li> -->
                        <li><a class="{{ Request::is('userlist') ? 'active' : '' }}" href="{{url('userlist')}}">Employee List</a></li>
                        <!-- <li><a class="{{ Request::is('adduser','edituser') ? 'active' : '' }}" href="{{url('adduser')}}">Add Employee</a></li> -->
                        <!-- <li><a class="{{ Request::is('storelist') ? 'active' : '' }}" href="{{url('storelist')}}">Store List</a></li>
                        <li><a class="{{ Request::is('addstore','editstore') ? 'active' : '' }}" href="{{url('addstore')}}">Add Store</a></li> -->
                    </ul>
                </li>
                @if(session('role') == "Admin")
                <li class="submenu">
                    <a class="{{ Request::is('add.attendance','employee.salary') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/users1.svg')}}" alt="img"><span> Attendance</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('add.attendance') ? 'active' : '' }}" href="{{ route('add.attendance') }}">Add Attendance</a></li>
                        <li><a class="{{ Request::is('employee.salary') ? 'active' : '' }}" href="{{ route('employee.salary') }}">Employee Salary</a></li>
                    </ul>
                </li>
                @endif
                <li class="submenu">
                    <a class="{{ Request::is('document') ? 'active' : '' }}" href="javascript:void(0)"><i data-feather="file"></i><span> Document</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('document') ? 'active' : '' }}" href="{{ route('document') }}">Add/Update Document</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a class="{{ Request::is('reporting') ? 'active' : '' }}" href="javascript:void(0)"><img src="{{ URL::asset('/assets/img/icons/purchase1.svg')}}" alt="img"><span> Reporting</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('document') ? 'active' : '' }}" href="{{ route('reporting') }}">Reporting</a></li>
                    </ul>
                </li>
                <!-- <li class="submenu">
                    <a class="{{ Request::is('invoicelist','createinvoice','editinvoice') ? 'active' : '' }}" href="javascript:void(0)"><i data-feather="file"></i><span> Invoice</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('invoicelist') ? 'active' : '' }}" href="{{ route('invoice.list') }}">Invoice List</a></li>
                        <li><a class="{{ Request::is('add.invoice','editinvoice') ? 'active' : '' }}" href="{{ route('add.invoice') }}">Add Invoice</a></li>
                    </ul>
                </li> -->
                @if(session('role') == 'Admin')
                <li class="submenu">
                    <a class="{{ Request::is('user-account-list','companysettings') ? 'active' : '' }}" href="javascript:void(0);"><img src="{{ URL::asset('/assets/img/icons/settings.svg')}}" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a class="{{ Request::is('companysettings') ? 'active' : '' }}" href="{{url('companysettings')}}">Company Settings</a></li>
                        <li><a class="{{ Request::is('user-account-list') ? 'active' : '' }}" href="{{url('user-account-list')}}">User Account Lists</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>