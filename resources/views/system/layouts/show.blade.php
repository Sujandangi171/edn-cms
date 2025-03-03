@extends('system.layouts.master')


@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card ml-2 mr-2">
                    <div class="card-header">
                        <div class="card-title">
                        @section('title')
                            <h3> {{ $moduleName }} Details</h3>
                        @show
                    </div>



                    @section('back')
                        <div class="card-tools">
                            <a href="{{ url()->previous() }}" class="btn btn-info btn-sm"><i class="fas fa-chevron-left"></i>
                                Back</a>
                        </div>
                    @show
                </div>

                <div class="card-body">
                    @error('msg')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    @error('success')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    @yield('content-first-title')
                    <div class="row">
                        <div class="col-12">
                            @yield('content-first')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            @yield('content-first-left')
                        </div>
                        <div class="col-6">
                            @yield('content-first-right')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            @yield('content-second')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            @yield('content-third')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            @yield('content-fourth')
                        </div>
                    </div>
                </div>



            </div>
        </div>
</section>
@endsection
