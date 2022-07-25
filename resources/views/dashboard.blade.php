<x-app-layout>
    <x-slot name="header">
{{--        {{ __('Dashboard') }}--}}

    </x-slot>

    {{-- rincian --}}
    <div class="row">
        @if(auth()->user()->level === 1)
        <div class="col-lg-12 mb-5">
            <button type="button" class="btn btn-md btn-default bg-blue pull-right" data-toggle="modal" data-target="#modal-default">
                Filter
            </button>
        </div>
        @endif
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan masuk</span>
                <span class="info-box-number">{{ number_format($totalPengusulan) }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan disetujui</span>
                <span class="info-box-number">{{ number_format($totalDisetujui) }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan Ditolak</span>
                <span class="info-box-number">{{ number_format($totalDitolak) }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan Sudah Diproses</span>
                <span class="info-box-number">{{ number_format($totalDiproses) }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-lock"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan Belum Diproses</span>
                <span class="info-box-number">{{ number_format($totalBelumDiproses) }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
        <div class="col-md-4 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Overview</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart-container">
                        <div class="doughnut-chart-container" style="height: 300px;">
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Task completed</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart-container">
                        <div class="doughnut-chart-container" style="height: 300px;">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Riwayat</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart-container">
                        <div class="pie-chart-container" style="height: 300px;">
                            <canvas id="chart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Performance</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="chart3" style="height: 300px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    @if(auth()->user()->level === 1)
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Filter data</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="kanreg">Kanreg :</label>
                            <select name="kanreg" id="kanreg" class="form-control select2 select2-hidden-accessible" style="width: 100%;">
                                <option value="semua">semua</option>
                                @foreach($kanreg as $row)
                                    <option @selected(request()->get("kanreg") == $row->id) value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi :</label>
                            <select name="instansi" id="instansi" class="form-control select2" style="width: 100%">
                                <option @selected(request()->get("instansi") == "semua") value="semua">semua</option>
                                @foreach($instansi as $row)
                                    <option @selected(request()->get("instansi") == $row->instansi_nama) value="{{ $row->instansi_nama }}">{{ $row->instansi_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer" style="padding: 10px 0;">
                            <button type="button" class="btn btn-default pull-left ml-0" data-dismiss="modal">Close</button>
                            <a href="{{ route("dashboard") }}" class="btn btn-default pull-left">Reset</a>
                            <button type="submit" class="btn btn-default bg-blue">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->
    @endif

      @push("js")
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
{{--        <script src="{{ asset("assets/") }}/bower_components/chart.js/Chart.js"></script>--}}
        <script>
            $(function(){
                var cDataChart1 = JSON.parse(`<?= $chart; ?>`);
                new Chart($("#pie-chart"), {
                    type: 'doughnut',
                    data: {
                        labels: cDataChart1.label,
                        datasets: [
                            {
                                data: cDataChart1.data,
                                backgroundColor: ['#4299E1','#67C560','#C07EF1'],
                                borderColor: ['#4299E1','#67C560','#C07EF1'],
                                borderWidth: [1, 1, 1]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: true,
                            position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 13,
                            }
                        }
                    }
                });

                var cDataChart2 = JSON.parse(`<?= $chart2; ?>`);
                new Chart($("#chart2"), {
                    type: 'doughnut',
                    data: {
                        labels: cDataChart2.label,
                        datasets: [
                            {
                                data: cDataChart2.data,
                                backgroundColor: ['#C07EF1','#67C560','#ECC94B'],
                                borderColor: ['#C07EF1','#67C560','#ECC94B'],
                                borderWidth: [1, 1, 1]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: true,
                            position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 13,
                            }
                        }
                    }
                });


                var cData = JSON.parse(`<?= $chart4; ?>`);
                new Chart($("#chart4"), {
                    type: 'pie',
                    data: {
                        labels: cData.label,
                        datasets: [
                            {
                                data: cData.data,
                                backgroundColor: ['#C07EF1','#67C560','#ECC94B','#e84393'],
                                borderColor: ['#C07EF1','#67C560','#ECC94B','#e84393'],
                                borderWidth: [1, 1, 1]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: true,
                            position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 13,
                            }
                        }
                    }
                });
            });
        </script>

        <script>
            const chart3 = new Chartisan({
                el: '#chart3',
                data: {!! $chart3 !!},
                hooks: new ChartisanHooks()
                .tooltip()
                .legend()
                .colors()
                .datasets(["bar"]),
            });
        </script>
      @endpush
</x-app-layout>
