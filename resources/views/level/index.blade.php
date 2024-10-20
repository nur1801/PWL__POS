@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" h href="{{ url('/level/export_excel') }}" class="btn btn-primary"><i
                    class="fa fa-file-excel"></i> Export Level</a>
                <button onclick="modalAction('{{ url('level/import') }}')" class="btn btn-sm btn-info mt-1">Import
                    Level</button>
                {{-- [JS06] Tugas Pratikum m_level --}}
                <button onclick="modalAction('{{ url('/level/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah
                    Ajax</button>
                {{-- ----------------------------- --}}
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter </label>
                        <div class="col-3">
                            <select class="form-control" id="level_id" name="level_id" required>
                                <option value="">- Semua -</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Level</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Level</th>
                            <th>Nama Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        {{-- [JS06] Tugas Pratikum m_level --}}
        <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
            data-keyboard="false" data-width="75%" aria-hidden="true"></div>
        {{-- ---------------------------------- --}}
    @endsection
    @push('css')
    @endpush
    @push('js')
        <script>
            // [JS06] Tugas Pratikum m_level
            function modalAction(url = '') {
                $('#myModal').load(url, function() {
                    $('#myModal').modal('show');
                });
            }
            // ---------------------------------
            var dataLevel;
            $(document).ready(function() {
                dataLevel = $('#table_level').DataTable({
                    // serverSide: true, jika ingin menggunakan server side processing
                    serverSide: true,
                    ajax: {
                        "url": "{{ url('level/list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": function(d) {
                            d.level_id = $('#level_id').val();
                        }
                    },
                    columns: [{
                        // nomor urut dari laravel datatable addIndexColumn()
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "level_kode",
                        className: "",
                        // orderable: true, jika ingin kolom ini bisa diurutkan
                        orderable: true,
                        // searchable: true, jika ingin kolom ini bisa dicari
                        searchable: true
                    }, {
                        data: "level_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }]
                });
            });
            $('#level_id').on('change', function() {
                dataLevel.ajax.reload();
            });
        </script>
    @endpush
