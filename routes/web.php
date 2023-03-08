<?php

use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PageSettingController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Artist\ArtistAccountController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Instructor\InstructorBackendController;
use App\Http\Controllers\Artist\ArtistBackendController;
use App\Http\Controllers\Admin\BookCategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\GoogleController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\ArtCategoryController;
use App\Http\Controllers\Admin\ArtWorkController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediumController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\ExhibitionCategoryController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\ExhibitionSchoolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Exhibition\ExbihitionController;
use App\Http\Controllers\Front\ExhibitionController as FrontExhibitionController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Front\BookOrderController;
use App\Http\Controllers\Front\BookPayController;
use App\Http\Controllers\Front\ArtPayController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\OrderController as FrontOrderController;
use App\Http\Controllers\Front\ArtworkOrderController;
use App\Http\Controllers\Front\PayController;
use App\Http\Controllers\Instructor\BookWithdrawController;
use App\Http\Controllers\Instructor\WithdrawlController;
use App\Http\Controllers\Roles\PermissionController;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Roles\UserController;
use App\Http\Controllers\Student\CurriculumController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\instructor\InstructorController;


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

Route::get('/', [FrontController::class, 'index'])->name('welcome');
// Route::post('/', [FrontController::class, 'index'])->name('welcome');
Route::get('search/course', [FrontController::class, 'searchCourse'])->name('search.course');
Route::post('search/course', [FrontController::class, 'searchCourse'])->name('search.course');

Route::get('artist-exhibition', [ExbihitionController::class, 'index'])->name('artist.exhibition');

Route::resource('exhibitions', FrontExhibitionController::class);

/* Exhibition Frontend */
Route::get('exhibitor/registration', [ExhibitorController::class, 'create'])->name('exhibitor.create');
Route::post('exhibitor/registration', [ExhibitorController::class, 'store'])->name('exhibitor.store');
Route::get('exhibitor/registration/{id}', [ExhibitorController::class, 'show'])->name('exhibitor.show');
Route::get('exhibitor/registration/pdf/{id}', [ExhibitorController::class, 'pdf'])->name('exhibitor.pdf');

/* footer blog page */
Route::get('/blogs', [FrontController::class, 'footerBlog'])->name('footer.blog');

// instructor single page
Route::get('home-instructor/{id}', [FrontController::class, 'instructor'])->name('instructor-detail');

// book single page
Route::get('home-book/{id}', [FrontController::class, 'book'])->name('book-detail');

// blog single page
Route::get('/blog/{id}', [FrontController::class, 'blog'])->name('blog-details');

// about page
Route::get('/about', [FrontController::class, 'about'])->name('front.about');

// career page
Route::get('home-career', [FrontController::class, 'career'])->name('career');

// press page
Route::get('home-press', [FrontController::class, 'press'])->name('press');

// help page
Route::get('home-help', [FrontController::class, 'help'])->name('help');

// contact page
Route::get('home-contact', [FrontController::class, 'contact'])->name('contact');

// privacy page
Route::get('privacy-policy', [FrontController::class, 'privacy'])->name('privacy');

// terms and condition
Route::get('terms-and-condition', [FrontController::class, 'terms'])->name('terms.condition');

// signin page
Route::get('student/signin', [FrontController::class, 'signin'])->name('student-signin');
Route::post('student/signin', [FrontController::class, 'customeLogin'])->name('custom-signin');

// register page
Route::get('student/register', [FrontController::class, 'register'])->name('student-signup');
Route::post('student/register', [FrontController::class, 'signup'])->name('student-signup');

/* otp */
Route::get('student/otp/', [FrontController::class, 'checkotp'])->name('student-otp');
Route::post('student/otp/', [FrontController::class, 'checkotp'])->name('student-otp');

/* register info page */
Route::get('student/register/info', [FrontController::class, 'registerInfo'])->name('student.register.info');
Route::post('student/register/info', [FrontController::class, 'registerInfo'])->name('student.register.info');

