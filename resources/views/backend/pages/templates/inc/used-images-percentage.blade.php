@php
    $user = auth()->user();
    $latestPackage = activePackageHistory();
    
    $thisMonthAvailable = 0;
    $thisMonthUsed = 0;
    
    if (!is_null($latestPackage)) {
        $thisMonthAvailable = $latestPackage->this_month_available_images;
        $thisMonthUsed = $latestPackage->this_month_used_images;
    }
@endphp

<div class="d-flex justify-content-between w-100 mt-auto mb-2">
    <span class="fs-sm"><strong>{{ getUsedImagesPercentage() }}%
            {{ localize('Used') }}.</strong>
        {{ localize('Remaining Images') }}:
        <strong>{{ $thisMonthAvailable }}/{{ $thisMonthAvailable + $thisMonthUsed }}</strong></span>
</div>

<div class="progress mb-1 w-100" style="height: 6px;">
    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ getUsedImagesPercentage() }}%"
        aria-valuenow="{{ getUsedImagesPercentage() }}" aria-valuemin="0" aria-valuemax="100"></div>
</div>
