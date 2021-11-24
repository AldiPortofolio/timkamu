<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', 'HomeController@splash');
Route::get('/', 'HomeController@index');



// Route::get('past', 'HomeController@past');
Route::get('hasil', 'HomeController@hasil');
Route::get('hasildetail', 'HomeController@hasildetail');
Route::get('upcoming', 'HomeController@upcoming');
Route::get('backpack', 'HomeController@backpack');
Route::get('live', 'HomeController@live');
Route::get('system-mail', 'HomeController@systemMail');
Route::get('past-event', 'HomeController@pastEvent');
Route::get('faq', 'HomeController@faq');
Route::get('message', 'Message\MessageController@index');

// mana-ui
Route::prefix('mana')->group(function () {
    Route::get('home', 'HomeController@newHome');
    Route::get('event-index', 'HomeController@eventIndex');
    Route::get('event-view', 'HomeController@eventView');
    Route::get('sign-up', 'HomeController@newRegistration');
    Route::get('sign-in', 'HomeController@newSignin');
    Route::get('404', 'HomeController@notFound');

    Route::get('top-up-index', 'HomeController@topUpIndex');
    Route::get('my-profile', 'HomeController@myProfile');
    Route::get('system-mail', 'HomeController@systemMailMana');

    Route::get('recharge-lp', 'HomeController@rechargeLp');
    Route::get('reset-password', 'HomeController@newResetPassword');
    Route::get('otp-resend', 'HomeController@otpResend');
    Route::get('my-lpbp-transactions', 'HomeController@myLpBpTransactions');
    Route::get('promotions', 'HomeController@promotions');

    Route::get('team-index', 'HomeController@teamIndex');
    Route::get('team-view', 'HomeController@teamView');

    // top ups
    Route::get('top-up-mlbb', 'HomeController@topUpMlbb');
    Route::get('top-up-pubgm', 'HomeController@topUpPubgm');
    Route::get('top-up-freefire', 'HomeController@topUpFreefire');
    Route::get('top-up-valorant', 'HomeController@topUpValorant');
    Route::get('top-up-ret', 'HomeController@topUpRet');
    Route::get('top-up-googleplay', 'HomeController@topUpGooglePlay');

    // isi pulsa
    Route::get('isi-pulsa-index', 'HomeController@isiPulsaIndex');
    Route::get('isi-pulsa-telkomsel', 'HomeController@isiPulsaTelkomsel');
    Route::get('isi-pulsa-xl', 'HomeController@isiPulsaXl');
    Route::get('isi-pulsa-tri', 'HomeController@isiPulsaTri');

    // rumah tangga
    Route::get('rumah-tangga-index', 'HomeController@rumahTanggaIndex');
    Route::get('rumah-tangga-pln', 'HomeController@rumahTanggaPln');

    Route::get('faq', 'HomeController@faq');
    Route::get('outright', 'HomeController@outright');
    Route::get('tournaments', 'HomeController@tournaments');
    Route::get('tournaments-view', 'HomeController@tournamentsView');
});


