@extends('system.layouts.master')

@section('content')
    <section class="content">
        <div class="card ml-3 mr-3">
            <div class="card-header">

                @if ($errors->has('serverError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="test">
                    <h3 class="card-title card-primary">
                        {{ isset($item) ? 'Update' : 'Create' }} {{ $moduleName }}
                    </h3>

                    <div class="card-tools">
                        @if (checkPermission($indexUrl, 'GET'))
                            <a href="{{ route($indexUrl . '.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fa fa-list"></i>
                                {{ 'List' }}</a>
                        @endif
                        <a href="{{ url()->previous() }}" class="btn btn-info btn-sm"><i class="fas fa-chevron-left"></i>
                            Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form class="form-horizontal" method="POST"
                    action="{{ isset($item) ? route($indexUrl . '.update', $item->id) : route($indexUrl . '.store') }}"
                    enctype="multipart/form-data" autocomplete="off">

                    @if (isset($item))
                        @method('PUT')
                    @endif
                    @csrf
                    @yield('form')
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit"
                                class="btn {{ isset($item) ? 'btn-primary' : 'btn-success' }} btn-sm mr-1 submit-button"> <i
                                    class="fas  {{ isset($item) ? 'fa-recycle' : 'fa-plus' }}"></i>
                                {{ isset($item) ? 'Update' : 'Save' }}</button>
                            <button type="reset" class="btn btn-info btn-sm"><i class="fas fa-times"></i>
                                {{ 'Clear' }}</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.card -->

    </section>

    <section class="content">
        @yield('index')
    </section>
@endsection
