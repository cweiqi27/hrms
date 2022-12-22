<?php
return [
// Sidebar Links
    'profileLinksCsv' => 'Profile,Edit,Security',
    'profileLinksHref' => [
        "0" => "staff.profile",
        "1" => "staff.edit",
        "2" => "staff.security",
    ],
    'monitorLinksCsv-admin' => 'Search Staff,Payroll,Attendance,Performance',
    'monitorLinksHref-admin' => [
        "0" => "search.staff",
        "1" => "payroll.show",
        "2" => "attendance.show",
        "3" => "performance.show",
    ],
    'monitorLinksCsv-employee' => 'Payroll,Attendance,Performance',
    'monitorLinksHref-employee' => [
        "0" => "payroll.show",
        "1" => "attendance.show",
        "2" => "performance.show",
    ],
    'taskLinksCsv-admin' => 'Create,Review',
    'taskLinksHref-admin' => [
        "0" => "task.create",
        "1" => "task.list",
    ],
    'taskLinksCsv-employee' => 'Task List',
    'taskLinksHref-employee' => [
        "0" => "task.list"
    ],
    'leaveLinksCsv-admin' => 'Apply leave,Leave status',
    'leaveLinksHref-admin' => [
        "0" => "leave.show",
        "1" => "leave.show"
    ],
    'leaveLinksCsv-employee' => 'Apply leave,Leave status',
    'leaveLinksHref-employee' => [
        "0" => "leave.create",
        "1" => "leave.show"
    ],
// Job positions and Base Salaries
    'itPositions' => [
        "Backend Developer" => "3200",
        "Data Scientist" => "3400",
        "DevOps Engineer" => "3600",
        "Frontend Developer" => "3000",
        "IT Support" => "2800",
        "Mobile Developer" => "3200",
        "Product Manager" => "4000",
        "Tech Lead" => "6000",
        "UI/UX Designer" => "3000",
    ],
    'financePositions' => [
        "Accountant" => "3500",
        "Auditor" => "3200",
        "Financial Analyst" => "3500",
        "Financial Controller" => "3300",
        "Portfolio Manager" => "4000",
    ],
    'hrPositions' => [
        "HR Coordinator" => "3800",
        "HR Director" => "4800",
        "HRIS" => "3400",
        "HR Manager" => "4000",
        "Recruiter" => "3000",
    ],
    'marketingPositions' => [
        "Communications Manager" => "3500",
        "Content Marketing Specialist" => "3000",
        "Creative Director" => "5000",
        "Digital Marketing Manager" => "3500",
        "Marketing Analyst" => "3000",
    ],
    // Malaysia Public Holidays Dates
    'publicHolidays' => [
        '2022-01-01',
        '2022-01-18',
        '2022-02-01',
        '2022-02-02',
        '2022-02-03',
        '2022-04-19',
        '2022-05-01',
        '2022-05-02',
        '2022-05-03',
        '2022-05-04',
        '2022-05-15',
        '2022-05-16',
        '2022-06-06',
        '2022-06-10',
        '2022-06-30',
        '2022-08-31',
        '2022-09-16',
        '2022-10-09',
        '2022-10-10',
        '2022-12-25',
        '2022-12-26',
    ]
];
