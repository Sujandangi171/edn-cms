@extends('frontend.layouts.master')

@section('content')
    @include('frontend.vacancies.header')

    <section class="about__role">
        <div class="about">
            <div class="about__head">
                <h3>About the Role</h3>
                <p>{{ $vacancy->short_description }}</p>
            </div>

            <div class="career__description">
                {!! $vacancy->description !!}
            </div>

            <div class="apply__button">
                <a href="{{ url('vacancy/apply/' . $vacancy->slug) }}" class="btn btn-success btn-sm"
                    style="background-color: #24b14d; color: #FFFFFF; border:none"
                    onmouseover="this.style.backgroundColor='#4F5354'" onmouseout="this.style.backgroundColor='#24b14d'">Apply
                    Now</a>
            </div>
        </div>
        <br>


        @if (!$otherVacancies->empty())
            <div class="other__job">
                <h2>Other Job</h2>

                @foreach ($otherVacancies as $otherVacancy)
                    <p>
                        <a href="{{ route('frontend.vacancies.show', $otherVacancy->slug) }}">
                            {{ $otherVacancy->title }}
                        </a>
                    </p>

                    <div class="li__jobs">
                        <li>{{ getConfig('address') }} | {{ $otherVacancy->department }} |
                            {{ $otherVacancy->remainingDays }}
                            days remaining</li>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
