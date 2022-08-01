<?php return [
    'opening-hours' => [
        'monday' => ['09:00-12:00', '13:00-17:00'],
        'tuesday' => ['09:00-12:00', '13:00-17:00'],
        'wednesday' => ['09:00-12:00', '13:00-17:00'],
        'thursday' => ['09:00-12:00', '13:00-17:00'],
        'friday' => ['09:00-12:00', '13:00-17:00'],
        'saturday' => [],
        'sunday' => [],
        'exceptions' => [
            '01-01' => [], // Recurring on each 1st of january
            '12-25' => [], // Recurring on each 25th of december
        ],
    ],
    'holidaysAreClosed' => true,
    'holidays' => [
        'region' => 'asia/kuala_lumpur',
        // 'with' => [
        // 'boss-birthday' => '09-26',
        // 'last-monday'   => '= last Monday of October',
        // ],
    ],
];