@extends('system.layouts.show')

@section('title')
    <h3> <b>Change Password</b></h3>
@endsection
@section('content-first')
    <form action="{{ route('update-password') }}" method="POST">
        @csrf

        {{-- Current Password --}}
        <x-system.input :input="[
            'name' => 'current_password',
            'label' => 'Current Password',
            'type' => 'password',
            'required' => true,
            'value' => $item->current_password ?? old('current_password'),
            'autofocus' => true,
        ]" />

        {{-- Password --}}
        <x-system.input :input="[
            'name' => 'password',
            'label' => 'Password',
            'type' => 'password',
            'required' => true,
            'value' => $item->password ?? old('password'),
        ]" />

        {{-- Change Password --}}
        <x-system.input :input="[
            'name' => 'confirm_password',
            'label' => 'Confirm Password',
            'type' => 'password',
            'required' => true,
            'value' => $item->confirm_password ?? old('confirm_password'),
            'autofocus' => true,
        ]" />

        <div class="form-group row">
            <label for="" class="col-sm-2"></label>
            <div class="col-sm-2">
                <button class="btn btn-primary btn-sm" id="btnAdd"><i class="fas fa-recycle"></i>&nbsp Update</button>
            </div>
        </div>
    </form>
@endsection
