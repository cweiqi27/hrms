<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ClockInController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\RegisterController;

// Register
Route::controller(RegisterController::class)->group(function () {
    Route::middleware("guest")->group(function () {
        Route::get("/register-employee", "createEmployee")->name(
            "register.employee"
        );
        Route::get("/register-admin", "createAdmin")->name("register.admin");
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

// Password reset
Route::get("/forgot-password", [AuthController::class, "forgot"])
    ->middleware("guest")
    ->name("password.request");
Route::post("/forgot-password", [AuthController::class, "forgotHandler"])
    ->middleware("guest")
    ->name("password.email");
Route::get("/reset-password/{token}", [AuthController::class, "reset"])
    ->middleware("guest")
    ->name("password.reset");
Route::post("/reset-password", [AuthController::class, "resetHandler"])
    ->middleware("guest")
    ->name("password.update");

// Staff / Home
Route::controller(StaffController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get("/", "home")->name("home");
        Route::get("/staff/profile", "profile")->name("staff.profile");
        Route::get("/staff/{name}", "show")->name("staff.show");
    });
});

// Monitor
Route::controller(MonitorController::class)->group(function () {
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get("/monitor", "show")->name("monitor.show");
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
        Route::post("/clock-in", "clockIn")->name("clockin.show");
        Route::get("/clock-out", "clockOut")->name("clockin.show");
    });
});

// Leave
Route::get("/leave", [LeaveController::class, "show"])
    ->middleware(["auth", "verified"])
    ->name("leave.show");
