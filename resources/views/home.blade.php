@extends('layouts.admin')
@section('content')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/soft-ui-dashboard.min.css?v=1.0.2">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="./assets/css/theme.css">
    <link rel="stylesheet" href="./assets/css/loopple/loopple.css">


<body 
    
     class="main-content" id="panel">
        
        <div class="container-fluid pt-3">
            <div class="row removable">
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings1['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings1['total_number']) }}
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings2['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings2['total_number']) }}
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings3['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings3['total_number']) }}
                                            <span class="text-danger text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings4['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings4['total_number']) }}
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row removable">
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings5['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings5['total_number']) }}
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings6['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings6['total_number']) }}
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings7['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings7['total_number']) }}
                                            <span class="text-danger text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $settings8['chart_title'] }}</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        {{ number_format($settings8['total_number']) }}
                                            <span class="text-success text-sm font-weight-bolder"></span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape shadow text-center border-radius-md bg-gradient-success">
                                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row removable">
                <div class="col-lg-12">
                
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>INCOME CHART</h6>
                            
                        </div>
                        <div class="card-body">
                         <div class="{{ $chart13->options['column_class'] }}">
                                
                                {!! $chart13->renderHtml() !!}
                            </div>
                            <div class="col-md-6">
                            <div class="card-header pb-0">
                            <h6>LATEST ENTRIES</h6>
                            
                        </div>

                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($incomes as $key => $income)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $income->name }}</h6>
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $income->amount }}</p>
                                                        
                                                    </td>
                                                    
                                                   
                                                
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                        

                            </div>
                     </div>
                    </div>
                </div>
            </div> 

            <div class="row removable">
                <div class="col-lg-12">
                
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>EXPENSES CHART</h6>
                            
                        </div>
                        <div class="card-body">
                         <div class="{{ $chart12->options['column_class'] }}">
                                
                                {!! $chart12->renderHtml() !!}
                            </div>
                            <div class="col-md-6">
                            <div class="card-header pb-0">
                            <h6>LATEST ENTRIES</h6>
                            
                        </div>

                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($expenses as $key => $expense)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $expense->name }}</h6>
                                                                
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $expense->amount }}</p>
                                                        
                                                    </td>
                                                    
                                                   
                                                
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                        

                            </div>
                     </div>
                    </div>
                </div>
            </div> 
            
            <div class="row removable">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        
                            
                            
                           
                        
                    </div>
                </div>
                
            </div>
            
            <div class="row removable">
                <div class="col-lg-12">
                    <div class="row mt-4 removable">
                        <div class="col-lg-8 col-md-6">
                        </div>
                        <div class="col-lg-4 col-md-6">
                        </div>
                    </div>
                    <div class="row removable mb-4">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-1">Properties</h6>
                                    <p class="text-sm">Browse latest entries</p>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                    @foreach ($properties as $property)
                                        <div class="col-xl-3 col-md-6 mb-4">
                                        
                                            <div class="card card-blog card-plain">
                                                <div class="position-relative">
                                                    <a class="d-block shadow-xl border-radius-xl">
                                                        <img src="{{ $property->main_image->getUrl('') }}" alt="{{ $property->property_name }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                                    </a>
                                                </div>
                                                <div class="card-body px-1 pb-0">
                                                    <p class="text-gradient text-dark mb-2 text-sm">{{ $property->location }}</p>
                                                    <a href="javascript:;">
                                                        <h5>
                                                        {{ $property->property_name }}
                                                        </h5>
                                                    </a>
                                                    
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <button type="button" class="btn btn-outline-primary btn-sm mb-0" onclick="location.href='{{ route('admin.properties.show', $property->id) }}'">View Property</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card h-100 card-plain border">
                                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                                    <a href="{{ route('admin.properties.create') }}">
                                                        <i class="fa fa-plus text-secondary mb-3" aria-hidden="true"></i>
                                                        <h5 class=" text-secondary"> New Property </h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row removable">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <h6>Tenants table</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenant</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Property</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Marital</th>
                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tenants as $key => $tenant)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                        @if($tenant->image)
                                                            <div>
                                                                <img src="{{ $tenant->image->getUrl('') }}" class="avatar avatar-sm me-3">
                                                            </div>
                                                            @endif
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $tenant->first_name ?? '' }}</h6>
                                                                <p class="text-xs text-secondary mb-0">{{ $tenant->property->property_name ?? '' }}</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $tenant->property->property_name ?? '' }}</p>
                                                        <p class="text-xs text-secondary mb-0">Unit-{{ $tenant->unit->unit_name ?? '' }}</p>
                                                    </td>
                                                    
                                                    <td class="align-middle text-center text-sm">
                                                        
                                                        <span class="badge badge-sm bg-gradient-success">{{ App\Models\Tenant::STATUS_SELECT[$tenant->status] ?? '' }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">{{ App\Models\Tenant::MARITAL_STATUS_SELECT[$tenant->marital_status] ?? '' }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ route('admin.tenants.edit', $tenant->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3 pb-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © 2024,
                            made with
                            <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="font-weight-bold text-capitalize" target="_blank"> TerraBrand</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link text-muted" target="_blank">TerraBrand Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
   
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart11->renderJs() !!}{!! $chart12->renderJs() !!}{!! $chart13->renderJs() !!}
</body>
@endsection