Route::get('student/forget/password', [FrontController::class, 'forgetPassword'])->name('student.forget.password');
Route::post('student/forget/password', [FrontController::class, 'forgetPasswordStore'])->name('student.forget.password.store');

Route::get('student/waiting', [FrontController::class, 'waiting'])->name('student.waiting');

// profile page
Route::get('student/profile', [FrontController::class, 'profile'])->name('student-profile');

// edit profile page
Route::get('student/profile/edit', [FrontController::class, 'editProfile'])->name('student-edit-profile');

// update profile page
Route::put('student/profile/edit', [FrontController::class, 'updateProfile'])->name('student-update-profile');

// change password
Route::get('change-password', [FrontController::class, 'changePassword'])->name('change.password');
Route::post('change-password', [FrontController::class, 'changePasswordStore'])->name('change.password.store');

// logout page
Route::get('student/logout', [FrontController::class, 'logout'])->name('student-logout');

// course details
Route::get('course/{slug}/', [FrontController::class, 'course_detail'])->name('course-detail');

// which instructor has which course
Route::get('course/instructor/{id}', [FrontController::class, 'instructor_course'])->name('instructor_course');

// which category has which course
Route::get('course/{id}', [FrontController::class, 'category_course'])->name('category_course');

// become instructor

Route::get('instructor/login', [InstructorBackendController::class, 'instructorSignin'])->name('instructor.login');
Route::post('instructor/login', [InstructorBackendController::class, 'instructorLogin'])->name('instructor.signin');
Route::get('instructor/dashboard', [InstructorBackendController::class, 'instructorDashboard'])->name('instructor.dashboard');
Route::get('instructor/course', [InstructorBackendController::class, 'instructorCourse'])->name('instructor.course');
Route::get('instructor/course/add', [InstructorBackendController::class, 'addCourse'])->name('instructor.create.course');
Route::post('instructor/course/add', [InstructorBackendController::class, 'storeCourse'])->name('instructor.store.course');
Route::get('instructor/enrolled/course', [InstructorBackendController::class, 'instructorEnrolledStudent'])->name('instructor.enrolled.course');
Route::get('instructor/book', [InstructorBackendController::class, 'instructorBook'])->name('instructor.book');
Route::get('instructor/book/orders', [InstructorBackendController::class, 'instructorBookOrder'])->name('instructor.book.order');

Route::get('instructor/edit/course/{id}', [InstructorBackendController::class, 'editCourse'])->name('instructor.edit.course');
Route::put('instructor/edit/course/{id}', [InstructorBackendController::class, 'updateCourse'])->name('instructor.update.course');


// withdraw request
Route::get('withdraw/pending/list', [WithdrawlController::class, 'withdrawl_list'])->name('withdraw.instructor.list');
Route::get('withdraw/complete/list', [WithdrawlController::class, 'complete_withdrawl_list'])->name('withdraw.complete.list');
Route::get('withdraw/request', [WithdrawlController::class, 'withdrawl_create'])->name('withdraw.create');
Route::post('withdraw/request', [WithdrawlController::class, 'withdrawl_store'])->name('withdraw.store');

// withdraw book request
Route::get('withdraw/book/pending/list', [BookWithdrawController::class, 'bookPendingWithdraw'])->name('withdraw.instructor.book.list');
Route::get('withdraw/book/complete/list', [BookWithdrawController::class, 'bookCompleteWithdraw'])->name('withdraw.complete.book.list');
Route::get('withdraw/book/request', [BookWithdrawController::class, 'withdrawlCreate'])->name('withdraw.book.create');
Route::post('withdraw/book/request', [BookWithdrawController::class, 'withdrawlStore'])->name('withdraw.book.store');


/* order */
Route::get('/order/{id}', [FrontOrderController::class, 'addOrder'])->name('order.add');
Route::get('book/order/{id}', [BookOrderController::class, 'bookOrder'])->name('book.order.add');
Route::get('artwork/order/{id}', [ArtworkOrderController::class, 'artWorkOrder'])->name('artwork.order.add');

