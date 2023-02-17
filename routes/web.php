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
//acceuil
Route::get('/', [App\Http\Controllers\AccueilController::class, 'index']);

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});



//login with google
Route::get('/auth/google', [App\Http\Controllers\GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('/auth/google/call-back', [App\Http\Controllers\GoogleAuthController::class, 'callbackGoogle']);

//login with google
Route::get('/auth/facebook', [App\Http\Controllers\FacebookAuthController::class, 'redirect'])->name('facebook.auth');
Route::get('/auth/facebook/call-back', [App\Http\Controllers\FacebookAuthController::class, 'callbackFacebook']);



Route::middleware(['auth'])->group(function(){
    Route::post('/produit/ajouter', [App\Http\Controllers\CartController::class, 'store'])->name('produit.cart.add');
});

//ckeditor
Route::post('/ckeditor/image_upload', [App\Http\Controllers\AccueilController::class, 'store'])->name('upload');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::namespace('App\Http\Controllers\Admin')->group(function (){
    Route::get('/administration', function (){
        return redirect('/administration/login');
    });
    Route::get('/administration/login','Auth\AuthenticatedSessionController@create')->name('administration.login');
    Route::post('/administration/login', 'Auth\AuthenticatedSessionController@store');
    Route::get('/administration/home','AdminController@index')->name('administration.home');
    //logout
    Route::post('/administration/logout', 'Auth\AuthenticatedSessionController@destroy')->name('administration.logout');
    //register
    Route::get('/administration/register', 'Auth\RegisteredUserController@create')->name('administration.register');
    Route::post('/administration/register', 'Auth\RegisteredUserController@store');

    //shop categorie
    Route::get('/administration/super-categorie','SuperCategorieController@index')->name('administration.super-categorie');
    Route::post('/administration/super-categorie','SuperCategorieController@store');
    Route::get('/administration/super-categorie/add','SuperCategorieController@Add')->name('administration.super-categorie-add');
    Route::get('/administration/super-categorie/edit/{id}','SuperCategorieController@edit')->name('administration.super-categorie.edit');
    Route::post('/administration/super-categorie/edit/{id}','SuperCategorieController@update');
    Route::get('/administration/super-categorie/destroy/{id}','SuperCategorieController@destroy')->name('administration.super-categorie.delete');

    //shop sous categorie
    Route::get('/administration/categorie','CategorieController@index')->name('administration.categorie');
    Route::post('/administration/categorie','CategorieController@store');
    Route::get('/administration/categorie/add','CategorieController@Add')->name('administration.categorie-add');
    Route::get('/administration/categorie/edit/{id}','CategorieController@edit')->name('administration.categorie.edit');
    Route::post('/administration/categorie/edit/{id}','CategorieController@update');
    Route::get('/administration/categorie/destroy/{id}','CategorieController@destroy')->name('administration.categorie.delete');

    //shop super categorie
    Route::get('/administration/super','SuperController@index')->name('administration.super');
    Route::post('/administration/super','SuperController@store');
    Route::get('/administration/super/add','SuperController@Add')->name('administration.super-add');
    Route::get('/administration/super/edit/{id}','SuperController@edit')->name('administration.super.edit');
    Route::post('/administration/super/edit/{id}','SuperController@update');
    Route::get('/administration/super/destroy/{id}','SuperController@destroy')->name('administration.super.delete');

    //shop vitrine categorie
    Route::get('/administration/vitrine','VitrineControlle@index')->name('administration.vitrine');
    Route::post('/administration/vitrine','VitrineControlle@store');
    Route::get('/administration/vitrine/add','VitrineControlle@Add')->name('administration.vitrine-add');
    Route::get('/administration/vitrine/edit/{id}','VitrineControlle@edit')->name('administration.vitrine.edit');
    Route::post('/administration/vitrine/edit/{id}','VitrineControlle@update');
    Route::get('/administration/vitrine/destroy/{id}','VitrineControlle@destroy')->name('administration.vitrine.delete');

    //shop promotion 
    Route::get('/administration/promotion','PromotionControlle@index')->name('administration.promotion');
    Route::post('/administration/promotion','PromotionControlle@store');
    Route::get('/administration/promotion/add','PromotionControlle@Add')->name('administration.promotion-add');
    Route::get('/administration/promotion/edit/{id}','PromotionControlle@edit')->name('administration.promotion.edit');
    Route::post('/administration/promotion/edit/{id}','PromotionControlle@update');
    Route::get('/administration/promotion/destroy/{id}','PromotionControlle@destroy')->name('administration.promotion.delete');

    //shop offre 
    Route::get('/administration/offre','OffreController@index')->name('administration.offre');
    Route::post('/administration/offre','OffreController@store');
    Route::get('/administration/offre/add','OffreController@Add')->name('administration.offre-add');
    Route::get('/administration/offre/edit/{id}','OffreController@edit')->name('administration.offre.edit');
    Route::post('/administration/offre/edit/{id}','OffreController@update');
    Route::get('/administration/offre/destroy/{id}','OffreController@destroy')->name('administration.offre.delete');

    //shop taille 
    Route::get('/administration/taille','TailleController@index')->name('administration.taille');
    Route::post('/administration/taille','TailleController@store');
    Route::get('/administration/taille/add','TailleController@Add')->name('administration.taille-add');
    Route::get('/administration/taille/edit/{id}','TailleController@edit')->name('administration.taille.edit');
    Route::post('/administration/taille/edit/{id}','TailleController@update');
    Route::get('/administration/taille/destroy/{id}','TailleController@destroy')->name('administration.taille.delete');

    //shop couleur 
    Route::get('/administration/couleur','CouleurController@index')->name('administration.couleur');
    Route::post('/administration/couleur','CouleurController@store');
    Route::get('/administration/couleur/add','CouleurController@Add')->name('administration.couleur-add');
    Route::get('/administration/couleur/edit/{id}','CouleurController@edit')->name('administration.couleur.edit');
    Route::post('/administration/couleur/edit/{id}','CouleurController@update');
    Route::get('/administration/couleur/destroy/{id}','CouleurController@destroy')->name('administration.couleur.delete');

    //shop produit 
    Route::get('/administration/produit','ProduitController@index')->name('administration.produit');
    Route::post('/administration/produit','ProduitController@store');
    Route::get('/administration/produit/add','ProduitController@Add')->name('administration.produit-add');
    Route::get('/administration/produit/edit/{id}','ProduitController@edit')->name('administration.produit.edit');
    Route::post('/administration/produit/edit/{id}','ProduitController@update');
    Route::get('/administration/produit/destroy/{id}','ProduitController@destroy')->name('administration.produit.delete');

    Route::get('/administration/produit/search','ProduitController@Search')->name('administration.produit.search');

    //shop produit 
    Route::get('/administration/slider','SliderController@index')->name('administration.slider');
    Route::post('/administration/slider','SliderController@store');
    Route::get('/administration/slider/add','SliderController@Add')->name('administration.slider-add');
    Route::get('/administration/slider/edit/{id}','SliderController@edit')->name('administration.slider.edit');
    Route::post('/administration/slider/edit/{id}','SliderController@update');
    Route::get('/administration/slider/destroy/{id}','SliderController@destroy')->name('administration.slider.delete');

    //vente en gros 
    Route::get('/administration/gros','VenteGrosController@index')->name('administration.gros');
    Route::post('/administration/gros','VenteGrosController@store');
    Route::get('/administration/gros/add','VenteGrosController@Add')->name('administration.gros-add');
    Route::get('/administration/gros/edit/{id}','VenteGrosController@edit')->name('administration.gros.edit');
    Route::post('/administration/gros/edit/{id}','VenteGrosController@update');
    Route::get('/administration/gros/destroy/{id}','VenteGrosController@destroy')->name('administration.gros.delete');

    //vente en demi-gros 
    Route::get('/administration/demi-gros','VenteDemiGrosController@index')->name('administration.demi-gros');
    Route::post('/administration/demi-gros','VenteDemiGrosController@store');
    Route::get('/administration/demi-gros/add','VenteDemiGrosController@Add')->name('administration.demi-gros-add');
    Route::get('/administration/demi-gros/edit/{id}','VenteDemiGrosController@edit')->name('administration.demi-gros.edit');
    Route::post('/administration/demi-gros/edit/{id}','VenteDemiGrosController@update');
    Route::get('/administration/demi-gros/destroy/{id}','VenteDemiGrosController@destroy')->name('administration.demi-gros.delete');


    //partenaire 
    Route::get('/administration/partenaire','PartenaireController@index')->name('administration.partenaire');
    Route::post('/administration/partenaire','PartenaireController@store');
    Route::get('/administration/partenaire/add','PartenaireController@Add')->name('administration.partenaire-add');
    Route::get('/administration/partenaire/edit/{id}','PartenaireController@edit')->name('administration.partenaire.edit');
    Route::post('/administration/partenaire/edit/{id}','PartenaireController@update');
    Route::get('/administration/partenaire/destroy/{id}','PartenaireController@destroy')->name('administration.partenaire.delete');

     //partenaire 
     Route::get('/administration/about','AboutController@index')->name('administration.about');
     Route::post('/administration/about','AboutController@store');
     Route::get('/administration/about/add','AboutController@Add')->name('administration.about-add');
     Route::get('/administration/about/edit/{id}','AboutController@edit')->name('administration.about.edit');
     Route::post('/administration/about/edit/{id}','AboutController@update');
     Route::get('/administration/about/destroy/{id}','AboutController@destroy')->name('administration.about.delete');

     //marque 
    Route::get('/administration/marque','MarqueController@index')->name('administration.marque');
    Route::post('/administration/marque','MarqueController@store');
    Route::get('/administration/marque/add','MarqueController@Add')->name('administration.marque-add');
    Route::get('/administration/marque/edit/{id}','MarqueController@edit')->name('administration.marque.edit');
    Route::post('/administration/marque/edit/{id}','MarqueController@update');
    Route::get('/administration/marque/destroy/{id}','MarqueController@destroy')->name('administration.marque.delete');


    //blog-categorie
    Route::get('/administration/blog-categorie','BlogCategorieController@index')->name('administration.blog.categorie');
    Route::post('/administration/blog-categorie','BlogCategorieController@store');
    Route::get('/administration/blog-categorie/add','BlogCategorieController@Add')->name('administration.blog.categorie-add');
    Route::get('/administration/blog-categorie/edit/{id}','BlogCategorieController@edit')->name('administration.blog.categorie.edit');
    Route::post('/administration/blog-categorie/edit/{id}','BlogCategorieController@update');
    Route::get('/administration/blog-categorie/destroy/{id}','BlogCategorieController@destroy')->name('administration.blog.categorie.delete');

    //blog
    Route::get('/administration/blog','BlogController@index')->name('administration.blog');
    Route::post('/administration/blog','BlogController@store');
    Route::get('/administration/blog/add','BlogController@Add')->name('administration.blog-add');
    Route::get('/administration/blog/edit/{id}','BlogController@edit')->name('administration.blog.edit');
    Route::post('/administration/blog/edit/{id}','BlogController@update');
    Route::get('/administration/blog/destroy/{id}','BlogController@destroy')->name('administration.blog.delete');

    //faq
    Route::get('/administration/faq','FaqController@index')->name('administration.faq');
    Route::post('/administration/faq','FaqController@store');
    Route::get('/administration/faq/add','FaqController@Add')->name('administration.faq-add');
    Route::get('/administration/faq/edit/{id}','FaqController@edit')->name('administration.faq.edit');
    Route::post('/administration/faq/edit/{id}','FaqController@update');
    Route::get('/administration/faq/destroy/{id}','FaqController@destroy')->name('administration.faq.delete');

    //Comment
    Route::get('/administration/comment','CommentController@index')->name('administration.comment');
    Route::post('/administration/comment','CommentController@store');
    Route::get('/administration/comment/add','CommentController@Add')->name('administration.comment-add');

    Route::get('/administration/comment/show/{id}','CommentController@show')->name('administration.comment.show');
    Route::get('/administration/comment/edit/{id}','CommentController@edit')->name('administration.comment.edit');
    Route::post('/administration/comment/edit/{id}','CommentController@update');
    Route::get('/administration/comment/destroy/{id}','CommentController@destroy')->name('administration.comment.delete');

    //page
    Route::get('/administration/page','PageController@index')->name('administration.page');
    Route::post('/administration/page','PageController@store');
    Route::get('/administration/page/add','PageController@Add')->name('administration.page-add');
    Route::get('/administration/page/edit/{id}','PageController@edit')->name('administration.page.edit');
    Route::post('/administration/page/edit/{id}','PageController@update');
    Route::get('/administration/page/destroy/{id}','PageController@destroy')->name('administration.page.delete');

    //commande-en-cours en cours
    Route::get('/administration/commande-en-cours','CommandeController@index')->name('administration.commande-en-cours');
    Route::get('/administration/commande-en-cours-search','CommandeController@Search')->name('administration.commande-en-cours-search');

    Route::get('/administration/commande-en-cours-search-date','CommandeController@SearchDate')->name('administration.commande-en-cours-search-date');

    Route::get('/administration/commande-en-cours-search-interval-date','CommandeController@SearchIntervalDate')->name('administration.commande-en-cours-search-interval-date');

    Route::get('/administration/commande-en-cours/add','CommandeController@Add')->name('administration.commande-en-cours-add');
    Route::get('/administration/commande-en-cours/edit/{order}','CommandeController@edit')->name('administration.commande-en-cours.edit');
    Route::get('/administration/commande-en-cours/update/{order}','CommandeController@update')->name('administration.commande-en-cours.valider');
    Route::get('/administration/commande-en-cours/send/{order}','CommandeController@SendClient')->name('administration.commande-en-cours.envoyer');
    Route::get('/administration/commande-en-cours/destroy/{id}','CommandeController@destroy')->name('administration.commande-en-cours.delete');

    //commande réglées
    Route::get('/administration/commande-valide','CommandeValideController@index')->name('administration.commande-valide');
    Route::get('/administration/commande-valide-search','CommandeValideController@Search')->name('administration.commande-valide-search');

    Route::get('/administration/commande-valide-search-date','CommandeValideController@SearchDate')->name('administration.commande-valide-search-date');

    Route::get('/administration/commande-valide-search-interval-date','CommandeValideController@SearchIntervalDate')->name('administration.commande-valide-search-interval-date');

    Route::get('/administration/commande-valide/add','CommandeValideController@Add')->name('administration.commande-valide-add');
    Route::get('/administration/commande-valide/edit/{order}','CommandeValideController@edit')->name('administration.commande-valide.edit');
    Route::get('/administration/commande-valide/update/{order}','CommandeValideController@update')->name('administration.commande-valide.invalider');
    Route::get('/administration/commande-valide/send/{order}','CommandeValideController@SendClient')->name('administration.commande-valide.envoyer');
    Route::get('/administration/commande-valide/destroy/{id}','CommandeValideController@destroy')->name('administration.commande-valide.delete');


    //commande annulées
    Route::get('/administration/commande-annulee','CommandeAnnuleeController@index')->name('administration.commande-annulee');
    Route::get('/administration/commande-annulee-search','CommandeAnnuleeController@Search')->name('administration.commande-annulee-search');

    Route::get('/administration/commande-annulee-search-date','CommandeAnnuleeController@SearchDate')->name('administration.commande-annulee-search-date');

    Route::get('/administration/commande-annulee-search-interval-date','CommandeAnnuleeController@SearchIntervalDate')->name('administration.commande-annulee-search-interval-date');

    Route::get('/administration/commande-annulee/add','CommandeAnnuleeController@Add')->name('administration.commande-annulee-add');
    Route::get('/administration/commande-annulee/edit/{order}','CommandeAnnuleeController@edit')->name('administration.commande-annulee.edit');
    Route::get('/administration/commande-annulee/update/{order}','CommandeAnnuleeController@update')->name('administration.commande-annulee.invalider');
    Route::get('/administration/commande-annulee/send/{order}','CommandeAnnuleeController@SendClient')->name('administration.commande-annulee.envoyer');
    Route::get('/administration/commande-annulee/destroy/{order}','CommandeAnnuleeController@destroy')->name('administration.commande-annulee.delete');

    //avis
    Route::get('/administration/avis','AvisController@index')->name('administration.avis');
    Route::post('/administration/avis','AvisController@store');
    Route::get('/administration/avis/add','AvisController@Add')->name('administration.avis-add');

    Route::get('/administration/avis/show/{id}','AvisController@show')->name('administration.avis.show');
    Route::get('/administration/avis/edit/{id}','AvisController@edit')->name('administration.avis.edit');
    Route::post('/administration/avis/edit/{id}','AvisController@update');
    Route::get('/administration/avis/destroy/{id}','AvisController@destroy')->name('administration.avis.delete');
    
});


//redirection

Route::get('/shop/detail/language/fr', function (){
    return redirect('/');
});

Route::get('/shop/detail/language/en', function (){
    return redirect('/');
});

Route::get('/produit-categorie/language/fr', function (){
    return redirect('/');
});

Route::get('/produit-categorie/language/en', function (){
    return redirect('/');
});

Route::get('/produit-detail/language/en', function (){
    return redirect('/');
});

Route::get('/produit-detail/language/fr', function (){
    return redirect('/');
});
