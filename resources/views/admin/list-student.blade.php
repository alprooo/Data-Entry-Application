@extends('layouts.main')

@section('addStyle')
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">

                <div class="card" style="border-radius: 20px">
                    <div class="card-header"
                        style="background-color: #435EBE;border-top-left-radius: 20px;border-top-right-radius: 20px">
                        <h3 class="text-white">List Student Data</h3>
                        <p class="text-subtitle text-white">
                            List data yang sudah anda daftarkan pada form registrasi di aplikasi.
                        </p>

                    </div>
                    <div class="card-body pt-3">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ $message }}
                                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Campus</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $item)
                                    <tr>
                                        <td>{{ $item->student_id }}</td>
                                        <td>{{ $item->fname . ' ' . $item->lname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_num }}</td>
                                        <td>{{ $item->campus }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>

                                            <a class="btn btn-primary"
                                                href="{{ route('student.detail', ['id' => $item->id]) }}">Detail</a>

                                            <a href="{{ route('student.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection


@section('addScript')
    {{-- <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector("#table1");
        let dataTable = new simpleDatatables.DataTable(table1);
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script> --}}

    <script>
        $(document).ready(function() {


            // new $.fn.dataTable.FixedHeader(table);

            $('#table1').DataTable({
                dom: 'Bfrtip',
                ordering: false,
                buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-success text-default',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }, {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-danger text-default',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                }, ]
            });
        });
    </script>
@endsection
