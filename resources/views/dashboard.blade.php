<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
        <button type="button" class="btn btn-md btn-default pull-right" data-toggle="modal" data-target="#modal-default">
            Filter
        </button>
    </x-slot>

    {{-- rincian --}}
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan masuk</span>
                <span class="info-box-number">{{ $totalPengusulan }}</span>
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
                <span class="info-box-number">{{ $totalDisetujui }}</span>
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
                <span class="info-box-number">{{ $totalDitolak }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan Sudah Diproses</span>
                <span class="info-box-number">{{ $totalDiproses }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Usulan Belum Diproses</span>
                <span class="info-box-number">{{ $totalBelumDiproses }}</span>
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
                    <div id="chart1" style="height: 300px;"></div>
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
                    <div id="chart2" style="height: 300px;"></div>
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
                    <div id="chart4" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Performance by month</h3>

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


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="kanreg">Kanreg :</label>
                            <select name="kanreg" id="kanreg" class="form-control">
                                <option value="semua">semua</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi :</label>
                            <select name="instansi" id="instansi" class="form-control">
                                <option @selected(request()->get("instansi") == "semua") value="semua">semua</option>
                                @foreach($instansi as $row)
                                    <option @selected(request()->get("instansi") == $row->instansi_nama) value="{{ $row->instansi_nama }}">{{ $row->instansi_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer p-0 pt-5">
                            <button type="button" class="btn btn-default pull-left ml-0" data-dismiss="modal">Close</button>
                            <a href="{{ route("dashboard") }}" class="btn btn-default pull-left">Reset</a>
                            <button type="submit" class="btn btn-default">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
      <!-- /.modal -->

      @push("js")
      <script src="{{ asset("assets/") }}/bower_components/chart.js/Chart.js"></script>
        <script>
            const chart = new Chartisan({
                el: '#chart1',
                data: {!! $chart !!},
                hooks: new ChartisanHooks()
                    .tooltip()
                    .colors(['#FE0045','#ECC94B','#67C560'])
                    .datasets('pie')
                    .axis(false)
            });

            const chart2 = new Chartisan({
                el: '#chart2',
                data: {!! $chart2 !!},
                hooks: new ChartisanHooks()
                .tooltip()
                .colors(['#67C560','#ECC94B'])
                    .datasets('pie')
                    .axis(false)
            });

            const chart3 = new Chartisan({
                el: '#chart3',
                data: {!! $chart3 !!},
                hooks: new ChartisanHooks()
                .tooltip()
                    .legend()
                    .colors()
                    .datasets(["line","bar"]),
            });

            const chart4 = new Chartisan({
                el: '#chart4',
                data: {!! $chart4 !!},
                hooks: new ChartisanHooks()
                .tooltip()
                .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                    .datasets('pie').axis(false)

            });
        </script>
      @endpush
</x-app-layout>
