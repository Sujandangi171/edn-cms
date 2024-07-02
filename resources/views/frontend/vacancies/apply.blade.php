@extends('frontend.layouts.master')


@section('content')
    <!-- form starts -->
    @include('frontend.vacancies.header')

    <div class="apply">
        <div class="col-8">
            <div class="test">
                <div class="row" id="form-container">
                    <h3 class="apply">Apply For Job</h3>
                    <form action="{{ route('frontend.apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- First Row of Inputs -->
                        <div class="row mb-2">
                            <div class="col-lg-4 col">
                                <x-frontend.input :input="[
                                    'name' => 'first_name',
                                    'label' => 'First Name',
                                    'placeholder' => 'First Name',
                                    'required' => true,
                                    'value' => old('first_name') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-4">
                                <x-frontend.input :input="[
                                    'name' => 'middle_name',
                                    'label' => 'Middle Name',
                                    'placeholder' => 'Middle Name',
                                    'value' => old('middle_name') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-4">
                                <x-frontend.input :input="[
                                    'name' => 'last_name',
                                    'label' => 'Last Name',
                                    'placeholder' => 'Last Name',
                                    'required' => true,
                                    'value' => old('last_name') ?? '',
                                ]" />
                            </div>

                        </div>

                        <!-- Second Row of Inputs -->
                        <div class="row mb-2">

                            <div class="col-lg-6 ">
                                <x-frontend.select :input="[
                                    'name' => 'university_id',
                                    'label' => 'University',
                                    'options' => $universities ?? [],
                                    'required' => true,
                                    'value' => old('university_id'),
                                ]" />
                            </div>

                            <div class="col-lg-6  toggle-other d-none">
                                <x-frontend.input :input="[
                                    'name' => 'other_university_title',
                                    'label' => 'University Name',
                                    'placeholder' => 'University Name',
                                    'value' => old('other_university_title') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-6 ">
                                <x-frontend.input :input="[
                                    'type' => 'number',
                                    'id' => 'test',
                                    'label' => 'Phone Number',
                                    'name' => 'phone_number',
                                    'placeholder' => 'Phone Number',
                                    'required' => true,
                                    'value' => old('phone_number') ?? '',
                                ]" />
                            </div>
                            <div class="col-lg-6 ">
                                <x-frontend.input :input="[
                                    'name' => 'course',
                                    'placeholder' => 'CCNA, MCSA, NSE6-6, RHCA',
                                    'required' => true,
                                    'value' => old('course') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-6 ">
                                <x-frontend.input :input="[
                                    'label' => 'LinkedIn URL',
                                    'placeholder' => 'LinkedIn URL',
                                    'name' => 'linkedin_url',
                                    'value' => old('linkedin_url') ?? '',
                                ]" />
                            </div>



                        </div>

                        <!-- Third Row of Inputs -->
                        <div class="row mb-2">
                            <div class="col-lg-6 ">
                                <x-frontend.input :input="[
                                    'name' => 'email',
                                    'type' => 'email',
                                    'required' => true,
                                    'value' => old('email') ?? '',
                                ]" />
                            </div>


                            <div class="col-lg-6 ">
                                <x-frontend.input :input="[
                                    'label' => 'Github URL',
                                    'name' => 'github_url',
                                    'placeholder' => 'Github URL',
                                    // 'required' => true,
                                    'value' => old('github_url') ?? '',
                                ]" />
                            </div>

                        </div>

                        <!-- Fifth column -->
                        <div class="row mb-2">
                            <div class="col-lg-3">
                                <x-frontend.select :input="[
                                    'name' => 'province_id',
                                    'label' => 'Province',
                                    'options' => $provinces ?? [],
                                    'required' => true,
                                    'value' => old('province_id') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-3 ">
                                <x-frontend.select :input="[
                                    'name' => 'district_id',
                                    'label' => 'District',
                                    'options' => [],
                                    'required' => true,
                                    'value' => old('district_id') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-3 ">
                                <x-frontend.select :input="[
                                    'name' => 'municipality_id',
                                    'label' => 'Municipality',
                                    'options' => [],
                                    'required' => true,
                                    'value' => old('municipality_id') ?? '',
                                ]" />
                            </div>

                            <div class="col-lg-3 ">
                                <x-frontend.input :input="[
                                    'name' => 'street',
                                    'label' => 'Tole/Street',
                                    'placeholder' => 'Tole/Street',
                                    'required' => true,
                                    'value' => old('street') ?? '',
                                ]" />
                            </div>
                        </div>

                        <!-- Fourth Row of Inputs -->
                        <div class="row mb-2">
                            <div class="col-lg-6 ">
                                <x-frontend.input :input="[
                                    'name' => 'dob',
                                    'type' => 'date',
                                    'required' => true,
                                    'value' => old('dob') ?? '',
                                ]" />
                            </div>


                            {{-- CV Upload --}}
                            <div class="col-lg-6 ">
                                <label for="resume" class="form-label">Attachment/CV<span
                                        style="color: red;">*</span></label>
                                <input type="file" accept=".pdf" name="resume" id="demo-3" class="mt-3">
                                <div>
                                    @error('resume')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>



                        <!-- Sixth column -->
                        <div class="row mb-2">
                            <div class="col-lg-6 ">
                                <label for="resume" class="form-label">How did you hear about us?<span
                                        style="color: red;">*</span></label>
                                <div>
                                    <label>
                                        <input type="radio" id="heard_about_us_word_of_mouth" class="form-check-input"
                                            name="heard_about_us" value="Word of Mouth">
                                        Word of Mouth
                                    </label><br>
                                    <label>
                                        <input type="radio" id="heard_about_us_online_search" class="form-check-input"
                                            name="heard_about_us" value="Online Search">
                                        Online Search
                                    </label><br>
                                    <label>
                                        <input type="radio" id="heard_about_us_social_media" class="form-check-input"
                                            name="heard_about_us" value="Social Media">
                                        Social Media
                                    </label><br>
                                    <label>
                                        <input type="radio" id="heard_about_us_advertisement" class="form-check-input"
                                            name="heard_about_us" value="Advertisement">
                                        Advertisement
                                    </label><br>
                                    <label>
                                        <input type="radio" id="heard_about_us_other" class="form-check-input"
                                            name="heard_about_us" value="Other">
                                        Other
                                    </label>
                                </div>
                                <div>
                                    @error('heard_about_us')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <!-- Sixth column -->
                        {{-- <div class="row mb-2">
                            
                        </div> --}}

                        <div class="row mb-2">
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" name="is_agreed">
                                I agree to the <a href="">Terms of Use</a> and Privacy Policy of
                                {{ getConfig('cms-title') }}

                                <div>
                                    @error('is_agreed')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Seventh column -->
                        <div class="row mb-2">
                            <div class="col-lg-6 ">
                                <label for="resume">
                                    {!! NoCaptcha::display() !!}
                                    {!! NoCaptcha::renderJs() !!}
                                </label>
                            </div>
                            <div>
                                @error('g-recaptcha-response')
                                    <span class="text text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" value="{{ $vacancy->id ?? 0 }}" name="vacancy_id">

                        <!-- Buttons-->
                        <div style="margin-bottom: 20px">
                            <button type="submit" class="btn btn-success btn-sm"
                                style="background-color: #24b14d; color: #FFFFFF;"
                                onmouseover="this.style.backgroundColor='#4F5354'"
                                onmouseout="this.style.backgroundColor='#24b14d'">
                                Apply
                            </button>

                            {{-- <input type="reset" class="btn btn-secondary btn-sm"> --}}
                            <input type="reset" class="btn btn-secondary btn-sm"
                                style="background-color: #4F5354; color: #FFFFFF;"
                                onmouseover="this.style.backgroundColor='#24b14d'"
                                onmouseout="this.style.backgroundColor='#4F5354'">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (!$otherVacancies->empty())
            <div class="col-4">
                <div class="col">
                    <h3>Other Openings</h3>
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
            </div>
        @endif
    </div>
@endsection


@section('js')
    <script src="{{ asset('compiledCssAndJs/js/province.js') }}"></script>
    <script src="{{ asset('js/frontend/custom-file/js/bootstrap5filefield.js') }}"></script>

    <script>
        $(function() {
            $('#demo-3').bootstrap4FileField({
                label: 'Upload C.V',
                placeholder: 'Upload Your File',
            });
        });

        $(document).on('change', '#university_id', function() {
            let uniData = $(this).val();
            if (uniData == 0) {
                $('.toggle-other').removeClass('d-none');
                $('#other_university_title').focus();
            } else {
                $('.toggle-other').addClass('d-none');
            }
        })
    </script>
@endsection