/* checkout */
Route::get('checkout/{order_number}', [CheckoutController::class, 'checkout'])->name('frontend.checkout');
Route::get('book/checkout/{order_number}', [CheckoutController::class, 'book_checkout'])->name('frontend.book.checkout');
Route::get('artwork/checkout/{order_number}', [CheckoutController::class, 'artwork_checkout'])->name('frontend.artwork.checkout');



/* artist account */
Route::get('artist/register', [ArtistBackendController::class, 'register'])->name('artist.register');
Route::post('artist/register', [ArtistBackendController::class, 'signup'])->name('artist.signup');
Route::get('artist/login', [ArtistBackendController::class, 'login'])->name('artist.login');
Route::post('artist/login', [ArtistBackendController::class, 'artistLogin'])->name('artist.signin');
Route::get('artist/dashboard', [ArtistBackendController::class, 'artistDashboard'])->name('artist.dashboard');
Route::get('artist/verify', [ArtistBackendController::class, 'artistVerification'])->name('artist.verify');
Route::get('artist/details/{id}', [ArtistBackendController::class, 'artistDetails'])->name('artist.details');
Route::get('artwork/gallery', [ArtistBackendController::class, 'artworkGallery'])->name('artist.gallery');
// Artist Profile
Route::get('artist/profile', [ArtistBackendController::class, 'profile'])->name('artist.profile');
Route::get('artist/profile/edit/{id}', [ArtistBackendController::class, 'editProfile'])->name('artist.edit.profile');
Route::put('artist/profile/edit/{id}', [ArtistBackendController::class, 'updateProfile'])->name('artist.update.profile');

// Art Work
Route::get('artist/artwork', [ArtistBackendController::class, 'createArtWork'])->name('artist.artwork');
Route::post('artist/artwork', [ArtistBackendController::class, 'uploadArtWork'])->name('artist.add.artwork');
Route::get('artist/artwork/edit/{id}', [ArtistBackendController::class, 'editArtWork'])->name('artist.edit.artwork');
Route::put('artist/artwork/edit/{id}', [ArtistBackendController::class, 'updateArtWork'])->name('artist.update.artwork');
Route::delete('artist/artwork/delete/{id}', [ArtistBackendController::class, 'deleteArtWork'])->name('artist.delete.artwork');

Route::get('artist/artwork/{id}', [ArtistBackendController::class, 'artWorkDetails'])->name('artist.artwork.details');

/* payment gateway */
Route::get('checkout/pay/result/{order_number}', [CheckoutController::class, 'payResult'])->name('payment.result');
Route::post('payment/confirm', [PayController::class, 'confirm'])->name('payment.confirm');

/* shurjo pay */
Route::post('payment-gateway-online/{order_number}', [PayController::class, 'initialPayment'])->name('payment.submit');
Route::get('success-url', [PayController::class, 'verifyPayment'])->name('shurjoPay.verify');

/* shurjo pay for book */
Route::post('book-payment-gateway-online/{order_number}', [BookPayController::class, 'bookinitialPayment'])->name('payment.book.submit');
Route::get('book-success-url', [BookPayController::class, 'verifyPayment'])->name('shurjoPay.book.verify');

