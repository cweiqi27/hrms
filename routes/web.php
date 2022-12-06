<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClockInController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Register
Route::controller(RegisterController::class)->group(function () {
    Route::middleware("guest")->group(function () {
        Route::get("/register/employee", "createEmployee")->name(
            "register.employee"
        );
        Route::get("/register/admin", "createAdmin")->name("register.admin");
    });

    Route::post("/register/store/{role}", "store")->name("register.store");
});

// Email verification
Route::get("/email/verify", [AuthController::class, "verify"])
    ->middleware(["auth", "unverified"])
    ->name("verification.notice");
Route::get("/email/verify/{id}/{hash}", [
    AuthController::class,
    "verifyHandler",
])
    ->middleware(["auth", "unverified", "signed"])
    ->name("verification.verify");
Route::post("/email/verification-notification", [
    AuthController::class,
    "resend",
])
    ->middleware(["auth", "throttle:6,1"])
    ->name("verification.resend");

// Login
Route::get("/login", [LoginController::class, "login"])
    ->middleware("guest")
    ->name("login");
Route::post("/authenticate", [LoginController::class, "authenticate"])
    ->middleware("guest")
    ->name("authenticate");
Route::post("/logout", [LoginController::class, "logout"])
    ->middleware("auth")
    ->name("logout");

// Password reset / confirmation
Route::controller(AuthController::class)->group(function () {
    Route::middleware("guest")->group(function() {
        Route::get("/forgot-password", "forgot")->name("password.request");
        Route::post("/forgot-password", "forgotHandler")->name("password.email");
        Route::get("/reset-password/{token}", "reset")->name("password.reset");
        Route::post("/reset-password", "resetHandler")->name("password.update");
    });
    Route::middleware("auth")->group(function() {
        Route::get("/confirm-password", "confirm")->name("password.confirm");
        Route::post("/confirm-password", "confirmHandler")
            ->middleware("throttle:6,1")
            ->name("password.confirm-password");
    });
});


// Staff
Route::controller(StaffController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get("/", "home")->name("home");
        Route::get("/staff/profile", "profile")->name("staff.profile");
        Route::post("/staff/security", "updatePassword")->name("staff.update-password");
        Route::middleware("password.confirm")->group(function() {
            Route::get("/staff/security", "security")
                ->name("staff.security");
            Route::get("/staff/edit", "edit")
                ->name("staff.edit");
            Route::post("/staff/edit", "update")
                ->name("staff.update");
        });
    });
});

// Monitor
Route::controller(MonitorController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get("/monitor", "show")->name("monitor.show");
        Route::get("/staff/{staff}", "showStaff")->name("monitor.show-staff");
        Route::get("/staff/{staff}/edit", "editStaff")->name("monitor.edit-staff");
        Route::post("/staff/{staff}/edit", "updateStaff")->name("monitor.update-staff");
    });
});

// Search
Route::controller(SearchController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get("/search/staff", "searchStaff")->name("search.staff");
        Route::any("/search/staff/get", "searchStaffGet")->name(
            "search.staff.get"
        );
        Route::any("/search/staff/all", "searchStaffAll")->name(
            "search.staff.all"
        );
    });
});

// Clock In
Route::controller(ClockInController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::post("/clock-in", "clockIn")->name("clockin");
        Route::any("/clock-out", "clockOut")->name("clockout");
    });
});

// Leave
Route::controller(LeaveController::class)->group(function() {
    Route::middleware(["auth", "verified"])->group(function() {
        Route::get("/leave", [LeaveController::class, "show"])->name("leave.show");
        Route::get("/leave/create", [LeaveController::class, "create"])->name("leave.create");
        Route::post("/leave/create/store", [LeaveController::class, "store"])->name("leave.store");
        Route::get("/leave/get", [LeaveController::class, "getLeave"])->name("leave.get");
        Route::get("/leave/manage/admin", [LeaveController::class, "manageLeaveAdmin"])->name("leave.admin-manage");
        Route::get("/leave/manage/staff", [LeaveController::class, "manageLeaveStaff"])->name("leave.staff-manage");
        Route::post("/leave/manage/staff", [LeaveController::class, "update"])->name("leave.update");
    });
});


// Task
Route::controller(TaskController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get("/task", "show")->name("task.show");
        Route::get("/task/create", "create")->name("task.create");
        Route::post("/task/create", "store")->name("task.store");
        Route::get("/task/list", "list")->name("task.list");
        Route::get("/task/list/get", "listGet")->name("task.list-get");
        Route::post("/task/list/get", "update")->name("task.update");
        Route::post("/task/list", "delete")->name("task.delete");
    });
});

// Payroll
Route::controller(PayrollController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function() {
        Route::get("/payroll", "show")->name("payroll.show");
        Route::get("/payroll/get", "getPay")->name("payroll.get");
        Route::post("/payroll/get", "updatePay")->name("payroll.update");
    }) ;
});

// Attendance
Route::controller(AttendanceController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function() {
        Route::any("/attendance", "show")->name("attendance.show");
        Route::get("/attendance/get", "getAttendance")->name("attendance.get");
    });
});
