    <?php

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\Auth\GoogleController;
    use App\Http\Controllers\Auth\FacebookController;

    use App\Http\Controllers\IndexController;
    use App\Http\Controllers\EarthlingController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\Auth\ForgotPasswordController;
    use App\Http\Controllers\PagesController;
    use App\Http\Controllers\StripeController;
    use App\Http\Controllers\MoviesController;
    use App\Http\Controllers\ShowsController;
    use App\Http\Controllers\LiveTvController;
    use App\Http\Controllers\LanguageController;
    use App\Http\Controllers\GenresController;
    use App\Http\Controllers\ActorDirectorController;
    use App\Http\Controllers\RazorpayController;
    use App\Http\Controllers\PaystackController;
    use App\Http\Controllers\PayuController;
    use App\Http\Controllers\InstamojoController;
    use App\Http\Controllers\MollieController;
    use App\Http\Controllers\FlutterwaveController;
    use App\Http\Controllers\PaytmController;
    use App\Http\Controllers\CashfreeController;
    use App\Http\Controllers\CoingateController;
    use App\Http\Controllers\SslcommerzController;
    use App\Http\Controllers\CinetpayController;

    use App\Http\Controllers\Admin\AdminController;
    use App\Http\Controllers\Admin\IndexController as AdminIndexController;
    use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
    use App\Http\Controllers\Admin\LanguageController as AdminLanguageController;
    use App\Http\Controllers\Admin\ActionsController as AdminActionsController;
    use App\Http\Controllers\Admin\GenresController as AdminGenresController;
    use App\Http\Controllers\Admin\MoviesController as AdminMoviesController;
    use App\Http\Controllers\Admin\EarthlingCategoryController as AdminEarthlingCategoryController;
    use App\Http\Controllers\Admin\EarthlingController as AdminEarthlingController;
    use App\Http\Controllers\Admin\ActorController as AdminActorController;
    use App\Http\Controllers\Admin\DirectorController as AdminDirectorController;
    use App\Http\Controllers\Admin\SliderController as AdminSliderController;
    use App\Http\Controllers\Admin\HomeSectionsController as AdminHomeSectionsController;
    use App\Http\Controllers\Admin\UsersController as AdminUsersController;
    use App\Http\Controllers\Admin\SubscriptionPlanController as AdminSubscriptionPlanController;
    use App\Http\Controllers\Admin\CouponsController as AdminCouponsController;
    use App\Http\Controllers\Admin\PaymentGatewayController as AdminPaymentGatewayController;
    use App\Http\Controllers\Admin\TransactionsController as AdminTransactionsController;
    use App\Http\Controllers\Admin\PagesController as AdminPagesController;
    use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
    use App\Http\Controllers\Admin\SettingsPlayerController as AdminSettingsPlayerController;
    use App\Http\Controllers\Admin\SettingsAndroidAppController as AdminSettingsAndroidAppController;
    use App\Http\Controllers\Admin\AppAdsController as AdminAppAdsController;
    use App\Http\Controllers\Admin\TvCategoryController as AdminTvCategoryController;
    use App\Http\Controllers\Admin\LiveTvController as AdminLiveTvController;
    use App\Http\Controllers\Admin\EpisodesController as AdminEpisodesController;
    use App\Http\Controllers\Admin\SeasonController as AdminSeasonController;
    use App\Http\Controllers\Admin\SeriesController as AdminSeriesController;
    use App\Http\Controllers\Admin\ImportImdbController as AdminImportImdbController;
    use App\Http\Controllers\Admin\ImportImdbShowController as AdminImportImdbShowController;


    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/test-cookie', function () {
        $minutes = 10;
        Cookie::queue('test_cookie', 'working_cookie', $minutes);
        return response()->json(['message' => 'Cookie set']);
    });

    Route::get('/get-cookie', function () {
        return response()->json(['cookie_value' => request()->cookie('test_cookie')]);
    });
    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminIndexController::class, 'index']);
        Route::post('login', [AdminIndexController::class, 'postLogin']);
        Route::get('logout', [AdminIndexController::class, 'logout']);
       
        Route::get('dashboard', [AdminDashboardController::class, 'index']);
        Route::get('cache', [AdminDashboardController::class, 'cache']);
        
        Route::get('verify_purchase', [AdminController::class, 'verify_purchase']);
   
        Route::get('language', [AdminLanguageController::class, 'languag_list']);
        Route::get('language/add_language', [AdminLanguageController::class, 'addLanguage']);
        Route::get('language/edit_language/{id}', [AdminLanguageController::class, 'editLanguage']);
        Route::post('language/add_edit_language', [AdminLanguageController::class, 'addnew']);
        Route::get('language/delete/{id}', [AdminLanguageController::class, 'delete']);
        
        Route::post('ajax_delete', [AdminActionsController::class, 'ajax_delete']);
        Route::post('ajax_status', [AdminActionsController::class, 'ajax_status']);

      
        Route::get('genres', [AdminGenresController::class, 'genres_list']);
        Route::get('genres/add_genre', [AdminGenresController::class, 'addGenre']);
        Route::get('genres/edit_genre/{id}', [AdminGenresController::class, 'editGenre']);
        Route::post('genres/add_edit_genre', [AdminGenresController::class, 'addnew']);
        Route::get('genres/delete/{id}', [AdminGenresController::class, 'delete']);

        // Movies routes
        Route::get('movies', [AdminMoviesController::class, 'movies_list']);
        Route::get('movies/add_movie', [AdminMoviesController::class, 'addMovie']);
        Route::get('movies/edit_movie/{id}', [AdminMoviesController::class, 'editMovie']);
        Route::post('movies/add_edit_movie', [AdminMoviesController::class, 'addnew']);
        Route::get('movies/delete/{id}', [AdminMoviesController::class, 'delete']);

        Route::get('earthling_category', [AdminEarthlingCategoryController::class, 'category_list']);
        Route::get('earthling_category/add_category', [AdminEarthlingCategoryController::class, 'addCategory']);
        Route::get('earthling_category/edit_category/{id}', [AdminEarthlingCategoryController::class, 'editCategory']);
        Route::post('earthling_category/add_edit_category', [AdminEarthlingCategoryController::class, 'addnew']);
        Route::get('earthling_category/delete/{id}', [AdminEarthlingCategoryController::class, 'delete']);
        
        Route::get('earthling', [AdminEarthlingController::class, 'earthling_video_list']);
        Route::get('earthling/add_video', [AdminEarthlingController::class, 'addVideo']);
        Route::get('earthling/edit_video/{id}', [AdminEarthlingController::class, 'editVideo']);
        Route::post('earthling/add_edit_video', [AdminEarthlingController::class, 'addnew']);
        Route::get('earthling/delete/{id}', [AdminEarthlingController::class, 'delete']);

        Route::get('actor', [AdminActorController::class, 'list']);
        Route::get('actor/add', [AdminActorController::class, 'add']);
        Route::get('actor/edit/{id}', [AdminActorController::class, 'edit']);
        Route::post('actor/add_edit', [AdminActorController::class, 'addnew']);
        Route::get('actor/delete/{id}', [AdminActorController::class, 'delete']);

        Route::get('director', [AdminDirectorController::class, 'list']);
        Route::get('director/add', [AdminDirectorController::class, 'add']);
        Route::get('director/edit/{id}', [AdminDirectorController::class, 'edit']);
        Route::post('director/add_edit', [AdminDirectorController::class, 'addnew']);
        Route::get('director/delete/{id}', [AdminDirectorController::class, 'delete']);

        Route::get('slider', [AdminSliderController::class, 'slider_list']);   
        Route::get('slider/add_slider', [AdminSliderController::class, 'addSlider']); 
        Route::get('slider/edit_slider/{id}', [AdminSliderController::class, 'editSlider']);   
        Route::post('slider/add_edit_slider', [AdminSliderController::class, 'addnew']);   
        Route::get('slider/delete/{id}', [AdminSliderController::class, 'delete']);

        
        Route::get('home_sections', [AdminHomeSectionsController::class, 'list']);
        Route::get('home_sections/add', [AdminHomeSectionsController::class, 'add']);
        Route::get('home_sections/edit/{id}', [AdminHomeSectionsController::class, 'edit']);
        Route::post('home_sections/add_edit', [AdminHomeSectionsController::class, 'addnew']);
        Route::get('home_sections/delete/{id}', [AdminHomeSectionsController::class, 'delete']);

        // Users
        Route::get('users', [AdminUsersController::class, 'user_list']);
        Route::get('users/add_user', [AdminUsersController::class, 'addUser']);
        Route::get('users/edit_user/{id}', [AdminUsersController::class, 'editUser']);
        Route::post('users/add_edit_user', [AdminUsersController::class, 'addnew']);
        Route::get('users/delete/{id}', [AdminUsersController::class, 'delete']);
        Route::get('users/history/{id}', [AdminUsersController::class, 'user_history']);
        Route::get('users/export', [AdminUsersController::class, 'user_export']);

        // Sub Admin
        Route::get('sub_admin', [AdminUsersController::class, 'admin_user_list']);
        Route::get('sub_admin/add_user', [AdminUsersController::class, 'admin_addUser']);
        Route::get('sub_admin/edit_user/{id}', [AdminUsersController::class, 'admin_editUser']);
        Route::post('sub_admin/add_edit_user', [AdminUsersController::class, 'admin_addnew']);
        Route::get('sub_admin/delete/{id}', [AdminUsersController::class, 'admin_delete']);

        // Deleted Users
        Route::get('deleted_users', [AdminUsersController::class, 'deleted_user_list']);
        
        Route::get('subscription_plan', [AdminSubscriptionPlanController::class, 'subscription_plan_list']);
        Route::get('subscription_plan/add_plan', [AdminSubscriptionPlanController::class, 'addSubscriptionPlan']);
        Route::get('subscription_plan/edit_plan/{id}', [AdminSubscriptionPlanController::class, 'editSubscriptionPlan']);
        Route::post('subscription_plan/add_edit_plan', [AdminSubscriptionPlanController::class, 'addnew']);
        Route::get('subscription_plan/delete/{id}', [AdminSubscriptionPlanController::class, 'delete']);

     
        Route::get('coupons', [AdminCouponsController::class, 'coupons']);
        Route::get('coupons/addcoupon', [AdminCouponsController::class, 'addeditCoupons']);
        Route::get('coupons/addcoupon/{id}', [AdminCouponsController::class, 'editCoupons']);
        Route::post('coupons/addcoupon', [AdminCouponsController::class, 'addnew']);
        Route::get('coupons/delete/{id}', [AdminCouponsController::class, 'delete']);

        Route::get('payment_gateway', [AdminPaymentGatewayController::class, 'list']);
        Route::get('payment_gateway/edit/{id}', [AdminPaymentGatewayController::class, 'edit']);

        Route::post('payment_gateway/paypal', [AdminPaymentGatewayController::class, 'paypal']);
        Route::post('payment_gateway/stripe', [AdminPaymentGatewayController::class, 'stripe']);
        Route::post('payment_gateway/razorpay', [AdminPaymentGatewayController::class, 'razorpay']);
        Route::post('payment_gateway/paystack', [AdminPaymentGatewayController::class, 'paystack']);
        Route::post('payment_gateway/instamojo', [AdminPaymentGatewayController::class, 'instamojo']);
        Route::post('payment_gateway/payu', [AdminPaymentGatewayController::class, 'payu']);
        Route::post('payment_gateway/mollie', [AdminPaymentGatewayController::class, 'mollie']);
        Route::post('payment_gateway/flutterwave', [AdminPaymentGatewayController::class, 'flutterwave']);
        Route::post('payment_gateway/paytm', [AdminPaymentGatewayController::class, 'paytm']);
        Route::post('payment_gateway/cashfree', [AdminPaymentGatewayController::class, 'cashfree']);
        Route::post('payment_gateway/coingate', [AdminPaymentGatewayController::class, 'coingate']);
        Route::post('payment_gateway/banktransfer', [AdminPaymentGatewayController::class, 'banktransfer']);
        Route::post('payment_gateway/braintree', [AdminPaymentGatewayController::class, 'braintree']);
        Route::post('payment_gateway/sslcommerz', [AdminPaymentGatewayController::class, 'sslcommerz']);
        Route::post('payment_gateway/cinetpay', [AdminPaymentGatewayController::class, 'cinetpay']);

        Route::get('transactions', [AdminTransactionsController::class, 'transactions_list']);
        Route::post('transactions/export', [AdminTransactionsController::class, 'transactions_export']);
    
        Route::get('pages', [AdminPagesController::class, 'pages_list']);
        Route::get('pages/add', [AdminPagesController::class, 'add']);
        Route::get('pages/edit/{id}', [AdminPagesController::class, 'edit']);
        Route::post('pages/add_edit', [AdminPagesController::class, 'addnew']);
        Route::get('pages/delete/{id}', [AdminPagesController::class, 'delete']);

        // General Settings
        Route::get('maintenance/{mode}', [AdminSettingsController::class, 'maintenance'])->where('mode', 'down|up');
        Route::get('general_settings', [AdminSettingsController::class, 'general_settings']);
        Route::post('general_settings', [AdminSettingsController::class, 'update_general_settings']);

        // Email Settings
        Route::get('email_settings', [AdminSettingsController::class, 'email_settings']);
        Route::post('email_settings', [AdminSettingsController::class, 'update_email_settings']);

        // Test SMTP Settings
        Route::get('test_smtp_settings', [AdminSettingsController::class, 'test_smtp_settings']);

        // Payment Settings
        Route::get('payment_settings', [AdminSettingsController::class, 'payment_settings']);
        Route::post('payment_settings', [AdminSettingsController::class, 'update_payment_settings']);

        // Social Login Settings
        Route::get('social_login_settings', [AdminSettingsController::class, 'social_login_settings']);
        Route::post('social_login_settings', [AdminSettingsController::class, 'update_social_login_settings']);

        // Menu Settings
        Route::get('menu_settings', [AdminSettingsController::class, 'menu_settings']);
        Route::post('menu_settings', [AdminSettingsController::class, 'update_menu_settings']);

        // Player Settings
        Route::get('player_settings', [AdminSettingsPlayerController::class, 'player_settings']);
        Route::post('player_settings', [AdminSettingsPlayerController::class, 'update_player_settings']);

        // Player Ad Settings
        Route::get('player_ad_settings', [AdminSettingsPlayerController::class, 'player_ad_settings']);
        Route::post('player_ad_settings', [AdminSettingsPlayerController::class, 'update_player_ad_settings']);

        // reCAPTCHA Settings
        Route::get('recaptcha_settings', [AdminSettingsController::class, 'recaptcha_settings']);
        Route::post('recaptcha_settings', [AdminSettingsController::class, 'update_recaptcha_settings']);

        // Web Ads Settings
        Route::get('web_ads_settings', [AdminSettingsController::class, 'web_ads_settings']);
        Route::post('web_ads_settings', [AdminSettingsController::class, 'update_web_ads_settings']);

        // Site Maintenance
        Route::get('site_maintenance', [AdminSettingsController::class, 'site_maintenance']);
        Route::post('site_maintenance', [AdminSettingsController::class, 'update_site_maintenance']);
        Route::post('site_maintenance_on_off', [AdminSettingsController::class, 'site_maintenance_on_off']);
        Route::get('settings', [AdminSettingsController::class, 'settings']);
      
        // Verify Purchase App
        Route::get('verify_purchase_app', [AdminSettingsAndroidAppController::class, 'verify_purchase_app']);
        Route::post('verify_purchase_app', [AdminSettingsAndroidAppController::class, 'verify_purchase_app_update']);

        // Android Settings
        Route::get('android_settings', [AdminSettingsAndroidAppController::class, 'android_settings']);
        Route::post('android_settings', [AdminSettingsAndroidAppController::class, 'update_android_settings']);

        // Android Notification
        Route::get('android_notification', [AdminSettingsAndroidAppController::class, 'android_notification']);
        Route::post('android_notification', [AdminSettingsAndroidAppController::class, 'send_android_notification']);


        // Ads List
        Route::get('ad_list', [AdminAppAdsController::class, 'list']);
        Route::get('ad_list/edit/{id}', [AdminAppAdsController::class, 'edit']);

        // Ads Update (by platform)
        Route::post('ad_list/admob', [AdminAppAdsController::class, 'admob']);
        Route::post('ad_list/startapp', [AdminAppAdsController::class, 'startapp']);
        Route::post('ad_list/facebook', [AdminAppAdsController::class, 'facebook']);
        Route::post('ad_list/applovins', [AdminAppAdsController::class, 'applovins']);
        Route::post('ad_list/wortise', [AdminAppAdsController::class, 'wortise']);

        Route::get('tv_category', [AdminTvCategoryController::class, 'category_list']);
        Route::get('tv_category/add_category', [AdminTvCategoryController::class, 'addCategory']);
        Route::get('tv_category/edit_category/{id}', [AdminTvCategoryController::class, 'editCategory']);
        Route::post('tv_category/add_edit_category', [AdminTvCategoryController::class, 'addnew']);
        Route::get('tv_category/delete/{id}', [AdminTvCategoryController::class, 'delete']);
        
        Route::get('live_tv', [AdminLiveTvController::class, 'live_tv_list']);
        Route::get('live_tv/add_live_tv', [AdminLiveTvController::class, 'addTv']);
        Route::get('live_tv/edit_live_tv/{id}', [AdminLiveTvController::class, 'editTv']);
        Route::post('live_tv/add_edit_live_tv', [AdminLiveTvController::class, 'addnew']);
        Route::get('live_tv/delete/{id}', [AdminLiveTvController::class, 'delete']);
        
        Route::get('episodes', [AdminEpisodesController::class, 'episodes_list']);
        Route::get('episodes/add_episode', [AdminEpisodesController::class, 'addEpisode']);
        Route::get('episodes/edit_episode/{id}', [AdminEpisodesController::class, 'editEpisode']);
        Route::post('episodes/add_edit_episode', [AdminEpisodesController::class, 'addnew']);
        Route::get('episodes/duplicate_episode/{id}', [AdminEpisodesController::class, 'duplicateEpisode']);
        Route::get('episodes/delete/{id}', [AdminEpisodesController::class, 'delete']);

        Route::get('ajax_get_season/{id}', [AdminEpisodesController::class, 'ajax_get_season_list']);
        
        Route::get('season', [AdminSeasonController::class, 'season_list']);
        Route::get('season/add_season', [AdminSeasonController::class, 'addSeason']);
        Route::get('season/edit_season/{id}', [AdminSeasonController::class, 'editSeason']);
        Route::post('season/add_edit_season', [AdminSeasonController::class, 'addnew']);
        Route::get('season/delete/{id}', [AdminSeasonController::class, 'delete']);

        Route::get('series', [AdminSeriesController::class, 'series_list']);
        Route::get('series/add_series', [AdminSeriesController::class, 'addSeries']);
        Route::get('series/edit_series/{id}', [AdminSeriesController::class, 'editSeries']);
        Route::post('series/add_edit_series', [AdminSeriesController::class, 'addnew']);
        Route::get('series/delete/{id}', [AdminSeriesController::class, 'delete']);

        Route::get('find_imdb_movie', [AdminImportImdbController::class, 'find_imdb_movie']);
        Route::get('find_imdb_show', [AdminImportImdbShowController::class, 'find_imdb_show']);
        Route::get('find_imdb_episode', [AdminImportImdbShowController::class, 'find_imdb_episode']);
    });
   
    //Site
    Route::get('/', [IndexController::class, 'index']);
    Route::get('collections/{slug}/{id}', [IndexController::class, 'home_collections']);
    
    Route::get('movies', [MoviesController::class, 'movies']);
    Route::get('movies/details/{slug}/{id}', [MoviesController::class, 'movies_details']);
    Route::get('movies/watch/{slug}/{id}', [MoviesController::class, 'movies_watch']);
    Route::get('movies/{slug}/{id}', [MoviesController::class, 'movies_single'])->name('movies_single');
  
    
    if(getcong('menu_shows'))
    {
        Route::get('shows', [ShowsController::class, 'shows']);
        Route::get('shows/details/{series_slug}/{id}', [ShowsController::class, 'show_details']);
        Route::get('shows/{series_slug}/seasons/{season_slug}/{id}', [ShowsController::class, 'season_episodes']);
        Route::get('shows/{series_slug}/{episodes_slug}/{id}', [ShowsController::class, 'episodes_details'])->name('episodes_single');

    }

    if(getcong('menu_sports'))
    {
        Route::get('earthling', [EarthlingController::class, 'earthling']);
        Route::get('earthling/{slug}', [EarthlingController::class, 'earthling_by_category']);
        Route::get('earthling/details/{slug}/{id}', [EarthlingController::class, 'earthling_details']);
        Route::get('earthling/watch/{slug}/{id}', [EarthlingController::class, 'earthling_watch']);
    }

    if(getcong('menu_livetv'))
    {
        Route::get('livetv', [LiveTvController::class, 'live_tv_list']);
        Route::get('livetv/{slug}', [LiveTvController::class, 'live_tv_by_category']);
        Route::get('livetv/details/{slug}/{id}', [LiveTvController::class, 'live_tv_details']);
        Route::get('livetv/watch/{slug}/{id}', [LiveTvController::class, 'live_tv_single']);
    } 

    /*========================================*/

    Route::get('login', [IndexController::class, 'login']);
    Route::post('login', [IndexController::class, 'postLogin']);
   
