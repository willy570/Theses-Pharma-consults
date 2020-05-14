<?php

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


Route::get('/', 'FrontController@index')->name('app.home');

Auth::routes();
Route::get('/profile/{id}', 'RechercheController@profil')->name('user.profile');

Route::get('/search/', 'RechercheController@searchDocs')->name('search');


//Route::get('/search/load-more-data', 'RechercheController@loadMoreData')->name('search.loadmore');
Route::get('/tout-les-theses', 'RechercheController@allThese')->name('theses.all');
Route::get('/these/{url}', 'RechercheController@details')->name('theses.details');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/biblio', 'HomeController@biblioIndex')->name('biblio.index');
Route::post('/home/biblio', 'HomeController@biblioStore')->name('biblio.store');
Route::post('/home/biblio/ligne/check/{id}', 'HomeController@letCheck')->name('biblio.check');

Route::post('/home/biblio/delete/{bibliotheque}', 'HomeController@destroy')->name('biblio.destroy');

Route::get('/these/libraries/user/', 'RechercheController@modalLibraries')->name('library.show');
Route::post('/these/libraries/rubrique', 'LigneController@store')->name('ligne.store');
Route::post('/these/libraries/operation', 'LigneController@operation')->name('ligne.biblio');


Route::get('/home/abonnement/', 'AbonnementController@index')->name('abonnement.index');
Route::post('/home/abonnement/check', 'AbonnementController@check')->name('abonnement.check');
Route::post('/home/abonnement/order/', 'AbonnementController@planOrder')->name('offer.get');

Route::post('/tout-les-theses/filtre', 'RechercheController@filter')->name('filtre');

/*Payment routes*/

Route::post('/home/abonnement/payment', 'AbonnementController@payment')->name('btn.payer');
Route::post('/home/abonnement/payment/notification', 'AbonnementController@notification')->name('payment.notif');
Route::post('/home/abonnement/payment/return', 'AbonnementController@return')->name('payment.return');
Route::post('/home/abonnement/payment/cancel', 'AbonnementController@cancel')->name('payment.cancel');





Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
/*Routes Offres*/
Route::get('admin/offres', 'OffreController@index')->name('offres.home');
Route::get('admin/offres/new', 'OffreController@create')->name('offres.show.form');
Route::get('admin/offres/{offre}/edit', 'OffreController@edit')->name('offres.edit.form');
Route::post('admin/offres/update', 'OffreController@update')->name('offres.update');
Route::post('/admin/offres/store', 'OffreController@store')->name('offres.store');
Route::post('admin/offres/delete/{offres}', 'OffreController@destroy')->name('theses.destroy');

/*Routes Theses*/
Route::get('admin/theses', 'TheseController@index')->name('theses.home');
Route::get('admin/theses/create', 'TheseController@create')->name('theses.add');
Route::post('admin/theses/', 'TheseController@store')->name('theses.store');
Route::get('admin/theses/{these}/edit', 'TheseController@edit')->name('theses.edit.form');
Route::post('admin/theses/update', 'TheseController@update')->name('theses.update');
Route::get('admin/theses/add/keywords/', 'TheseController@modalkeyword')->name('theses.modal.keywords');
Route::post('admin/theses/set/keywords/', 'TheseController@addkeyword')->name('theses.keywords.add');
Route::post('admin/theses/delete/{theses}', 'TheseController@destroy')->name('theses.destroy');

/*Routes Discipline*/
Route::get('admin/disciplines', 'DisciplineController@index')->name('disciplines.home');
Route::get('admin/disciplines/create', 'DisciplineController@create')->name('disciplines.add');
Route::post('admin/disciplines', 'DisciplineController@store')->name('disciplines.store');
Route::get('admin/disciplines/{discipline}/edit', 'DisciplineController@edit')->name('disciplines.edit.form');
Route::post('admin/disciplines/update', 'DisciplineController@update')->name('disciplines.update');
Route::post('admin/disciplines/delete/{disciplines}', 'DisciplineController@destroy')->name('disciplines.destroy');

/*Routes Universite*/
Route::get('admin/university', 'UniversiteController@index')->name('university.home');
Route::get('admin/university/create', 'UniversiteController@create')->name('university.add');
Route::post('admin/university', 'UniversiteController@store')->name('university.store');
Route::get('admin/university/{universite}/edit', 'UniversiteController@edit')->name('university.edit.form');
Route::post('admin/university/update', 'UniversiteController@update')->name('university.update');
Route::post('admin/university/delete/{university}', 'UniversiteController@destroy')->name('university.destroy');

/*Routes UFR*/
Route::get('admin/ufr', 'UfrController@index')->name('ufr.home');
Route::get('admin/ufr/create', 'UfrController@create')->name('ufr.add');
Route::post('admin/ufr', 'UfrController@store')->name('ufr.store');
Route::get('admin/ufr/{ufr}/edit', 'UfrController@edit')->name('ufr.edit.form');
Route::post('admin/ufr/update', 'UfrController@update')->name('ufr.update');
Route::post('admin/ufr/delete/{ufrs}', 'UfrController@destroy')->name('ufr.destroy');

/*Routes Departement*/
Route::get('admin/departement', 'DepartementController@index')->name('departement.home');
Route::get('admin/departement/create', 'DepartementController@create')->name('departement.add');
Route::post('admin/departement', 'DepartementController@store')->name('departement.store');
Route::get('admin/departement/{departement}/edit', 'DepartementController@edit')->name('department.edit.form');
Route::post('admin/departement/update', 'DepartementController@update')->name('departement.update');
Route::post('admin/departement/delete/{department}', 'DepartementController@destroy')->name('departement.destroy');


/*Routes Abonnement*/
Route::get('admin/abonnement', 'AbonnementController@forAdministration')->name('abonnement.admin.index');



/*Routes Utilisateur*/
Route::get('admin/utilisateur', 'UtilisateurController@index')->name('utilisateur.home');
Route::get('admin/utilisateur/create', 'UtilisateurController@create')->name('utilisateur.add');
Route::post('admin/user/delete/{user}', 'UtilisateurController@destroy' )->name('utilisateur.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
