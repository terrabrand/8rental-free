<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ env('APP_NAME') }}</title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/soft-ui-dashboard.min.css?v=1.0.2">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="./assets/css/theme.css">
    <link rel="stylesheet" href="./assets/css/loopple/loopple.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
    <style>
    /* CSS for controlling font size */
    .nav-link p {
        font-size: 14px; /* Adjust the font size as needed */
        margin: 0; /* Reset default margin */
        color: #666666; 
    }

    /* Adjust the icon color */
    .nav-link .nav-icon {
        color: #666666; /* Change icon color as desired */
    }

    /* Adjust the spacing between icon and text */
    .nav-link .nav-icon {
        margin-right: 5px; /* Adjust as needed */
    }

    /* Adjust the text color */
    .nav-link span {
        color: #0000ff; /* Change text color as desired */
    }

    .nav.nav-pills.nav-sidebar.flex-column {
        background-color: #ffffff; /* Change background color as desired */
    }
  </style>
</head>

<aside class="main-sidebar  elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li>
                    <select class="searchable-field form-control">

                    </select>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('properties_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/properties*") ? "menu-open" : "" }} {{ request()->is("admin/sections*") ? "menu-open" : "" }} {{ request()->is("admin/units*") ? "menu-open" : "" }} {{ request()->is("admin/equipment-types*") ? "menu-open" : "" }} {{ request()->is("admin/equipments*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/properties*") ? "active" : "" }} {{ request()->is("admin/sections*") ? "active" : "" }} {{ request()->is("admin/units*") ? "active" : "" }} {{ request()->is("admin/equipment-types*") ? "active" : "" }} {{ request()->is("admin/equipments*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-home">

                            </i>
                            <p>
                                {{ trans('cruds.propertiesMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('property_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.properties.index") }}" class="nav-link {{ request()->is("admin/properties") || request()->is("admin/properties/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-home">

                                        </i>
                                        <p>
                                            {{ trans('cruds.property.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('section_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sections.index") }}" class="nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.section.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('unit_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.units.index") }}" class="nav-link {{ request()->is("admin/units") || request()->is("admin/units/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hotel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.unit.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('equipment_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipment-types.index") }}" class="nav-link {{ request()->is("admin/equipment-types") || request()->is("admin/equipment-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-solar-panel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.equipmentType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('equipment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.equipments.index") }}" class="nav-link {{ request()->is("admin/equipments") || request()->is("admin/equipments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-solar-panel">

                                        </i>
                                        <p>
                                            {{ trans('cruds.equipment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contact_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/landlords*") ? "menu-open" : "" }} {{ request()->is("admin/tenants*") ? "menu-open" : "" }} {{ request()->is("admin/maintainers*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/landlords*") ? "active" : "" }} {{ request()->is("admin/tenants*") ? "active" : "" }} {{ request()->is("admin/maintainers*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-address-book">

                            </i>
                            <p>
                                {{ trans('cruds.contact.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('landlord_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.landlords.index") }}" class="nav-link {{ request()->is("admin/landlords") || request()->is("admin/landlords/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.landlord.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tenant_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tenants.index") }}" class="nav-link {{ request()->is("admin/tenants") || request()->is("admin/tenants/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-user-circle">

                                        </i>
                                        <p>
                                            {{ trans('cruds.tenant.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('maintainer_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.maintainers.index") }}" class="nav-link {{ request()->is("admin/maintainers") || request()->is("admin/maintainers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-address-card">

                                        </i>
                                        <p>
                                            {{ trans('cruds.maintainer.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('accounting_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/expense-types*") ? "menu-open" : "" }} {{ request()->is("admin/expenses*") ? "menu-open" : "" }} {{ request()->is("admin/invoice-types*") ? "menu-open" : "" }} {{ request()->is("admin/invoices*") ? "menu-open" : "" }} {{ request()->is("admin/income-types*") ? "menu-open" : "" }} {{ request()->is("admin/incomes*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/expense-types*") ? "active" : "" }} {{ request()->is("admin/expenses*") ? "active" : "" }} {{ request()->is("admin/invoice-types*") ? "active" : "" }} {{ request()->is("admin/invoices*") ? "active" : "" }} {{ request()->is("admin/income-types*") ? "active" : "" }} {{ request()->is("admin/incomes*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-dollar-sign">

                            </i>
                            <p>
                                {{ trans('cruds.accounting.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('expense_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expense-types.index") }}" class="nav-link {{ request()->is("admin/expense-types") || request()->is("admin/expense-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expenseType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('expense_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.expenses.index") }}" class="nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-money-bill-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.expense.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('invoice_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.invoice-types.index") }}" class="nav-link {{ request()->is("admin/invoice-types") || request()->is("admin/invoice-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-invoice">

                                        </i>
                                        <p>
                                            {{ trans('cruds.invoiceType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('invoice_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.invoices.index") }}" class="nav-link {{ request()->is("admin/invoices") || request()->is("admin/invoices/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.invoice.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.income-types.index") }}" class="nav-link {{ request()->is("admin/income-types") || request()->is("admin/income-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-bill-wave">

                                        </i>
                                        <p>
                                            {{ trans('cruds.incomeType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('income_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.incomes.index") }}" class="nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-check-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.income.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('documents_menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/document-types*") ? "menu-open" : "" }} {{ request()->is("admin/documents*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/document-types*") ? "active" : "" }} {{ request()->is("admin/documents*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon far fa-folder">

                            </i>
                            <p>
                                {{ trans('cruds.documentsMenu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('document_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.document-types.index") }}" class="nav-link {{ request()->is("admin/document-types") || request()->is("admin/document-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-archive">

                                        </i>
                                        <p>
                                            {{ trans('cruds.documentType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-copy">

                                        </i>
                                        <p>
                                            {{ trans('cruds.document.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.user-alerts.index") }}" class="nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon fas fa-bell">

                            </i>
                            <p>
                                {{ trans('cruds.userAlert.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('application_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.applications.index") }}" class="nav-link {{ request()->is("admin/applications") || request()->is("admin/applications/*") ? "active" : "" }}">
                            <i class="fa-fw nav-icon far fa-folder-open">

                            </i>
                            <p>
                                {{ trans('cruds.application.title') }}
                            </p>
                        </a>
                    </li>
                @endcan
                @can('faq_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/faq-categories*") ? "menu-open" : "" }} {{ request()->is("admin/faq-questions*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/faq-categories*") ? "active" : "" }} {{ request()->is("admin/faq-questions*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-question">

                            </i>
                            <p>
                                {{ trans('cruds.faqManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('faq_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faq-categories.index") }}" class="nav-link {{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqCategory.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('faq_question_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.faq-questions.index") }}" class="nav-link {{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-question">

                                        </i>
                                        <p>
                                            {{ trans('cruds.faqQuestion.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <script>
      feather.replace()
    </script>
</aside>


    
    
    
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/core/popper.min.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/core/bootstrap.min.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/plugins/chartjs.min.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/plugins/Chart.extension.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
    <script>
        if (document.querySelector("#chart-bars")) {
           	var ctx = document.getElementById("chart-bars").getContext("2d");
           	new Chart(ctx, {
              type: "bar",
              data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                  label: "Sales",
                  tension: 0.4,
                  borderWidth: 0,
                  borderRadius: 4,
                  borderSkipped: false,
                  backgroundColor: "#fff",
                  data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                  maxBarThickness: 6
                }, ],
              },
              options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                  legend: {
                    display: false,
                  }
                },
                interaction: {
                  intersect: false,
                  mode: 'index',
                },
                scales: {
                  y: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                    },
                    ticks: {
                      suggestedMin: 0,
                      suggestedMax: 500,
                      beginAtZero: true,
                      padding: 15,
                      font: {
                        size: 14,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                      color: "#fff"
                    },
                  },
                  x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false
                    },
                    ticks: {
                      display: false
                    },
                  },
                },
              },
            });
        
           };
           if (document.querySelector("#chart-line")) {
           	var ctx2 = document.getElementById("chart-line").getContext("2d");
           	var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
           	gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");
           	var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
           	gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke2.addColorStop(0, "rgba(20,23,39,0)");
           	new Chart(ctx2, {
              type: "line",
              data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6
        
                  },
                  {
                    label: "Websites",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                    maxBarThickness: 6
                  },
                ],
              },
              options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                  legend: {
                    display: false,
                  }
                },
                interaction: {
                  intersect: false,
                  mode: 'index',
                },
                scales: {
                  y: {
                    grid: {
                      drawBorder: false,
                      display: true,
                      drawOnChartArea: true,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      padding: 10,
                      color: '#b2b9bf',
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                  x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      color: '#b2b9bf',
                      padding: 20,
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                },
              },
            }); 
           };
    </script>
    <script src="./assets/js/loopple/loopple.js"></script>
    <script>
    feather.replace();
</script>

