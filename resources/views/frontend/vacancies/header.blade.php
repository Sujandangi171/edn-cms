<section class="career_title">
    <div>
        <h3>{{ $vacancy->title ?? 'Send Us Your C.V' }}</h3>
        @if (isset($vacancy))
            <div class="li-details">
                <span style="margin-right: 10px;"> {{ getConfig('address') }} |</span>
                @if (isset($vacancy->remainingDays))
                    <span style="margin-right: 10px;"> {{ $vacancy->remainingDays }} days remaining</span>
                    <span style="margin-right: 10px;">| Opening Date:
                        {{ convertToDate($vacancy->created_at) }}
                    </span>
                    <span style="margin-right: 10px;">| Last Date: {{ $vacancy->due_date }} </span>
                @endif
            </div>
        @endif
    </div>
</section>
