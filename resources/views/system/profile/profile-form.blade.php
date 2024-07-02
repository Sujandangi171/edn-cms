@extends('system.layouts.show')

@section('title')
    <h3> <b>My Profile</b></h3>
@endsection
@section('content-first')
    <form action="{{ route('update-profile') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $item->id }}">
        {{-- Name --}}
        <x-system.input :input="[
            'name' => 'name',
            'label' => 'Name',
            'required' => true,
            'value' => $item->name ?? old('name'),
            'autofocus' => true,
        ]" />

        {{-- Username --}}
        <x-system.input :input="[
            'name' => 'username',
            'label' => 'Username',
            'required' => true,
            'value' => $item->username ?? old('username'),
        ]" />

        {{-- Email --}}
        <x-system.input :input="[
            'name' => 'email',
            'label' => 'Email',
            'required' => true,
            'value' => $item->email ?? old('email'),
        ]" />

        {{-- Contact --}}
        <x-system.input :input="[
            'name' => 'contact_number',
            'label' => 'Contact',
            'required' => true,
            'value' => $item->contact_number ?? old('contact_number'),
        ]" />

        {{-- DOB --}}
        <x-system.input :input="[
            'name' => 'dob',
            'placeholder' => 'YYYY-MM-DD',
            'label' => 'D.O.B',
            'id' => 'np_date',
            'required' => true,
            'value' => $item->dob ?? old('dob'),
        ]" />

        {{-- Gender --}}
        <x-system.radio :input="[
            'name' => 'gender',
            'required' => true,
            'label' => 'Gender',
            'options' => $gender,
            'value' => $item->gender ?? true,
        ]" />


        <div class="form-group row">
            <label for="" class="col-sm-2"></label>
            <div class="col-sm-2">
                <button class="btn btn-primary btn-sm" id="btnAdd"><i class="fas fa-recycle"></i>&nbsp Update</button>
            </div>
        </div>
    </form>
@endsection
