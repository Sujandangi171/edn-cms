@extends('system.layouts.form')

@section('form')
<input type="hidden" name="id" value="{{ $item->id ?? '' }}">

{{-- Title --}}
<x-system.select :input="[
        'name' => 'role_id',
        'required' => true,
        'label' => 'Select Role',
        'options' => $roles ?? [],
        'value' => $item->role_id ?? old('role_id'),
    ]" />


<x-system.input :input="[
        'name' => 'name',
        'label' => 'Name',
        'required' => true,
        'value' => $item->name ?? old('name'),
    ]" />

<x-system.input :input="[
        'name' => 'username',
        'label' => 'Username',
        'required' => true,
        'value' => $item->username ?? old('username'),
    ]" />

<x-system.input :input="[
        'name' => 'email',
        'label' => 'Email',
        'required' => true, 
        'value' => $item->email ?? old('email'),
    ]" />

<x-system.radio :input="[
        'name' => 'status',
        'required' => true,
        'label' => 'Status',
        'options' => $status,
        'value' => $item->status ?? true,
    ]" />
@endsection