Route::get('login2', [IndexController::class, 'show']);
Route::post('login2', [IndexController::class, 'submit']);
Route::get('dashboard', function() {
    return session('user_email') ? "Welcome ".session('user_email') : redirect('login2');
});
    // Google Login
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

    // Facebook Login
    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
  
    Route::get('signup', [IndexController::class, 'signup']);
    Route::post('signup', [IndexController::class, 'postSignup']);
    Route::get('logout', [IndexController::class, 'logout']);
    Route::get('logout_user_remotely/{session_id}', [IndexController::class, 'logout_user_remotely']);
    Route::get('check_user_remotely_logout_or_not/{session_id}', [IndexController::class, 'check_user_remotely_logout_or_not']);

    Route::get('dashboard', [UserController::class, 'dashboard']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::post('profile', [UserController::class, 'editprofile']);
    Route::post('phone_update', [UserController::class, 'phone_update']);
    Route::get('watchlist', [UserController::class, 'my_watchlist']);
    Route::get('account_delete', [UserController::class, 'account_delete']);

    Route::get('membership_plan', [UserController::class, 'membership_plan']);
    Route::get('payment_method/{plan_id}', [UserController::class, 'payment_method']);
    
    Route::post('paypal/pay', [PaypalController::class, 'paypal_pay']);
    Route::get('paypal/success', [PaypalController::class, 'paypal_success']);
    Route::get('paypal/fail', [PaypalController::class, 'paypal_fail']);
    
    Route::get('stripe/pay', [StripeController::class, 'stripe_pay']);
    Route::get('stripe/success', [StripeController::class, 'stripe_success']);
    Route::get('stripe/fail', [StripeController::class, 'stripe_fail']);

    // Razorpay
    Route::post('razorpay_get_order_id', [RazorpayController::class, 'get_order_id']);
    Route::post('razorpay-success', [RazorpayController::class, 'payment_success']);

    // Paystack
    Route::post('pay', [PaystackController::class, 'redirectToGateway'])->name('pay');
    Route::get('payment/callback', [PaystackController::class, 'handleGatewayCallback']);

    // PayU
    Route::post('payu_success', [PayuController::class, 'payu_success']);
    Route::post('payu_fail', [PayuController::class, 'payu_fail']);

    // Instamojo
    Route::post('instamojo/pay', [InstamojoController::class, 'instamojo_pay']);
    Route::get('instamojo/success', [InstamojoController::class, 'instamojo_success']);

    // Mollie
    Route::post('mollie/pay', [MollieController::class, 'mollie_pay']);
    Route::get('mollie/success', [MollieController::class, 'mollie_success']);
    Route::get('mollie/fail', [MollieController::class, 'mollie_fail']);

    // Flutterwave
    Route::post('flutterwave/pay', [FlutterwaveController::class, 'flutterwave_pay']);
    Route::get('flutterwave/success', [FlutterwaveController::class, 'flutterwave_success']);

    // Paytm
    Route::get('paytm/pay', [PaytmController::class, 'paytm_pay']);
    Route::post('paytm/success', [PaytmController::class, 'paytm_success']);

    // Cashfree
    Route::post('cashfree/get_cashfree_session_id', [CashfreeController::class, 'get_cashfree_session_id']);
    Route::get('cashfree/success', [CashfreeController::class, 'cashfree_success']);

    // Coingate
    Route::get('coingate/pay', [CoingateController::class, 'coingate_pay']);
    Route::get('coingate/success', [CoingateController::class, 'coingate_success']);
    Route::get('coingate/fail', [CoingateController::class, 'coingate_fail']);

    // SSLCommerz
    Route::get('sslcommerz/pay', [SslcommerzController::class, 'sslcommerz_pay']);
    Route::post('sslcommerz/success', [SslcommerzController::class, 'sslcommerz_success']);
    Route::post('sslcommerz/fail', [SslcommerzController::class, 'sslcommerz_fail']);

    // Cinetpay
    Route::get('cinetpay/pay', [CinetpayController::class, 'pay']);
    Route::post('cinetpay/success', [CinetpayController::class, 'success']);
    Route::get('cinetpay/notify', [CinetpayController::class, 'notify']);
   
    Route::get('language/series', [LanguageController::class, 'series_language']);
    Route::get('language/series/{slug}', [LanguageController::class, 'series_by_language']);
    Route::get('language/movies', [LanguageController::class, 'movies_language']);
    Route::get('language/movies/{slug}', [LanguageController::class, 'movies_by_language']);
   
    Route::prefix('genres')->group(function () {
        Route::get('series', [GenresController::class, 'series_genres']);
        Route::get('series/{slug}', [GenresController::class, 'series_by_genres']);
        Route::get('movies', [GenresController::class, 'movies_genres']);
        Route::get('movies/{slug}', [GenresController::class, 'movies_by_genres']);
    });
  
    Route::get('actors/{slug}/{id}', [ActorDirectorController::class, 'actor_details']);
    Route::get('directors/{slug}/{id}', [ActorDirectorController::class, 'director_details']);

    Route::get('page/{slug}', [PagesController::class, 'get_page']);
    Route::post('contact_send', [PagesController::class, 'contact_send']);
    
    Route::get('search', [IndexController::class, 'search']);
    Route::get('search_elastic', [IndexController::class, 'search_elastic']);

    Route::get('password/email', [ForgotPasswordController::class, 'forget_password']);
    Route::post('password/email', [ForgotPasswordController::class, 'forget_password_submit']);
    Route::get('password/reset/{token}', [ForgotPasswordController::class, 'reset_password']);
    Route::post('password/reset', [ForgotPasswordController::class, 'reset_password_submit']);
    
    Route::get('delete_account', [UserController::class, 'delete_account']);
    Route::post('delete_account_verify', [UserController::class, 'delete_account_verify']);
    
    Route::get('sitemap.xml', [IndexController::class, 'sitemap']);
    Route::get('sitemap-misc.xml', [IndexController::class, 'sitemap_misc']);
    Route::get('sitemap-movies.xml', [IndexController::class, 'sitemap_movies']);
    Route::get('sitemap-show.xml', [IndexController::class, 'sitemap_show']);
    Route::get('sitemap-sports.xml', [IndexController::class, 'sitemap_sports']);
    Route::get('sitemap-livetv.xml', [IndexController::class, 'sitemap_livetv']);

    Route::get('watchlist/add', [UserController::class, 'watchlist_add']);
    Route::get('watchlist/remove', [UserController::class, 'watchlist_remove']);

    Route::post('apply_coupon_code', [UserController::class, 'apply_coupon_code']);
    
    //For App Only
    Route::any('app_payu_success', function () {
        return view('app.app_payu_success');
    });

    Route::any('app_payu_failed', function () {
        return view('app.app_payu_failed');
    });

    Route::any('app_coingate_success', function () {
        return view('app.app_success');
    });

    Route::any('app_coingate_failed', function () {
        return view('app.app_failed');
    });

    Route::any('app_mollie_success', function () {
        return view('app.app_success');
    });

    Route::any('app_mollie_failed', function () {
        return view('app.app_failed');
    });

    //Clear Cache
    Route::get('/clear-cache', function() {
        Artisan::call('optimize:clear');
        echo "View cache cleared. \r\n";
    });