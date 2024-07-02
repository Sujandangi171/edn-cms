@extends('system.layouts.show')

@section('back')
    <div class="card-tools">

        <a href="{{ asset('uploads/resumes/' . $item->files()->value('title')) }}" download class="btn btn-primary btn-sm"> <i
                class="fa fa-download"></i> Download</a>

        <a href="{{ url()->previous() }}" class="btn btn-info btn-sm"><i class="fas fa-chevron-left"></i>
            Back</a>
    </div>
@endsection

@section('title')
    <h3> Applicant Details</h3>
@endsection


@section('content-first-left')
    {{-- Name --}}
    <x-system.detail :input="[
        'label' => 'Name',
        'value' => $item->first_name . ' ' . $item->middle_name . ' ' . $item->last_name ?? 'N/A',
    ]" />

    {{-- Contact --}}
    <x-system.detail :input="[
        'label' => 'Contact',
        'value' => $item->phone_number ?? 'N/A',
    ]" />

    {{-- DOB --}}
    <x-system.detail :input="[
        'label' => 'D.O.B',
        'value' => $item->dob ?? 'N/A',
    ]" />

    {{-- Email --}}
    <x-system.detail :input="[
        'label' => 'Email',
        'value' => $item->email ?? 'N/A',
    ]" />


    {{-- Address --}}
    <x-system.detail :input="[
        'label' => 'Address',
        'value' =>
            $item->street .
            ', ' .
            $item->municipality->name .
            ', ' .
            $item->district->name .
            ', ' .
            $item->province->name .
            ', ' .
            $item->country,
    ]" />

    {{-- Applied For --}}
    <x-system.detail :input="[
        'label' => 'Applied For',
        'value' => $item->vacancy->title ?? 'N/A',
    ]" />

    {{-- Applied At --}}
    <x-system.detail :input="[
        'label' => 'Applied At',
        'value' => convertToTime($item->created_at) ?? 'N/A',
    ]" />
@endsection

@section('content-first-right')
    {{-- University --}}
    <x-system.detail :input="[
        'label' => 'University',
        'value' => isset($item->universityName) ? $item->universityName->title : $item->other_university_title ?? 'N/A',
    ]" />

    {{-- Course --}}
    <x-system.detail :input="[
        'label' => 'Course',
        'value' => $item->course ?? 'N/A',
    ]" />

    {{-- Github URL --}}
    <x-system.detail :input="[
        'label' => 'Github URL',
        'isLink' => $item->github_url ? true : false,
        'value' => $item->github_url ?? '-',
    ]" />

    {{-- Linked URL --}}
    <x-system.detail :input="[
        'label' => 'LinkedIn Url',
        'isLink' => $item->linkedin_url ? true : false,
        'value' => $item->linkedin_url ?? '-',
    ]" />

    {{-- Heard From --}}
    <x-system.detail :input="[
        'label' => 'Heard From?',
        'value' => $item->heard_about_us ?? '-',
    ]" />
@endsection