Route::post('art-work-payment-gateway-online/{order_number}', [ArtPayController::class, 'artinitialPayment'])->name('payment.artwork.submit');
Route::get('artwork-success-url', [ArtPayController::class, 'artverifyPayment'])->name('shurjoPay.artwork.verify');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
  Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

  /* Roles */
  Route::resource('permissions', PermissionController::class)->except(['show']);
  Route::resource('roles', RolesController::class)->except(['show']);
  Route::resource('users', UserController::class)->except(['show']);

  /* Exhibition Backend */
  Route::get('exhibitors', [ExhibitorController::class, 'index'])->name('exhibitor.index');
  Route::get('exhibitors/pending', [ExhibitorController::class, 'pending'])->name('exhibitor.pending');
  Route::get('exhibitor/participants/{id}', [ExhibitorController::class, 'single'])->name('exhibitor.single');
  Route::delete('exhibitor/participants/delete/{id}', [ExhibitorController::class, 'destroy'])->name('exhibitor.destroy');

  /* Exbitior Status approve */
  Route::get('exhibitor/approve/{id}', [ExhibitorController::class, 'approve'])->name('exhibitor.approve');
  Route::post('exhibitor/approve/{id}', [ExhibitorController::class, 'approve'])->name('exhibitor.approve');
  Route::get('exhibitor/unapprove/{id}', [ExhibitorController::class, 'unapprove'])->name('exhibitor.unapprove');
  Route::post('exhibitor/unapprove/{id}', [ExhibitorController::class, 'unapprove'])->name('exhibitor.unapprove');


  /* Exhibition category backend */
  Route::resource('category', ExhibitionCategoryController::class)->except(['show', 'create']);

  /* Exhibition school backend */
  Route::resource('school', ExhibitionSchoolController::class)->except(['show', 'create']);

  /* Exhibitions */
  Route::resource('exhibition', ExhibitionController::class)->except(['show', 'create']);

  /* Artist */
  Route::resource('artist', ArtistController::class);

  /* Exhibition image */
  Route::resource('gallery', GalleryController::class);

  /* Art categories */
  Route::resource('art-categories', ArtCategoryController::class);

  /* Lesson */
  Route::resource('lesson', LessonController::class);

  /* Section */
  Route::resource('section', SectionController::class);


  /*Medium */
  Route::resource('medium', MediumController::class);
  Route::resource('main-category', CategoryController::class);
  Route::resource('student', StudentController::class);
  Route::resource('book-category', BookCategoryController::class);
  Route::resource('book', BookController::class);
  Route::resource('blog-category', BlogCategoryController::class);
  Route::resource('blog', BlogController::class);
  Route::resource('seo', SeoController::class);
  Route::resource('social', SocialLinkController::class);
  Route::resource('google', GoogleController::class);

  // Book Order List
  Route::get('book-order-list', [BookController::class, 'bookOrderList'])->name('book.order.index');

  // search student
  Route::get('student/search', [StudentController::class, 'search'])->name('student.search');
  Route::post('student/search', [StudentController::class, 'search'])->name('student.search');

  // artworks list
  Route::get('artwork/list', [ArtWorkController::class, 'artWorkList'])->name('artworks.index');

  // instructor search
  Route::get('instructor/search', [InstructorController::class, 'search'])->name('instructor.search');
  Route::post('instructor/search', [InstructorController::class, 'search'])->name('instructor.search');

  // order search
  Route::get('order/search', [OrderController::class, 'search'])->name('order.search');
  Route::post('order/search', [OrderController::class, 'search'])->name('order.search');

  // enroll search
  Route::get('enroll/search', [OrderController::class, 'searchEnrolledCourse'])->name('enroll.search');
  Route::post('enroll/search', [OrderController::class, 'searchEnrolledCourse'])->name('enroll.search');

  // book search
  Route::get('book/search', [BookController::class, 'search'])->name('book.search');
  Route::post('book/search', [BookController::class, 'search'])->name('book.search');

  // course search
  Route::get('course/search', [CourseController::class, 'search'])->name('course.search');
  Route::post('course/search', [CourseController::class, 'search'])->name('course.search');

  // category search
  Route::get('category/search', [CategoryController::class, 'search'])->name('category.search');
  Route::post('category/search', [CategoryController::class, 'search'])->name('category.search');

  // get and post for facebook
  Route::get('social/facebook/create', [SocialLinkController::class, 'facebook_create'])->name('facebook.create');
  Route::post('social/facebook/store', [SocialLinkController::class, 'facebook_store'])->name('facebook.store');
  Route::get('social/facebook/edit/{id}', [SocialLinkController::class, 'facebook_edit'])->name('facebook.edit');
  Route::put('social/facebook/update/{id}', [SocialLinkController::class, 'facebook_update'])->name('facebook.update');

  /* instructor */
  Route::get('instructor/data-tables', [InstructorController::class, 'dataTables'])->name('instructor.data-tables'); //JSON REQUEST
  Route::get('instructor', [InstructorController::class, 'index'])->name('instructor.index');
  Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
  Route::post('instructor/create', [InstructorController::class, 'store'])->name('instructor.store');
  Route::get('instructor/edit/{id}', [InstructorController::class, 'edit'])->name('instructor.edit');
  Route::put('instructor/update/{id}', [InstructorController::class, 'update'])->name('instructor.update');
  Route::delete('instructor/delete/{id}', [InstructorController::class, 'destroy'])->name('instructor.delete');
  Route::get('instructor/curriculum/{id}', [InstructorController::class, 'curriculum'])->name('instructor.curriculum');
  Route::get('instructor/details/{id}', [InstructorController::class, 'details'])->name('instructor.details');
  Route::get('instructor/status/{id1}/{id2}', [InstructorController::class, 'status'])->name('instructor.status');
  Route::get('instructor/secret/login/{id}', [InstructorController::class, 'secretLogin'])->name('instructor.secret');


  /* instructor withdraw */
  Route::get('instructor/withdraws/list', [InstructorController::class, 'withdrawList'])->name('withdraw.list'); //JSON REQUEST
  Route::get('instructor/withdraws', [InstructorController::class, 'withdraws'])->name('withdraw.index');
  Route::get('instructor/withdraw/{id}/show', [InstructorController::class, 'withdrawDetails'])->name('withdraw.show');
  Route::get('instructor/withdraws/accept/{id}', [InstructorController::class, 'accept'])->name('withdraw.accept');
  Route::put('instructor/withdraws/accept/{id}', [InstructorController::class, 'accept'])->name('withdraw.accept');
  Route::get('instructor/withdraws/reject/{id}', [InstructorController::class, 'reject'])->name('withdraw.reject');
  Route::put('instructor/withdraws/reject/{id}', [InstructorController::class, 'reject'])->name('withdraw.reject');
  Route::get('instructor/withdraws/reject', [InstructorController::class, 'withdrawRejectList'])->name('withdraw.reject.list');

  /* instructor book withdraws */
  Route::get('instructor/book/withdraws/list', [InstructorController::class, 'pendingWithdraw'])->name('withdraw.book.list'); //JSON REQUEST
  Route::get('instructor/book/withdraws', [InstructorController::class, 'bookComplete'])->name('withdraw.book.index');
  Route::get('instructor/book/withdraw/{id}/show', [InstructorController::class, 'withdrawDetails'])->name('withdraw.show');
  Route::get('instructor/book/withdraws/accept/{id}', [InstructorController::class, 'bookAccept'])->name('withdraw.book.accept');
  Route::put('instructor/book/withdraws/accept/{id}', [InstructorController::class, 'bookAccept'])->name('withdraw.book.accept');
  Route::get('instructor/book/withdraws/reject/{id}', [InstructorController::class, 'bookReject'])->name('withdraw.book.reject');
  Route::put('instructor/book/withdraws/reject/{id}', [InstructorController::class, 'bookReject'])->name('withdraw.book.reject');
  Route::get('instructor/book/withdraws/reject', [InstructorController::class, 'bookWithdrawReject'])->name('withdraw.reject.book.list');

  /* course */
  Route::get('courses', [CourseController::class, 'index'])->name('course.index');
  Route::get('courses/create', [CourseController::class, 'course_create'])->name('course.create');
  Route::post('courses/create', [CourseController::class, 'store'])->name('course.store');
  Route::get('courses/edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
  Route::put('courses/update/{id}', [CourseController::class, 'update'])->name('course.update');
  Route::get('courses/status/{id1}/{id2}', [CourseController::class, 'status'])->name('course.status');
  Route::get('courses/future_update/{id1}/{id2}', [CourseController::class, 'futureUpdate'])->name('future.status');
  Route::delete('courses/delete/{id}', [CourseController::class, 'destroy'])->name('course.delete');

  /* course purchase */
  Route::get('course/purchase', [OrderController::class, 'index'])->name('purchase.index');
  Route::get('course/purchase/details/{id}', [OrderController::class, 'purchaseDetails'])->name('purchase.details');
  Route::get('course/purchase/status/{id1}/{id2}', [OrderController::class, 'status'])->name('purchase.status');
  Route::get('course/purchase/delete/{id}', [OrderController::class, 'destroy'])->name('purchase.delete');
  Route::get('course/enroll/', [OrderController::class, 'enrollCourse'])->name('course.enroll');
  Route::get('add/enroll/course', [OrderController::class, 'createEnrolledCourse'])->name('add.enroll.course');
  Route::post('add/enroll/course', [OrderController::class, 'storeEnrollCourse'])->name('store.enroll.course');

  // Route::get('course/approve/{id}', [OrderController::class, 'approveOrder'])->name('course.approve');
  // Route::post('course/approve/{id}', [OrderController::class, 'approveOrder'])->name('course.approve');

  // Route::get('course/reject/{id}', [OrderController::class, 'rejectOrder'])->name('course.reject');
  // Route::post('course/reject/{id}', [OrderController::class, 'rejectOrder'])->name('course.reject');

  //------------ ADMIN QUESTION SECTION ------------
  Route::post('/course/lesson/quiz/question/store', 'Admin\QuestionController@store')->name('admin-question-store');
  Route::get('/course/lesson/quiz/question/edit/{id}', 'Admin\QuestionController@edit')->name('admin-question-edit');
  Route::post('/course/lesson/quiz/question/update/{id}', 'Admin\QuestionController@update')->name('admin-question-update');
  Route::post('/course/lesson/quiz/question/sort/update/{id}', 'Admin\QuestionController@sortUpdate')->name('admin-question-sort-update');
  Route::get('/course/lesson/quiz/question/delete/{id}', 'Admin\QuestionController@delete')->name('admin-question-delete');

  /* General Setting */
  Route::get('general-settings/logo', [GeneralSettingController::class, 'logo'])->name('general-setting.logo');
  Route::get('general-settings/favicon', [GeneralSettingController::class, 'favicon'])->name('general-setting.favicon');
  Route::get('general-settings/breadcrumb', [GeneralSettingController::class, 'breadcrumb'])->name('general-setting.breadcrumb');
  Route::get('general-settings/contents', [GeneralSettingController::class, 'contents'])->name('general-setting.contents');
  Route::get('general-settings/status/{field}/{status}', [GeneralSettingController::class, 'status'])->name('general-setting.status');
  Route::get('general-settings/certificate', [GeneralSettingController::class, 'certificate'])->name('general-setting.certificate');
  Route::get('general-settings/certificate/show', [GeneralSettingController::class, 'certificate_show'])->name('general-setting.certificate-show');
  Route::get('general-settings/error-banner', [GeneralSettingController::class, 'error_banner'])->name('general-setting.error');
  Route::post('general-settings/update', [GeneralSettingController::class, 'generalUpdate'])->name('general-setting.update');

  /* Home page setting */
  Route::get('page-settings/hero/section', [PageSettingController::class, 'heroSection'])->name('page-setting.hero-section');
  Route::get('page-settings/instructor/section', [PageSettingController::class, 'instructorSection'])->name('page-setting.instructor-section');
  Route::get('page-settings/faq/section', [PageSettingController::class, 'faqSection'])->name('page-setting.faq-section');
  Route::get('page-settings/newsletter/section', [PageSettingController::class, 'newsLetterSection'])->name('page-setting.news-letter-section');
  Route::post('page-settings/update', [PageSettingController::class, 'update'])->name('page-setting.update');
  Route::post('page-settings/update/home', [PageSettingController::class, 'homeUpdate'])->name('page-setting.homeUpdate');

  /* Menu page setting */
  Route::get('page-settings/contact', [PageSettingController::class, 'contact'])->name('page-setting.contact');

  /* Other page setting */
  Route::get('page-settings/data-tables', [PageController::class, 'dataTables'])->name('page.data-tables'); //JSON REQUEST
  Route::get('page-settings/page', [PageController::class, 'index'])->name('page.index');
  Route::get('page-settings/create', [PageController::class, 'create'])->name('page.create');
  Route::post('page-settings/create', [PageController::class, 'store'])->name('page.store');
  Route::get('page-settings/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
  Route::put('page-settings/update/{id}', [PageController::class, 'update'])->name('page.update');
  // Route::get('/page/delete/{id}', 'Admin\PageController@destroy')->name('admin-page-delete');
  // Route::get('/page/status/{id1}/{id2}', 'Admin\PageController@status')->name('admin-page-status');

  /* faq page */
  Route::get('page-settings/faq/data-tables', [FaqController::class, 'dataTables'])->name('faq.data-tables'); //JSON REQUEST
  Route::get('page-settings/faq', [FaqController::class, 'index'])->name('faq.index');
  Route::get('page-settings/faq/create', [FaqController::class, 'create'])->name('faq.create');
  Route::post('page-settings/faq/create', [FaqController::class, 'store'])->name('faq.store');
  Route::get('page-settings/faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
  Route::put('page-settings/faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
  Route::get('page-settings/faq/delete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');

  /* payment-gateway setting */
  Route::get('payment-gateways/information', [PaymentGatewayController::class, 'paymentInfo'])->name('payment.info');
  Route::get('payment-gateways/data-tables', [PaymentGatewayController::class, 'dataTables'])->name('payment.data-tables'); //JSON REQUEST
  Route::get('payment-gateways', [PaymentGatewayController::class, 'index'])->name('payment.index');
  Route::get('payment-gateways/create', [PaymentGatewayController::class, 'create'])->name('payment.create');
  Route::post('payment-gateways/create', [PaymentGatewayController::class, 'store'])->name('payment.store');
  Route::get('payment-gateways/edit/{id}', [PaymentGatewayController::class, 'edit'])->name('payment.edit');
  Route::post('payment-gateways/update/{id}', [PaymentGatewayController::class, 'update'])->name('payment.update');
  Route::delete('payment-gateways/delete/{id}', [PaymentGatewayController::class, 'destroy'])->name('payment.delete');
  Route::get('payment-gateways/status/{id1}/{id2}', [PaymentGatewayController::class, 'status'])->name('payment.status');

  /* currency */
  Route::get('general-settings/currency/{status}', [GeneralSettingController::class, 'currency'])->name('is.currency');
  Route::get('currency/data-tables', [CurrencyController::class, 'dataTables'])->name('currency.dataTables'); //JSON REQUEST
  Route::get('currencies', [CurrencyController::class, 'index'])->name('currency.index');
  Route::get('currency/create', [CurrencyController::class, 'create'])->name('currency.create');
  Route::post('currency/create', [CurrencyController::class, 'store'])->name('currency.store');
  Route::get('currency/edit/{id}', [CurrencyController::class, 'edit'])->name('currency.edit');
  Route::put('currency/update/{id}', [CurrencyController::class, 'update'])->name('currency.update');
  Route::get('currency/delete/{id}', [CurrencyController::class, 'destroy'])->name('currency.delete');
  Route::get('currency/status/{id1}/{id2}', [CurrencyController::class, 'status'])->name('currency.status');

  /* manage staff */
  Route::get('staff/data-tables', [StaffController::class, 'dataTables'])->name('staff.data-tables');
  Route::get('staff', [StaffController::class, 'index'])->name('staff.index');
  Route::get('staff/create', [StaffController::class, 'create'])->name('staff.create');
  Route::post('staff/create', [StaffController::class, 'store'])->name('staff.store');
  Route::get('staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
  Route::post('staff/update/{id}', [StaffController::class, 'update'])->name('staff.update');
  Route::get('staff/delete/{id}', [StaffController::class, 'destroy'])->name('staff.delete');
});

Route::prefix('student')->group(function () {
  Route::get('course/curriculam/lesson/{id}', [CurriculumController::class, 'curriculumLesson'])->name('student-course-curriculum-lesson');
  Route::post('course/curriculam/quiz/result', [CurriculumController::class, 'result'])->name('student-course-quiz-result');

  Route::get('lesson/{id}', [CurriculumController::class, 'lessonView'])->name('student-lesson');
});

require __DIR__ . '/auth.php';
