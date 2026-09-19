<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DateMatrixController;
use App\Http\Controllers\ReEmergenceController;
use App\Http\Controllers\VolumeGainersController;
use App\Http\Controllers\TradingEngineController;
use App\Http\Controllers\RiskCalculatorController;
use App\Http\Controllers\TradeJournalController;
use App\Http\Controllers\StrategySimulationController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

// Momentum Dashboard (Public Free Access)
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index']);

// User Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Profile & Subscription Management (Authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/profile/switch-tier', [AuthController::class, 'switchTierDev'])->name('profile.switch-tier');
});

// Admin Subscription Analytics & User Management Panel
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/subscriptions', [AdminController::class, 'index'])->name('admin.subscriptions');
    Route::post('/users/{user}/update-tier', [AdminController::class, 'updateUserTier'])->name('admin.users.update-tier');
    Route::get('/export-transactions', [AdminController::class, 'exportTransactionsCsv'])->name('admin.export-transactions');
});

// Pricing & Subscription Landing Page (Public)
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
Route::get('/pricing/checkout', [PricingController::class, 'checkout'])->name('pricing.checkout');

// Payment Gateway Processing
Route::post('/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
Route::post('/payment/webhook', [PaymentController::class, 'webhook'])->name('payment.webhook');

// Starter Tier Facilities (₹999/mo or Free Trial)
Route::get('/volume-gainers', [VolumeGainersController::class, 'index'])->name('volume-gainers.index');
Route::get('/risk-calculator', [RiskCalculatorController::class, 'index'])->name('risk-calculator.index');

Route::prefix('date-matrix')->group(function () {
    Route::get('/', [DateMatrixController::class, 'index'])->name('date-matrix.index');
    Route::get('/export', [DateMatrixController::class, 'exportCsv'])->name('date-matrix.export');
});

Route::prefix('trade-journal')->group(function () {
    Route::get('/', [TradeJournalController::class, 'index'])->name('journal.index');
    Route::post('/', [TradeJournalController::class, 'store'])->name('journal.store');
    Route::put('/{id}', [TradeJournalController::class, 'update'])->name('journal.update');
    Route::delete('/{id}', [TradeJournalController::class, 'destroy'])->name('journal.destroy');
});

// Pro Tier Facilities (₹2,499/mo)
Route::prefix('re-emergence')->group(function () {
    Route::get('/', [ReEmergenceController::class, 'index'])->name('re-emergence.index');
    Route::get('/export', [ReEmergenceController::class, 'exportCsv'])->name('re-emergence.export');
});

Route::prefix('trading-engine')->group(function () {
    Route::get('/candidates', [TradingEngineController::class, 'candidates'])->name('trading-engine.candidates');
    Route::get('/avoid', [TradingEngineController::class, 'avoidList'])->name('trading-engine.avoid');
    Route::get('/patterns', [TradingEngineController::class, 'patterns'])->name('trading-engine.patterns');
});

// Elite Tier Facilities (₹4,999/mo) - Quantitative Simulations & Forward Testing
Route::prefix('strategy-simulation')->group(function () {
    Route::get('/', [StrategySimulationController::class, 'index'])->name('strategy-simulation.index');
    Route::post('/forward-test-journal', [StrategySimulationController::class, 'forwardTestJournal'])->name('strategy-simulation.forward-test-journal');
    Route::get('/export', [StrategySimulationController::class, 'exportCsv'])->name('strategy-simulation.export');
});

// Data Archives Manager & Raw File Inspector
Route::prefix('archives')->group(function () {
    Route::get('/', [ArchiveController::class, 'index'])->name('archives.index');
    Route::get('/{date}/raw/{type}', [ArchiveController::class, 'viewFile'])->name('archives.raw');
    Route::post('/{date}/re-analyze', [ArchiveController::class, 'reAnalyze'])->name('archives.reanalyze');
});

// Quick Action AJAX Endpoints for GUI Header Buttons & Timeline Lookups
Route::prefix('api')->group(function () {
    Route::post('/trigger-download', [ApiController::class, 'triggerDownload']);
    Route::post('/trigger-vg-snapshot', [ApiController::class, 'triggerVgSnapshot']);
    Route::get('/stock-timeline/{symbol}', [ApiController::class, 'stockTimeline'])->name('api.stock-timeline');
    Route::get('/system/sync-status', [ApiController::class, 'getSystemSyncStatus'])->name('api.sync-status');
    Route::post('/system/global-sync', [ApiController::class, 'triggerGlobalSync'])->name('api.global-sync');
});
