<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Governance-Controlled Routes
|--------------------------------------------------------------------------
|
| All routes below are protected by ExecutionGateMiddleware which enforces:
| - Capability resolution and validation
| - Authorization (delegation chain verification)
| - Billing eligibility checks
| - Audit logging
|
| Controllers should contain ONLY business logic.
|
*/

Route::middleware('execution.gate')->group(function () {
    // Capability: urn:saas:capability:example.feature.hello
    Route::get('/api/hello', HelloController::class)->name('capability.example.feature.hello');
});