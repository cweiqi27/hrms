<?php
return [
    'profileLinksCsv' => 'Profile,Edit,Security',
    'profileLinksHref' => [
        "0" => "staff.profile",
        "1" => "staff.edit",
        "2" => "staff.security",
    ],
    'monitorLinksCsv-admin' => 'Search Staff,Payroll,Attendance,Performance',
    'monitorLinksHref-admin' => [
        "0" => "search.staff",
        "1" => "home",
        "2" => "monitor.show",
        "3" => "leave.show",
    ],
    'taskLinksCsv-admin' => 'Create,Review',
    'taskLinksHref-admin' => [
        "0" => "task.create",
        "1" => "task.list",
    ],
    'taskLinksCsv-employee' => 'Create,Review',
    'taskLinksHref-employee' => [
        "0" => "task.create",
        "1" => "monitor.show",
    ],
    'monitorLinksCsv-employee' => 'Performance,Payroll',
    'monitorLinksHref-employee' => [
        "0" => "task.create",
        "1" => "task.show",
    ],
];
