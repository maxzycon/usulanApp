<x-app-layout>
   <x-slot name="header">
       {{ __('Data usulan') }}
   </x-slot>

   {{-- rincian --}}
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Download data</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="{{ route("pengusulan.export") }}" method="GET">
          <div class="form-group">
            <label for="type">Unduh data berdasarkan :</label>
            <select name="type" id="type" class="form-control" required>
              <option value="semua">Semua</option>
              <option value="lembaga">Nama lembaga</option>
              <option value="validator">Nama Validator</option>
            </select>
          </div>
          <div class="form-group">
              <div style="display: none" id="lembaga_select">
                  <label for="search">Input pencarian :</label>
                  <select name="search" id="search" class="form-control select2" style="width: 100%;">
                      @foreach($instansi as  $row)
                          <option value="{{ $row }}">{{ $row }}</option>
                      @endforeach
                  </select>
              </div>
              <div style="display: none" id="validator_select">
                  <label for="search2">Input pencarian :</label>
                  <select name="search2" id="dsearc" class="form-control select2" style="width: 100%;">
                      @foreach($nama as  $row)
                          <option value="{{ $row }}">{{ $row }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
          <button class="btn btn-default pull-right">unduh data</button>
        </form>
      </div>
    </div>

    @push("js")
        <script>
            $(document).ready(function () {
                $("#type").change(function () {
                    let val = $(this).val();
                    if(val === "lembaga"){
                        $("#lembaga_select").show()
                        $("#validator_select").hide()
                    }else if(val === "validator"){
                        $("#lembaga_select").hide()
                        $("#validator_select").show()
                    }
                })
            })
        </script>
    @endpush
    <!-- /.box-footer-->
</x-app-layout>