// admin2
Route::prefix('admin2')->group(function () {
    Route::get('dashboard', 'Admin2Controller@dashboard');
    Route::get('event-index', 'Admin2Controller@eventIndex');
    Route::get('event-view', 'Admin2Controller@eventView');
    Route::get('event-create', 'Admin2Controller@eventCreate');
    Route::get('member-index', 'Admin2Controller@memberIndex');
    Route::get('member-view', 'Admin2Controller@memberView');
    Route::get('reports', 'Admin2Controller@reports');
    Route::get('event-performance', 'Admin2Controller@eventPerformance');
    Route::get('event-performance-range', 'Admin2Controller@eventPerformanceRange');
    Route::get('event-betters', 'Admin2Controller@eventBetters');
    Route::get('report-lp', 'Admin2Controller@reportLp');
    Route::get('report-lp-circulation', 'Admin2Controller@reportLpCirculation');
    Route::get('report-lp-transactions', 'Admin2Controller@reportLpTransactions');
    Route::get('report-lp-per-member', 'Admin2Controller@reportLpPerMember');
    Route::get('report-member-overview', 'Admin2Controller@reportMemberOverview');
    Route::get('report-topups', 'Admin2Controller@reportTopups');
    Route::get('report-pulsa', 'Admin2Controller@reportPulsa');
    Route::get('topup-overview', 'Admin2Controller@topupOverview');
    Route::get('topup-volume', 'Admin2Controller@topupVolume');
    Route::get('topup-per-member', 'Admin2Controller@topupPerMember');
    Route::get('member-historical', 'Admin2Controller@memberHistorical');
    Route::get('quests', 'Admin2Controller@quests');
    Route::get('promo-index', 'Admin2Controller@promoIndex');
    Route::get('promo-view-diskon25', 'Admin2Controller@promoViewDiskon25');
    Route::get('promo-view-cashback10', 'Admin2Controller@promoViewCashback10');
    Route::get('stats', 'Admin2Controller@stats');
    Route::get('tournament-index', 'Admin2Controller@tournamentIndex');
    Route::get('tournament-view', 'Admin2Controller@tournamentView');
    Route::get('exports', 'Admin2Controller@exports');
});

//PROMOTIONS
Route::get('promotions', 'HomeController@promo')->name('promotions');


// RANKS
Route::get('ranks', 'HomeController@ranks');

// OTP Input after registration
Route::get('otp', 'Authentication\GetFormVerifyAccountAction');
Route::get('otp-resend', 'Authentication\GetFormResendVerifyAccountAction');
Route::get('skip-otp', 'Authentication\GetFormVerifyAccountAction@skipOtp');

// AUTH
Route::prefix('sign-in')->group(function () {
    Route::get('/', 'Authentication\GetSignInFormAction')->name('login');
    Route::post('/', 'Authentication\PostSignInAction');
});

Route::prefix('sign-up')->group(function () {
    Route::get('/', 'Authentication\GetSignUpFormAction')->name('register');
    Route::post('/', 'Authentication\PostSignUpAction');
    Route::get('verify', 'Authentication\GetVerifyAccountAction');
    Route::get('resend-verify', 'Authentication\GetFormResendVerifyAccountAction');
    Route::post('resend-verify', 'Authentication\PostResendVerifyAccountAction');
});

Route::prefix('setup-account')->group(function () {
    Route::get('resend-verify', 'Authentication\GetFormSetupPhoneAction');
    Route::post('resend-verify', 'Authentication\PostSetupPhoneAction');
});

Route::get('resend-otp', 'Authentication\GetResendVerifyAccountAction');
Route::get('resend-otp-phone', 'Authentication\GetResendVerifyPhoneAccountAction');

Route::prefix('sign-out')->group(function () {
    Route::get('/', 'Authentication\GetSignOutAction');
});

Route::get('reset-password', 'Authentication\GetFormResetPassword');
Route::post('reset-password', 'Authentication\PostResetPassword');

Route::post('update-password', 'Authentication\PostUpdatePasswordAction');

Route::get('redirect-socialite', 'Authentication\SocialAuthProviderController@redirect');
Route::get('callback-socialite/{type}', 'Authentication\SocialAuthProviderController');

// Route::get('get-event-odd', 'Event\GetEventOddAction')->name('events.with-odd');

