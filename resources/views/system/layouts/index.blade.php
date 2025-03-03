@extends('system.layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card ml-3 mr-3">
                    <div class="card-header">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $errors->first() }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="card-title">
                            @yield('search')
                        </div>
                        <div class="card-tools">
                        @section('create')
                            @if (checkPermission($indexUrl . '/create', 'POST'))
                                <a href="{{ route($indexUrl . '.create') }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-plus"></i> Add</a>
                            @endif
                        @show
                        <a href="{{ url()->previous() }}" class="btn btn-info btn-sm back-btn"><i
                                class="fas fa-chevron-left"></i> Back</a>
                    </div>

                </div>
                <!-- /.card-header -->

                {{-- <div class="card"> --}}
                <div class="card-body">

                    @yield('test')

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="">
                                    @yield('headings')

                                </tr>
                            </thead>
                            <tbody>
                                @if ($items->isEmpty())
                                    <tr>
                                        <td colspan="100%" class="text-center text-danger">
                                            {{ 'No data found.' }}</td>
                                    </tr>
                                @else
                                    @yield('data')
                                @endif

                            </tbody>
                        </table>
                    </div>

                    @php
                        // Get the current page, total records, and records per page
                        $current_page = $items->currentPage();
                        $total_records = $items->total();
                        $records_per_page = $items->perPage();

                        // Calculate the starting and ending record numbers for the current page
                        $start_record = ($current_page - 1) * $records_per_page + 1;
                        $end_record = min($current_page * $records_per_page, $total_records);

                    @endphp

                    @if ($total_records != 0)
                        <p>Showing {{ $start_record }} to {{ $end_record }} of {{ $total_records }} entries.</p>
                    @endif

                    @if ($items instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ isset($items) ? $items->withQueryString()->links() : '' }}
                    @endif

                </div>


                {{-- </div> --}}
            </div>
        </div>


</section>
@endsection
