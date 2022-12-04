@php
    $now = \Carbon\Carbon::now();
    $period = \Carbon\CarbonPeriod::create($now->startOfYear(), \Carbon\Carbon::now());
    $dates = [];
    foreach($period as $date) {
        $dates[] = $date->format('Y-m-d');
    }
    $dates = array_merge($dates, config("shared_vars.publicHolidays"));

    $options = [
        'dateFormat' => 'Y-m-d',
        'enableTime' => false,
        'altFormat' =>  'j F Y',
        'altInput' => true,
        'disable' => $dates
    ];
@endphp

<div
    wire:ignore
>
    <div class="flex flex-col gap-2">
        <label>Date</label>
        <input
            x-data="{
                init() {
                    flatpickr(this.$refs.input, {{json_encode((object)$options)}});
                }
            }"
            x-ref="input"
            type="text"
            id="leave_date"
            name="leave_date"
            class="rounded border-2 border-slate-200 px-4 py-2"
        >
    </div>
</div>


