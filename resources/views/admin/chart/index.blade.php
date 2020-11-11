@extends('layouts.template')

@section('addressTitle','Chart')

@section('customStyle')
    <style>
        #tambahButton {
            margin: 0 0 3% 3%;
        }
    </style>
@endsection

@section('contentHere')
        <!--atas dashboard-->
        <div class="creative-state-area basic-gradient">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <h4 class="creative-state-title">Dashboard</h4>
                </div>
                <div class="col-lg-5  col-12 text-lg-right">
                    
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle bg-warning sr-icon-box bubble-shadow-small">
                                    <i class="vl_user-male"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="text-uppercase mb-0 weight500 text-dark">4,87,654</h4>
                                    <span class="text-muted">Barang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle bg-purple sr-icon-box bubble-shadow-small">
                                    <i class="vl_download"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="text-uppercase mb-0 weight500 text-dark">4,87,654</h4>
                                    <span class="text-muted">Proyek</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle bg-danger sr-icon-box bubble-shadow-small">
                                    <i class="vl_shopping-bag2"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="text-uppercase mb-0 weight500 text-dark">4,87,654</h4>
                                    <span class="text-muted">Active Installation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-body">
                            <div class="media d-flex align-items-center">
                                <div class="mr-4 rounded-circle bg-purple-light sr-icon-box bubble-shadow-small">
                                    <i class="vl_cart-empty"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="text-uppercase mb-0 weight500 text-dark">4,87,654</h4>
                                    <span class="text-muted">Product Sales</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/atasnya dashboard kone brow-->

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title">Chart Batang</div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success successAlert">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <canvas id="bar-chart-js" height="250"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card card-shadow mb-4">
                        <div class="card-header border-0">
                            <div class="custom-title-wrap bar-primary">
                                <div class="custom-title">Chart Garis</div>
                            </div>
                            @if (Session::has('success'))
                                <div class="alert alert-success successAlert">
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="card-body- pt-3 pb-4">
                            <canvas id="line_chart" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Init Modal -->

        <div class="modal fade bd-example-modal-lg" id="detailBarangModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Detail Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scriptPlace')
    <!-- Add Class in mobile screen -->
    <script type="text/javascript">
        $(window).on('resize', function() {
            if($(window).width() < 767) {
                $('.table').toggleClass('table-responsive');
            }
        });
    </script>

    <!--call chartjs-->
    <script src="{{ asset('assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>

    <!-- init batang chart -->
    <script type="text/javascript">
        $(function () {
                    "use strict";

                    var ctx = document.getElementById('bar-chart-js').getContext('2d');

                    var myBarChart = new Chart(ctx, {
                        // The type of chart we want to create
                        type: 'bar',

                        // The data for our dataset
                        data: {
                            labels: ["Item 1", "Item 2", "Item 3", "Item 4", "Item 5"],
                            datasets: [{
                                label: "My First dataset",
                                data: [40, 90, 210, 160, 230],
                                backgroundColor: '#3dba6f',
                                borderColor: '#3dba6f',
                                pointBorderColor: '#ffffff',
                                pointBackgroundColor: '#3dba6f',
                                pointBorderWidth: 2,
                                pointRadius: 4

                            }, {
                                label: "My Second dataset",
                                data: [160, 140, 20, 270, 110],
                                backgroundColor: '#57b9d8',
                                borderColor: '#57b9d8',
                                pointBorderColor: '#ffffff',
                                pointBackgroundColor: '#57b9d8',
                                pointBorderWidth: 2,
                                pointRadius: 4
                            }]
                        },

                        // Configuration options go here
                        options: {
                            maintainAspectRatio: false,
                            legend: {
                                display: true
                            },

                            scales: {
                                xAxes: [{
                                    display: true,
                                    gridLines: {
                                        zeroLineColor: '#e7ecf0',
                                        color: '#e7ecf0',
                                        borderDash: [5, 5, 5],
                                        zeroLineBorderDash: [5, 5, 5],
                                        drawBorder: false
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    gridLines: {
                                        zeroLineColor: '#e7ecf0',
                                        color: '#e7ecf0',
                                        borderDash: [5, 5, 5],
                                        zeroLineBorderDash: [5, 5, 5],
                                        drawBorder: false
                                    }
                                }]

                            },
                            elements: {
                                line: {
                                    tension: 0.00001,
                                    //              tension: 0.4,
                                    borderWidth: 1
                                },
                                point: {
                                    radius: 2,
                                    hitRadius: 10,
                                    hoverRadius: 6,
                                    borderWidth: 4
                                }
                            }
                        }
                    });
        });
    </script>
    <!-- End -->

    <!-- init garis chart -->
    <script type="text/javascript">
    $(function () {
        "use strict";

        //line chart

        var ctx = document.getElementById('line_chart').getContext('2d');

        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["Item 1", "Item 2", "Item 3", "Item 4", "Item 5"],
                datasets: [{
                    label: "My First dataset",
                    data: [40, 90, 210, 160, 230],
                    backgroundColor: 'rgba(255,255,255,0)',
                    borderColor: '#2ac021',
                    pointBorderColor: '#ffffff',
                    pointBackgroundColor: '#2ac021',
                    pointBorderWidth: 2,
                    pointRadius: 4

                }, {
                    label: "My Second dataset",
                    data: [160, 140, 20, 270, 110],
                    backgroundColor: 'rgba(255,255,255,0)',
                    borderColor: '#57b9d8',
                    pointBorderColor: '#ffffff',
                    pointBackgroundColor: '#57b9d8',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },

            // Configuration options go here
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },

                scales: {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            zeroLineColor: '#e7ecf0',
                            color: '#e7ecf0',
                            borderDash: [5, 5, 5],
                            zeroLineBorderDash: [5, 5, 5],
                            drawBorder: false
                        }
                    }]

                },
                elements: {
                    line: {
                        tension: 0.00001,
                        //              tension: 0.4,
                        borderWidth: 1
                    },
                    point: {
                        radius: 2,
                        hitRadius: 10,
                        hoverRadius: 6,
                        borderWidth: 4
                    }
                }
            }
        });

    });

    </script>
    <!-- End -->

@endsection
