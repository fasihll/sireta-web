<div class="row layout-spacing mt-2">

    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-one">
            <div class="widget-heading">
                <h6 class="">Master Data</h6>

                <div class="task-action">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-more-horizontal">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask"
                            style="will-change: transform;">
                            <a class="dropdown-item" href="javascript:void(0);">View</a>
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-chart">

                <div class="w-chart-section total-visits-content">
                    <div class="w-detail">
                        <p class="w-title">Total Kriteria</p>
                        <p class="w-stats">{{ $kriteria->count() }}</p>
                    </div>
                    {{-- <div class="w-chart-render-one">
                        <div id="total-users"></div>
                    </div> --}}
                </div>


                <div class="w-chart-section paid-visits-content">
                    <div class="w-detail">
                        <p class="w-title">Total Wisata</p>
                        <p class="w-stats">{{ $wisata->count() }}</p>
                    </div>
                    {{-- <div class="w-chart-render-one">
                        <div id="paid-visits"></div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    <div class="w-info">
                        <h6 class="value">Consistency Ratio</h6>
                    </div>
                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask"
                                style="will-change: transform;">
                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-content">

                    <div class="w-info">
                        <p class="value">{{ $perbandinganBerpasangan->consistency_ratio }}</p>
                    </div>

                </div>

                <div class="w-progress-stats">
                    {{-- <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%"
                            aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}

                    <div class="">
                        <div class="w-icon">
                            @if ($perbandinganBerpasangan->consistency_ratio <= 0.1)
                                <p class="text-success">Konsisten</p>
                            @else
                                <p class="text-danger">Tidak Konsisten</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    <div class="w-info">
                        <h6 class="value">Total User</h6>
                    </div>
                    <div class="task-action">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask"
                                style="will-change: transform;">
                                <a class="dropdown-item" href="javascript:void(0);">This Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-content">

                    <div class="w-info">
                        <p class="value">{{ $users->count() }} <span>User</span></p>
                    </div>

                </div>

                {{-- <div class="w-progress-stats">
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%"
                            aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="">
                        <div class="w-icon">
                            <p>57%</p>
                        </div>
                    </div>

                </div> --}}
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-three">
            <div class="widget-heading">
                <div class="">
                    <h5 class="">Ranking Wisata</h5>
                </div>

                <div class="dropdown ">
                    <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-more-horizontal">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                    </div>
                </div>
            </div>

            <div class="widget-content">
                <div id="uniqueVisits"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-two">
            <div class="widget-heading">
                <h5 class="">Categori Wisata</h5>
            </div>
            <div class="widget-content">
                <div id="chart-2" class=""></div>
            </div>
        </div>
    </div>
    {{-- {{ dd($wisataByCategory) }} --}}
</div>

@assets
    @persist('styles')
        <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    @endpersist

    @push('scripts')
        <script>
            function Category() {
                return {
                    labels: [
                        '{{ $wisataByCategory[0]->name }}',
                        @for ($i = 0; $i < $wisataByCategory->count(); $i++)
                            '{{ $wisataByCategory[$i]->name }}',
                        @endfor
                    ],
                    series: [
                        {{ $wisataByCategory[0]->wisatas->count() }},
                        @foreach ($wisataByCategory as $item)
                            {{ $item->wisatas->count() }},
                        @endforeach
                    ]
                };
            }

            function Wisata() {
                return {
                    xaxis: [
                        '{{ $wisata[0]->name }}',
                        @for ($i = 0; $i < $wisata->count(); $i++)
                            '{{ $wisata[$i]->name }}',
                        @endfor
                    ],
                    series: [
                        {{ number_format(reset($wp['V']), 3) }},
                        @foreach ($wp['sorted_wisata'] as $index => $item)
                            {{ number_format($wp['V'][$item->id], 3) }},
                        @endforeach
                    ]
                }
            }
        </script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="plugins/apex/apexcharts.min.js"></script>
        <script src="assets/js/dashboard/dash_2.js"></script>
        <script src="assets/js/dashboard/dash_1.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @endpush
@endassets
