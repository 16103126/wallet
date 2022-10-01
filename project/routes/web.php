<?php

use App\Models\Deposit;
use App\Models\Currency;
use App\Models\Withdraw;
use App\Models\RequestMoney;
use App\Models\TransferMoney;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\User\TransferController;
use App\Http\Controllers\User\WithdrawController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Deposit\StripeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\User\RequestMoneyController;
use App\Http\Controllers\User\ProfileSettingController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\SmsController;
use App\Http\Controllers\Admin\WithdrawMethodController;
use App\Http\Controllers\Deposit\PaypalController;
use App\Http\Controllers\User\ReferralController as UserReferralController;
use App\Http\Controllers\User\TwoFactorVarificationCode;
use App\Http\Controllers\User\TwoFactorVarificationCodeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('register', [RegisterController::class, 'registerForm'])->name('register.form');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    Route::get('login', [LoginController::class, 'loginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('transaction/index', [TransactionController::class, 'index'])->name('transaction.index');

    Route::get('deposit/index', [App\Http\Controllers\Admin\DepositController::class, 'index'])->name('deposit.index');

    Route::get('withdraw/request', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawRequest'])->name('withdraw.request');
    Route::get('withdraw/complete', [App\Http\Controllers\Admin\WithdrawController::class, 'withdrawComplete'])->name('withdraw.complete');
    Route::get('withdraw/status/{id1}/{id2}', [App\Http\Controllers\Admin\WithdrawController::class, 'status'])->name('withdraw.status');

    Route::get('generalsetting/charge/edit', [GeneralSettingController::class, 'chargeSetting'])->name('charge.setting');
    Route::post('generalsetting/charge/update', [GeneralSettingController::class, 'updateChargeSetting'])->name('update.charge.setting');
    Route::get('generalsetting/min/amount/edit', [GeneralSettingController::class, 'minAmountSetting'])->name('min.amount.setting');
    Route::post('generalsetting/min/amount/update', [GeneralSettingController::class, 'updateMinAmount'])->name('update.min.amount');
    Route::get('generalsetting/max/amount/edit', [GeneralSettingController::class, 'maxAmountSetting'])->name('max.amount.setting');
    Route::post('generalsetting/max/amount/update', [GeneralSettingController::class, 'updateMaxAmount'])->name('update.max.amount');

    Route::get('referral/edit', [App\Http\Controllers\Admin\ReferralController::class, 'edit'])->name('referral.edit');
    Route::post('referral/update', [App\Http\Controllers\Admin\ReferralController::class, 'update'])->name('refferal.update');

    Route::get('user/list', [UserController::class, 'index'])->name('user.list');

    Route::get('profile/show', [App\Http\Controllers\Admin\ProfileSettingController::class, 'showProfile'])->name('profile.show');
    Route::post('profile/update', [App\Http\Controllers\Admin\ProfileSettingController::class, 'updateProfile'])->name('profile.update');

    Route::get('change/password', [App\Http\Controllers\Admin\ProfileSettingController::class, 'changePasswordForm'])->name('change.password.form');
    Route::post('change/password', [App\Http\Controllers\Admin\ProfileSettingController::class, 'updatePassword'])->name('password.update');

    Route::get('withdraw/method/index', [WithdrawMethodController::class, 'index'])->name('withdraw.method.index');
    Route::get('withdraw/method/create', [WithdrawMethodController::class, 'create'])->name('withdraw.method.create');
    Route::post('withdraw/method/store', [WithdrawMethodController::class, 'store'])->name('withdraw.method.store');
    Route::get('withdraw/method/edit/{id}', [WithdrawMethodController::class, 'edit'])->name('withdraw.method.edit');
    Route::post('withdraw/method/update/{id}', [WithdrawMethodController::class, 'update'])->name('withdraw.method.update');
    Route::get('withdraw/method/delete/{id}', [WithdrawMethodController::class, 'delete'])->name('withdraw.method.delete');

    Route::get('request/index', [App\Http\Controllers\Admin\RequestMoneyController::class, 'index'])->name('request.index');
    Route::get('request/setting', [App\Http\Controllers\Admin\RequestMoneyController::class, 'requestSetting'])->name('request.setting');
    Route::post('request/setting/update', [App\Http\Controllers\Admin\RequestMoneyController::class, 'requestSettingUpdate'])->name('request.setting.update');
    Route::get('request/details/{id}', [App\Http\Controllers\Admin\RequestMoneyController::class, 'details'])->name('request.details');

    Route::get('currency/create', [CurrencyController::class, 'create'])->name('currency.create');
    Route::post('currency/store', [CurrencyController::class, 'store'])->name('currency.store');
    Route::get('currency/index', [CurrencyController::class, 'index'])->name('currency.index');
    Route::get('currency/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
    Route::post('currency/update/{id}', [CurrencyController::class, 'update'])->name('currency.update');
    Route::get('currency/delete/{id}', [CurrencyController::class, 'delete'])->name('currency.delete');
    Route::get('currency/status/{id1}/{id2}', [CurrencyController::class, 'status'])->name('currency.status');

    Route::get('payment/create', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');

    Route::get('mail/create', [EmailController::class, 'create'])->name('email.create');
    Route::post('mail/store', [EmailController::class, 'store'])->name('email.store');

    Route::get('sms/create', [SmsController::class, 'create'])->name('sms.create');
    Route::post('sms/store', [SmsController::class, 'store'])->name('sms.store');
    Route::get('send/sms', [SmsController::class, 'sendSms'])->name('send.sms');

});

Route::group(['prefix' => 'user', 'as' => 'user.'], function(){

    Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('register', [App\Http\Controllers\User\RegisterController::class, 'registerForm'])->name('register.form');
    Route::post('register', [App\Http\Controllers\User\RegisterController::class, 'register'])->name('register');

    Route::get('login', [App\Http\Controllers\User\LoginController::class, 'loginForm'])->name('login.form');
    Route::post('login', [App\Http\Controllers\User\LoginController::class, 'login'])->name('login');
    Route::get('logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('logout');

    Route::get('login/two/factor/varification', [TwoFactorVarificationCodeController::class, 'twoFactorVarification'])->name('two.factor.varification');
    Route::get('login/two/factor/varification/check', [TwoFactorVarificationCodeController::class, 'twoFactorVarificationCheck'])->name('two.factor.varification.check');
    Route::get('login/two/factor/varification/on', [TwoFactorVarificationCodeController::class, 'twoFactorVarificationOn'])->name('two.factor.varification.on');
    Route::get('login/two/factor/varification/off', [TwoFactorVarificationCodeController::class, 'twoFactorVarificationOff'])->name('two.factor.varification.off');
    Route::get('login/two/factor/password/check', [TwoFactorVarificationCodeController::class, 'twoFactorPasswordCheck'])->name('two.factor.password.check');

    Route::get('transfer/money/index', [TransferController::class, 'index'])->name('transfer.index');
    Route::get('transfer/money', [TransferController::class, 'create'])->name('transfer.create');
    Route::post('transfer/money/store', [TransferController::class, 'store'])->name('transfer.store');

    Route::get('deposit/index', [DepositController::class, 'index'])->name('deposit.index');
    Route::get('deposit/create', [DepositController::class, 'create'])->name('deposit.create');
    Route::post('deposit/store', [DepositController::class, 'store'])->name('deposit.store');
    
    Route::post('deposit/stripe/store', [StripeController::class, 'store'])->name('deposit.stripe.store');

    Route::get('withdraw/index', [WithdrawController::class, 'index'])->name('withdraw.index');
    Route::get('withdraw/create', [WithdrawController::class, 'create'])->name('withdraw.create');
    Route::post('withdraw/store', [WithdrawController::class, 'store'])->name('withdraw.store');

    Route::get('transaction/index', [App\Http\Controllers\User\TransactionController::class, 'index'])->name('transaction.index');
    
    Route::get('referral/index', [App\Http\Controllers\User\ReferralController::class, 'index'])->name('referral.index');

    Route::get('profile/show', [ProfileSettingController::class, 'showProfile'])->name('profile.show');
    Route::post('profile/update', [ProfileSettingController::class, 'updateProfile'])->name('profile.update');

    Route::get('change/password', [App\Http\Controllers\User\ProfileSettingController::class, 'changePasswordForm'])->name('change.password.form');
    Route::post('change/password', [App\Http\Controllers\User\ProfileSettingController::class, 'updatePassword'])->name('password.update');
    
    Route::get('sent/request/list', [RequestMoneyController::class, 'sentRequestList'])->name('sent.request.list');
    Route::get('money/request/list', [RequestMoneyController::class, 'moneyRequestList'])->name('money.request.list');
    Route::get('request/money', [RequestMoneyController::class, 'create'])->name('request.money.create');
    Route::post('request/money/store', [RequestMoneyController::class, 'store'])->name('request.money.store');
    Route::get('request/status/{id1}/{id2}', [RequestMoneyController::class, 'status'])->name('request.status');
    Route::get('request/details/{id}', [RequestMoneyController::class, 'details'])->name('request.details');

});