// AJAX'SocialAuthGoogleController
Route::prefix('ajax')->group(function () {
    Route::get('get-teams/{id}', 'Event\GetTeamEventAction')->name('event-teams');
    Route::get('get-team-members/{id}', 'Event\GetTeamEventMemberAction')->name('event-teams.member');
    Route::post('post-supports/{id}', 'Event\PostEventSupportAction')->name('events.support');
    Route::post('post-supports-sementara/{id}', 'Event\PostEventSupportSementaraAction')->name('events.support-sementara');
    Route::post('post-temp-supports/{id}', 'Event\PostEventSupportTemporaryAction')->name('events.temp-support');
    Route::post('post-temp-supports-update/{id}', 'Event\PostEventSupportTemporaryUpdateAction')->name('events.temp-support-update');
    Route::post('post-destroy-temp-supports/{id}', 'Event\PostEventDeleteSupportTemporaryAction')->name('events.destroy.temp-support');
    Route::post('event-chats/{id}', 'Event\PostEventChatAction')->name('events.chat');
    Route::get('get-data-event-detail/{id}', 'Event\GetDataEventDetailAction')->name('event-details.data');
    Route::get('get-data-event-outright-detail/{id}', 'Event\GetDataEventOutrightDetailAction')->name('event-outright-details.data');
    Route::get('get-all-data-event', 'Event\GetAllDataEventAction')->name('all-events.data');
    Route::get('check-event-finish', 'Event\GetEventFinishAction')->name('events.finish');

    Route::get('get-event-odd', 'Event\GetEventOddAction')->name('events.with-odd');

    Route::post('donate-items/{id}', 'Team\PostDonateTeamEventAction')->name('teams.donate-event');
    Route::post('donate-team-items/{id}', 'Team\PostDonateTeamAction')->name('teams.donate-team');

    Route::post('get-recharge-lp', 'Purchase\PostPurchaseEventAction')->name('pruchase.event');
    Route::get('get-token-transaction', 'Purchase\GetTokenPaymentAction')->name('purchase.get-token-transaction');
    Route::post('convert-bp-lp', 'Purchase\PostConvertAction')->name('pruchase.convert');
    Route::post('convert-coin-lp', 'Purchase\PostCoinConvertAction')->name('pruchase.convert-coin');

    Route::get('system-mail/{id}', 'Profile\GetReadSystemMailUserAction')->name('profile.system-mail.read');

    Route::get('tournament/{tournament_id}/user/{user_id}', [\App\Http\Controllers\TournamentsController::class, 'checkUserRegistration'])->name('tournament.check.user');
    Route::get('team/{id}/members',[\App\Http\Controllers\Team\TeamMembersController::class, 'showByTeam'])->name('team.members.show');

    Route::get('events/{id}/json',[\App\Http\Controllers\Event\GetAllEventAction::class, 'show'])->name('events.show.json');
    Route::get('events/json',[\App\Http\Controllers\Event\GetAllEventAction::class, 'json'])->name('events.json');
    Route::get('events/check-status',[\App\Http\Controllers\Event\GetAllEventAction::class, 'checkStatus'])->name('events.check.status');

    Route::get('teams',[\App\Http\Controllers\Team\GetAllTeamAction::class, 'searchByName'])->name('teams.search.name');

});

// PURCHASE
Route::prefix('purchase')->group(function () {
    Route::get('detail', 'Purchase\GetPurchaseDetailAction')->name('purchase.detail');
    Route::get('/', 'Purchase\PostPurchaseAction')->name('purchase.create');
    Route::get('finish-transaction', 'Purchase\GetFinishPaymentAction')->name('purchase.finish-transaction');

    // PURCHASE DIAMOND SUCCESS
    Route::get('success', 'Purchase\GetSuccessPurchaseAction');
});


// EVENTS
Route::prefix('events')->group(function () {
    Route::get('/', 'Event\GetAllEventAction')->name('events');
    Route::get('/{slug}', 'Event\GetEventDetailAction')->name('events.detail');
    Route::get('bookmark/{id}', 'Event\GetEventBookmarkAction')->name('events.bookmark');
});

Route::prefix('teams')->group(function () {
    Route::get('/', 'Team\GetAllTeamAction')->name('teams.index');
    Route::get('detail', 'Team\GetTeamDetailAction')->name('teams.detail');
    Route::get('fans', 'Team\GetFansTeamAction')->name('teams.fans');

});

