<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('backsite.dashboard.index') }}">
                    <i class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}" ></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h" data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
            </li>

            {{-- @can('management_access') --}}
                <li class=" nav-item"><a href="#"><i class=""></i><span class="menu-title" data-i18n="Management Access">Management Access</span></a>
                    <ul class="menu-content">
                        {{-- @can('permission_access') --}}
                            <li class="">
                                <a class="menu-item" href="">
                                    <i></i><span>Permission</span>
                                </a>
                            </li>
                        {{-- @endcan --}}
                        {{-- @can('role_access') --}}
                            <li class="{{ request()->is('backsite/role') || request()->is('backsite/role/*') || request()->is('backsite/*/role') || request()->is('backsite/*/role/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('backsite.role.index') }}">
                                    <i></i><span>Role</span>
                                </a>
                            </li>
                        {{-- @endcan --}}
                        {{-- @can('type_user_access') --}}
                            <li class=" ">
                                <a class="menu-item" href="">
                                    <i></i><span>Type User</span>
                                </a>
                            </li>
                        {{-- @endcan --}}
                        {{-- @can('user_access') --}}
                            <li class="">
                                <a class="menu-item" href="">
                                    <i></i><span>User</span>
                                </a>
                            </li>
                        {{-- @endcan --}}
                    </ul>
                </li>
            {{-- @endcan --}}

            {{-- @can('master_data_access') --}}
                <li class=" nav-item"><a href="#"><i class=""></i><span class="menu-title" data-i18n="Master Data">Master Data</span></a>
                    <ul class="menu-content">

                        {{-- @can('specialist_access') --}}
                            <li class=" ">
                                <a class="menu-item" href="">
                                    <i></i><span>Specialist</span>
                                </a>
                            </li>
                        {{-- @endcan --}}

                        {{-- @can('consultation_access') --}}
                            <li class=" ">
                                <a class="menu-item" href="">
                                    <i></i><span>Consultation</span>
                                </a>
                            </li>
                        {{-- @endcan --}}

                        {{-- @can('config_payment_access') --}}
                            <li class=" ">
                                <a class="menu-item" href="">
                                    <i></i><span>Config Payment</span>
                                </a>
                            </li>
                        {{-- @endcan --}}

                    </ul>
                </li>
            {{-- @endcan --}}

            {{-- @can('operational_access') --}}
                <li class=" nav-item"><a href="#"><i class=""></i><span class="menu-title" data-i18n="Operational">Operational</span></a>
                    <ul class="menu-content">

                        @can('doctor_access')
                            <li class="">
                                <a class="menu-item" href="">
                                    <i></i><span>Doctor</span>
                                </a>
                            </li>
                        @endcan

                        {{-- @can('hospital_patient_access') --}}
                            <li class="">
                                <a class="menu-item" href="">
                                    <i></i><span>Hospital Patient</span>
                                </a>
                            </li>
                        {{-- @endcan --}}


                        {{-- here you can add nurse --}}


                        {{-- @can('appointment_access') --}}
                            <li class=" ">
                                <a class="menu-item" href="">
                                    <i></i><span>Appointment</span>
                                </a>
                            </li>
                        {{-- @endcan --}}

                        {{-- @can('transaction_access') --}}
                            <li class=" ">
                                <a class="menu-item" href="">
                                    <i></i><span>Transaction</span>
                                </a>
                            </li>
                        {{-- @endcan --}}

                    </ul>
                </li>
            {{-- @endcan --}}

        </ul>
    </div>
</div>

<!-- END: Main Menu-->
