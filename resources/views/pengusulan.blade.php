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
            <label for="search">Input pencarian :</label>
            <input type="text" class="form-control" name="search" id="search">
          </div>
          <button class="btn btn-default pull-right">unduh data</button>
        </form>
      </div>
    </div>
    <!-- /.box-footer-->
</x-app-layout>