// LEADERBOARDS
Route::prefix('leaderboards')->group(function () {
    Route::get('/', 'Leaderboard\GetLeaderboardAction')->name('leaderboards');
});

// PROFILE
Route::prefix('profile')->group(function () {
    Route::get('/', 'Profile\GetProfileUserAction')->name('profile');
    Route::get('edit', 'Profile\GetEditProfileUserAction')->name('profile.edit');

    Route::get('transaction', 'Profile\GetTransactionProfileUserAction')->name('profile.transaction');
    Route::get('backpack', 'Profile\GetBackpackProfileUserAction')->name('profile.backpack');

    Route::get('result', 'Profile\GetResultEventUserAction')->name('profile.result-event');
    Route::get('result/detail/{id}', 'Profile\GetResultEventDetailUserAction')->name('profile.result-eventdetail');

    Route::get('system-mail', 'Profile\GetSystemMailUserAction')->name('profile.system-mail');
});

// TOURNAMENTS
//Route::prefix('tournaments')->group(function() {
//    Route::get('/', [\App\Http\Controllers\TournamentsController::class, 'index'])->name('tournaments.index');
////    Route::get('/{slug}', [\App\Http\Controllers\TournamentsController::class, 'show']);
//});


// ADMIN
Route::prefix('admin-tkmu')->group(function () {
    // SIGN-IN
    Route::get('sign-in', 'Admin\Authentication\GetAdminSignInAction')->name('admin.login');
    Route::post('sign-in', 'Admin\Authentication\PostAdminSignInAction');

    // SIGN-OUT
    Route::get('sign-out', 'Admin\Authentication\GetSignOutAction')->name('admin.logout');

    // HOME
    Route::get('/', 'Admin\GetAdminDashboardAction')->name('admin.dashboard');

    // UPDATE SCORE
    Route::get('update-score/{id}', 'Admin\GetUpdateScoreAction')->name('admin.update-score');
    Route::get('update-winner-winlose/{id}/{winner}', 'Admin\GetUpdateWinLoseAction')->name('admin.update-winlose');

    // UPDATE SCORE
    Route::get('update-card/{id}', 'Admin\GetUpdateCardAction')->name('admin.update-card');

    // UPDATE TYPE
    Route::get('update-type', 'Admin\GetUpdateTypeAction')->name('admin.update-type');
    Route::get('update-chat/{id}', 'Admin\GetUpdateChatEventAction')->name('admin.update-chat');

    Route::get('calculating-bet', 'Admin\GetCalculateBetAction')->name('admin.calculating-bet');

    // USER
    Route::get('users', 'Admin\User\GetAllUserAction')->name('admin.users');
    Route::get('users/{id}', 'Admin\User\GetDetailUserAction')->name('admin.users.detail');
    Route::get('users/{id}/update-login', 'Admin\User\GetUpdateLoginUserAction')->name('admin.users.update-login');
    Route::get('users-overview', 'Admin\User\GetUserOverviewAction')->name('admin.user-overview');
    // Route::get('users/create', 'Admin\User\GetUserCreateFormAction')->name('admin.users.create');
    Route::post('users', 'Admin\User\PostUserCreateAction')->name('admin.users.create');
    Route::get('users/{id}/edit', 'Admin\User\GetUserEditFormAction')->name('admin.users.edit');
    Route::get('search', 'Admin\User\GetAllUsernameByKeywordAction');
    Route::get('search-detail', 'Admin\User\GetUserByIdAction')->name('admin.users.detail-by-id');
    Route::get('users-traffics', 'Admin\User\GetUserOverviewAnalyticsAction');

    // STAFF
    Route::get('staffs', 'Admin\Staff\GetAllStaffAction')->name('admin.staffs');
    Route::get('staffs/create', 'Admin\Staff\GetStaffCreateFormAction')->name('admin.staffs.create');
    Route::post('staffs', 'Admin\Staff\PostStaffCreateAction')->name('admin.staffs.store');
    Route::get('staffs/{id}/edit', 'Admin\Staff\GetStaffEditFormAction')->name('admin.staffs.edit');
    Route::patch('staffs/{id}', 'Admin\Staff\PostStaffUpdateAction')->name('admin.staffs.update');
    Route::delete('staffs/{id}', 'Admin\Staff\GetStaffDeleteAction')->name('admin.staffs.delete');

    // LEAGUE GAME
    Route::get('league-games','Admin\LeagueGame\GetAllLeagueGameAction')->name('admin.league-games');
    Route::post('league-games', 'Admin\LeagueGame\PostCreateLeagueGameAction')->name('admin.league-games.create');
    Route::patch('league-games/{id}', 'Admin\LeagueGame\PostUpdateLeagueGameAction')->name('admin.league-games.edit');

    Route::post('games', 'Admin\LeagueGame\PostCreateGameAction')->name('admin.games.create');
    Route::patch('games/{id}', 'Admin\LeagueGame\PostUpdateGameAction')->name('admin.games.edit');

    Route::post('leagues', 'Admin\LeagueGame\PostCreateLeagueAction')->name('admin.leagues.create');
    Route::patch('leagues/{id}', 'Admin\LeagueGame\PostUpdateLeagueAction')->name('admin.leagues.edit');

    // EVENT
    Route::get('events', 'Admin\Event\GetAllEventAction')->name('admin.events');
    Route::get('events/create', 'Admin\Event\GetCreateEventAction')->name('admin.events.create');
    Route::post('events', 'Admin\Event\PostCreateEventAction')->name('admin.events.store');
    Route::get('events/{id}', 'Admin\Event\GetDetailEventAction')->name('admin.events.detail');
    Route::get('events/{id}/delete', 'Admin\Event\GetDeleteEventAction')->name('admin.events.delete');
    Route::get('events/{id}/edit', 'Admin\Event\GetUpdateEventAction')->name('admin.events.edit');
    Route::patch('events/{id}', 'Admin\Event\PostUpdateEventAction')->name('admin.events.update');
    Route::get('get-data-events/{id}', 'Admin\Event\GetDataDetailEventAction')->name('admin.events.get-data-detail');

    Route::post('events/bet-categories', 'Admin\Event\PostEventBetCategoryCreateAction')->name('admin.events.bet-categories');
    Route::post('events/bet-categories/{id}', 'Admin\Event\PostEventBetCategoryUpdateAction')->name('admin.events.bet-categories.edit');
    Route::get('events/bet-categories-reorder/{id}', 'Admin\Event\GetEventBetCategoryReorderAction')->name('admin.events.bet-categories.reorder');
    Route::get('events/bet-categories-rename/{id}', 'Admin\Event\GetEventBetCategoryRenameAction')->name('admin.events.bet-categories.rename');
    Route::get('events/bet-categories-reload/{id}', 'Admin\Event\GetEventBetCategoryReloadAction')->name('admin.events.bet-categories.reload');
    Route::get('events/bet-categories/{id}/lock', 'Admin\Event\GetEventBetCategoryLockAction')->name('admin.events.bet-categories.lock');
    Route::get('events/bet-categories/{id}', 'Admin\Event\GetEventBetCategoryDeleteAction')->name('admin.events.bet-categories.delete');

    Route::post('events/bet-rules', 'Admin\Event\PostEventBetRuleCreateAction')->name('admin.events.bet-rules');
    Route::post('events/bet-rules/{id}', 'Admin\Event\PostEventBetRuleUpdateAction')->name('admin.events.bet-rules.edit');
    Route::get('events/bet-rules/{id}/lock', 'Admin\Event\GetEventBetRuleLockAction')->name('admin.events.bet-rules.lock');
    Route::get('events/bet-rules/{id}', 'Admin\Event\GetEventBetRuleDeleteAction')->name('admin.events.bet-rules.delete');
    Route::get('events/bet-rules-lock-all/{id}', 'Admin\Event\GetAllEventBetRuleLockAction')->name('admin.events.bet-rules.lock-all');

    // REPORT
    Route::get('reports', 'Admin\Report\GetReportAction')->name('admin.reports');
    Route::get('report-participants', 'Admin\Report\GetReportParticipantAction')->name('admin.report-participants');
    Route::get('reports/{id}', 'Admin\Report\GetReportByIdAction')->name('admin.report.id');

    // LOYALTY POINTS
    Route::get('lp-transaction', 'Admin\Report\GetReportLPTransactionAction')->name('admin.reports.lp-transactions');
    Route::get('lp-transaction-member', 'Admin\Report\GetReportLPTransactionMemberAction')->name('admin.reports.lp-transactions-member');
    Route::get('lp-recharge', 'Admin\Report\GetReportLPRechargeAction')->name('admin.reports.lp-recharge');
    Route::get('lp-circulation', 'Admin\Report\GetReportLPCirculationAction')->name('admin.reports.lp-circulation');

    // ITEMS
    Route::get('items', 'Admin\Item\GetAllItemAction')->name('admin.items');
    Route::post('items', 'Admin\Item\PostItemCreateAction')->name('admin.items.create');
    Route::post('items/{id}', 'Admin\Item\PostItemUpdateAction')->name('admin.items.edit');

    Route::get('update-shop/{var}', 'Admin\Item\PostShopUpdateAction')->name('admin.shop.edit');

    // TRANSACTIONS
    Route::get('transactions-overview', 'Admin\Transaction\GetAllTransactionOverviewAction');
    Route::get('transactions-volume', 'Admin\Transaction\GetAllTransactionVolumeAction');
    Route::get('transactions-member', 'Admin\Transaction\GetAllTransactionMemberAction');
    Route::get('transactions-historical-member', 'Admin\Transaction\GetAllHistoricalTransactionMemberAction');
    Route::get('transactions/{type}', 'Admin\Transaction\GetAllTransactionByTypeAction');
    Route::get('transactions-detail', 'Admin\Transaction\GetAllTransactionDetailAction');
    Route::post('transactions/{id}', 'Admin\Transaction\PostTransactionUpdateAction');
    Route::get('get-data-transactions', 'Admin\Transaction\GetAllDataTransaction');

    // QUESTS
    Route::get('stats', 'Admin\GetStatsActionController');
    Route::get('/exports', 'HomeController@exports');
    Route::get('/stats-export', 'Admin\Export\ExportsController@KeyStatsExport');
    Route::get('/member-export', 'Admin\Export\ExportsController@MemberExport');
    Route::get('/member-historical-export', 'Admin\Export\ExportsController@MemberHistoricalTransactionExport');
    Route::get('/allcheckout-export', 'Admin\Export\ExportsController@AllCheckout');
    // QUESTS
    Route::get('quests', 'Admin\Quest\GetAllQuestActionController');

    // PROMOS
    Route::get('promos', 'Admin\Promo\GetAllPromoAction');
    Route::get('promos/{id}', 'Admin\Promo\GetDetailPromoAction');

    // TOURNAMENT
    Route::get('tournaments', [\App\Http\Controllers\Admin\TournamentsController::class, 'index']);
    Route::get('tournaments/details/{id}', [\App\Http\Controllers\Admin\TournamentsController::class, 'show'])->name('admin.tournament.show');
});


Route::get('/tournaments', [\App\Http\Controllers\TournamentsController::class, 'index'])->name('tournaments.index');
Route::get('/{slug}', [\App\Http\Controllers\TournamentsController::class, 'show'])->name('tournaments.show');
