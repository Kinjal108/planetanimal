<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AndroidApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});
// API v1 routes
Route::prefix('v1')->group(function () {

    Route::get('/', [AndroidApiController::class, 'index']);
    Route::post('app_details', [AndroidApiController::class, 'app_details']);
    Route::post('player_settings', [AndroidApiController::class, 'player_settings']);
    Route::post('payment_settings', [AndroidApiController::class, 'payment_settings']);

    Route::post('login', [AndroidApiController::class, 'postLogin']);
    Route::post('signup', [AndroidApiController::class, 'postSignup']);
    Route::post('logout', [AndroidApiController::class, 'logout']);

    Route::post('login_social', [AndroidApiController::class, 'postSocialLogin']);
    Route::post('forgot_password', [AndroidApiController::class, 'forgot_password']);

    Route::post('dashboard', [AndroidApiController::class, 'dashboard']);
    Route::post('profile', [AndroidApiController::class, 'profile']);
    Route::post('profile_update', [AndroidApiController::class, 'profile_update']);
    Route::post('account_delete', [AndroidApiController::class, 'account_delete']);

    Route::post('check_user_plan', [AndroidApiController::class, 'check_user_plan']);
    Route::post('subscription_plan', [AndroidApiController::class, 'subscription_plan']);
    Route::post('transaction_add', [AndroidApiController::class, 'transaction_add']);

    Route::post('home', [AndroidApiController::class, 'home']);
    Route::post('home_collections', [AndroidApiController::class, 'home_collections']);
    Route::post('languages', [AndroidApiController::class, 'languages']);
    Route::post('genres', [AndroidApiController::class, 'genres']);

    Route::post('shows', [AndroidApiController::class, 'shows']);
    Route::post('shows_by_language', [AndroidApiController::class, 'shows_by_language']);
    Route::post('shows_by_genre', [AndroidApiController::class, 'shows_by_genre']);
    Route::post('show_details', [AndroidApiController::class, 'show_details']);
    Route::post('seasons', [AndroidApiController::class, 'seasons']);
    Route::post('episodes', [AndroidApiController::class, 'episodes']);
    Route::post('episodes_recently_watched', [AndroidApiController::class, 'episodes_recently_watched']);

    Route::post('movies', [AndroidApiController::class, 'movies']);
    Route::post('movies_by_language', [AndroidApiController::class, 'movies_by_language']);
    Route::post('movies_by_genre', [AndroidApiController::class, 'movies_by_genre']);
    Route::post('movies_details', [AndroidApiController::class, 'movies_details']);

    Route::post('sports_category', [AndroidApiController::class, 'sports_category']);
    Route::post('sports', [AndroidApiController::class, 'sports']);
    Route::post('sports_by_category', [AndroidApiController::class, 'sports_by_category']);
    Route::post('sports_details', [AndroidApiController::class, 'sports_details']);

    Route::post('livetv_category', [AndroidApiController::class, 'livetv_category']);
    Route::post('livetv', [AndroidApiController::class, 'livetv']);
    Route::post('livetv_by_category', [AndroidApiController::class, 'livetv_by_category']);
    Route::post('livetv_details', [AndroidApiController::class, 'livetv_details']);

    Route::post('search', [AndroidApiController::class, 'search']);

    Route::post('my_watchlist', [AndroidApiController::class, 'my_watchlist']);
    Route::post('watchlist_add', [AndroidApiController::class, 'watchlist_add']);
    Route::post('watchlist_remove', [AndroidApiController::class, 'watchlist_remove']);

    Route::post('apply_coupon_code', [AndroidApiController::class, 'apply_coupon_code']);

    Route::post('actor_details', [AndroidApiController::class, 'actor_details']);
    Route::post('director_details', [AndroidApiController::class, 'director_details']);

    Route::post('stripe_token_get', [AndroidApiController::class, 'stripe_token_get']);
    Route::post('get_braintree_token', [AndroidApiController::class, 'get_braintree_token']);
    Route::post('braintree_checkout', [AndroidApiController::class, 'braintree_checkout']);
    Route::post('get_paytm_token_id', [AndroidApiController::class, 'create_paytm_token']);
    Route::post('get_cashfree_token', [AndroidApiController::class, 'get_cashfree_token']);
    Route::post('get_payu_hash_new', [AndroidApiController::class, 'payUmoneyHashGenerator_New']);
    Route::post('coingate_pay', [AndroidApiController::class, 'coingate_pay']);
    Route::post('coingate_payment_status', [AndroidApiController::class, 'coingate_payment_status']);
    Route::post('mollie_pay', [AndroidApiController::class, 'mollie_pay']);
    Route::post('mollie_payment_status', [AndroidApiController::class, 'mollie_payment_status']);
    Route::post('paystack_token_get', [AndroidApiController::class, 'paystack_token_get']);

    Route::get('user_device_limit_reached', [AndroidApiController::class, 'user_device_limit_reached']);
    Route::get('user_active_device_list', [AndroidApiController::class, 'user_active_device_list']);
    Route::get('logout_user_remotely', [AndroidApiController::class, 'logout_user_remotely']);
    Route::get('check_user_remotely_logout_or_not', [AndroidApiController::class, 'check_user_remotely_logout_or_not']);

    // New Filters
    Route::post('lang_genre_cat_list', [AndroidApiController::class, 'lang_genre_cat_list']);
    Route::post('movies_filter', [AndroidApiController::class, 'movies_filter']);
    Route::post('shows_filter', [AndroidApiController::class, 'shows_filter']);
    Route::post('sports_filter', [AndroidApiController::class, 'sports_filter']);
    Route::post('livetv_filter', [AndroidApiController::class, 'livetv_filter']);
});
