@extends('frontend.layouts.master')

@php
    $data = $vacancies->isEmpty();
@endphp

@section('content')
    <!-- hiring start -->


    <div class="hiring">


        <div class="head {{ $data ? 'd-none' : '' }}">
            <h3>WE ARE HIRING</h3>

        </div>


        @forelse ($vacancies as $vacancy)
            <div class="positions">
                <div class="positions__description">
                    <h3>{{ $vacancy->title }}</h3>
                    <div class="positions__description__border">
                        <div class="location">
                            <li style="margin-right: 10px;"> {{ getConfig('address') }} |</li>
                            <li style="margin-right: 10px;"> {{ $vacancy->department }} | </li>
                            <li> {{ $vacancy->remainingDays }} days remaining</li>
                        </div>
                        <p>{{ $vacancy->short_description }}
                        </p>
                        <a href="{{ route('frontend.vacancies.show', $vacancy->slug) }}" class="btn btn-success btn-sm"
                            style="background-color: #24b14d; color: #FFFFFF; border:none"
                            onmouseover="this.style.backgroundColor='#4F5354'"
                            onmouseout="this.style.backgroundColor='#24b14d'">View
                            More</a>
                    </div>
                </div>

                <div class="positions__vacancies">
                    <div class="vacancy-num">
                        <div class="title">
                            <h4>Openings</h4>
                            <h1>{{ $vacancy->no_of_openings }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-data-found">

                <h3>No {{ request()->vacancy_type == 2 ? 'Internships' : 'Jobs' }} found.</h3>
                <p>
                    Currently, we don't have any {{ request()->vacancy_type == 2 ? 'internships' : 'jobs' }} available.
                    However, feel free to drop your CV for future opportunities. We'll reach out to you when a suitable
                    position becomes available.

                </p>
                <a href="{{ route('frontend.vacancy.interested', request()->vacancy_type ?? '') }}"
                    class="btn btn-success btn-sm">Drop your CV</a>

            </div>
        @endforelse
    </div>

    {{ $vacancies }}
@endsection
