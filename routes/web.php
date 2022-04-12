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
//NEW
// Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);
// Route::post('/login',['as' => 'login','uses'=>'LoginController@postLogin']);

// Route::get('/welcome',function(){
//     return view('/welcome');
// });

// Route::group(['middleware' => ['authen']], function(){
//     Route::get('/logout'    ,['as' => 'logout',     'uses' => 'LoginController@getLogout']);
//     Route::get('/dashboard' ,['as' => 'dashboard',  'uses' => 'DashboardController@dashboard']);
// });

// Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){
//     //for admin

//     Route::get('/test',function(){
//         echo 'this is for admin test';
//     });
// });

// OLD
Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister','SiteController@postregister');
Route::get('/gallery','SiteController@gallery');
Route::get('/tentang','SiteController@tentang');
Route::get('/kontak','SiteController@kontak');
Route::get('/indexKegiatan','SiteController@indexKegiatan');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
Route::get('/sisya/{sisya}/password', 'PasswordController@edit')->name('sisya.password.edit');
Route::patch('/sisya/{sisya}/password', 'PasswordController@update')->name('sisya.password.update');

Route::get('/sisya/{sisya}/edit','SisyaController@edit')->name('sisya.edit');
Route::post('/sisya/{sisya}/update','SisyaController@update');
Route::get('/sisya','SisyaController@index');
Route::get('/sisya/{sisya}/profile','SisyaController@profile');
Route::get('/nabe','NabeController@index');
Route::get('/kegiatan/{id}/show','KegiatanController@showKegiatan');
Route::get('/index','KegiatanController@index')->name('kegiatan.index');
Route::get('/posts','PostController@index')->name('posts.index');

Route::group(['middleware' => ['auth','checkRole:admin,pengunjung']],function(){
    //route sisya
    Route::post('/sisya/create','SisyaController@create');
    Route::get('/sisya/{sisya}/delete','SisyaController@delete');
    Route::post('/sisya/{id}/addnilai','SisyaController@addnilai');
    Route::get('/sisya/{id}/{idmapel}/deletenilai','SisyaController@deletenilai');
    Route::get('/sisya/exportexcel','SisyaController@exportExcel');
    Route::get('/sisya/exportpdf','SisyaController@exportPDF');
    Route::post('/sisya/import','SisyaController@importexcel')->name('sisya.import');
    
    //route postingan
    Route::get('/post/{id}/delete','PostController@delete');
    Route::get('/post/{id}/edit','PostController@edit')->name('posts.edit');
    Route::post('/post/{id}/update','PostController@update');
   
    Route::get('post/add',[
        'uses' => 'PostController@add',
        'as' => 'posts.add'
        ]);
    Route::post('post/create',[
        'uses' => 'PostController@create',
        'as' => 'posts.create'
    ]);

    //route nabe
   
    Route::post('/nabe/create','NabeController@create');
    Route::get('/nabe/{id}/edit','NabeController@edit');
    Route::post('/nabe/{id}/update','NabeController@update');
    Route::get('/nabe/{id}/delete','NabeController@delete');
    Route::get('/nabe/{id}/profile','NabeController@profile');
    Route::get('/profilenabe','NabeController@profilenabe');

    //route kelas
    Route::get('/kelas','KelasController@index');
    Route::post('/kelas/create','KelasController@create');
    Route::get('/kelas/{id}/edit','KelasController@edit');
    Route::post('/kelas/{id}/update','KelasController@update');
    Route::get('/kelas/{id}/delete','KelasController@delete');
   
    //route detailkelas
    Route::get('/kelas/{id}/detail','KelasController@detail');
    Route::get('/kelas/{id}/list','KelasController@list');
    Route::get('/kelas/{id}/deletesisya','KelasController@deletesisya');
    Route::post('/kelas/createDetail','KelasController@createDetail');
    Route::get('/kelas/{id}/editDetail','KelasController@editDetail');
    Route::post('/kelas/{id}/updateDetail','KelasController@updateDetail');
    Route::get('/kelas/{id}/deleteDetail','KelasController@deleteDetail');
    Route::post('/kelas/{id}/detail/storedetailkelas','KelasController@storedetailkelas')->name('kelas.storedetailkelas');

    //route mapel
    Route::get('/mapel','MapelController@index')->name('mapel.index');;
    Route::post('/mapel/create','MapelController@create')->name('mapel.create');
    Route::get('/mapel/{id}/edit','MapelController@edit');
    Route::post('/mapel/{id}/update','MapelController@update');
    Route::get('/mapel/{id}/delete','MapelController@delete');
    Route::get('/mapel/{id}/profile','MapelController@profile'); // belum
    Route::get('/mapel/add','MapelController@add')->name('mapel.add');

    //route materi
    Route::get('/materi','MateriController@index')->name('materi.index');
    Route::post('/materi/create','MateriController@create');
    Route::get('/materi/{id}/edit','MateriController@edit');
    Route::post('/materi/{id}/update','MateriController@update');
    Route::get('/materi/{id}/delete','MateriController@delete');
    //belum

    //route soal
    Route::get('/soal','SoalController@index')->name('soal.create');
    Route::post('/soal/create','SoalController@create');
    Route::get('/soal/{id}/edit','SoalController@edit');
    Route::post('/soal/{id}/update','SoalController@update');
    Route::get('/soal/{id}/delete','SoalController@delete');
    Route::get('/soal/{id}/profile','SoalController@profile'); //belum
    Route::get('/soal/exportexcel','SoalController@exportExcel');
    Route::get('/soal/exportpdf','SoalController@exportPDF');
    Route::post('/soal/{id}/detailsoal/store','DetailstatussoalController@store')->name('detailsoalstatus.store');
    
    //route detailsoal
    Route::get('/soal/{id}','SoalController@show')->name('soal.detail');
    Route::get('/soal/{id}/view','SoalController@view');
    Route::post('/soal/createDetail','SoalController@createDetail');
    Route::post('/detailsoal/import','SoalController@importexcel')->name('soal.import');
    Route::get('/detailsoal/{id}/detailEdit','SoalController@detailEdit');
    Route::post('/detailsoal/{id}/detailUpdate','SoalController@detailUpdate');
    Route::get('/detailsoal/{id}/detailDelete','SoalController@detailDelete');
    Route::get('/detailsoal/{id}/detailView','SoalController@detailView');
    
    //banksoal
    Route::get('/banksoal','BanksoalController@index')->name('banksoal');
    Route::post('/banksoal/create','BanksoalController@create');
    Route::get('/banksoal/show','BanksoalController@show');
    Route::get('/banksoal/{id}/edit','BanksoalController@edit');
    Route::post('/banksoal/{id}/update','BanksoalController@update');
    Route::get('/banksoal/{id}/delete','BanksoalController@delete');
    Route::get('/banksoal/{id}/requestMateri','BanksoalController@requestMateri');

    //route buku
    Route::get('/buku','BukuController@index')->name('buku.index');
    Route::post('/buku/create','BukuController@create');
    Route::get('/buku/{id}/edit','BukuController@edit');
    Route::post('/buku/{id}/update','BukuController@update');
    Route::get('/buku/{id}/delete','BukuController@delete');

    Route::resource('/peminjaman','PeminjamanController');
    Route::resource('/pengembalian','PengembalianController');

    //coba upload
    Route::get('/upload','UploadController@upload');
    Route::post('/upload/process','UploadController@upload_process');

    //route tingkat
    Route::get('/tingkat','TingkatController@index')->name('tingkat.index');
    Route::post('/tingkat/create','TingkatController@create');
    Route::get('/tingkat/{id}/edit','TingkatController@edit');
    Route::post('/tingkat/{id}/update','TingkatController@update');
    Route::get('/tingkat/{id}/delete','TingkatController@delete');
    Route::get('/tingkat/{id}/profile','TingkatController@profile');
    //show materi
    
    //route aktivasi
    Route::get('/aktivsisya','AktivasiController@sisya');
    Route::get('/aktivnabe','AktivasiController@nabe');
    Route::get('/aktivadmin','AktivasiController@admin');

    //route laporan
    Route::get('/laporan','LaporanController@index')->name('laporan.index');
   
    Route::get('/laporan/{id}/hasil','LaporanController@hasil')->name('laporan.hasil');
    
    //route kegiatan
    
    Route::get('/kegiatan/add','KegiatanController@add');
    Route::post('kegiatan/create',[
        'uses' => 'KegiatanController@create',
        'as'   => 'kegiatan.create',
    ]);
    Route::get('/kegiatan/{id}/delete','KegiatanController@delete');
    Route::get('/kegiatan/{id}/edit','KegiatanController@edit')->name('kegiatan.edit');
    Route::post('/kegiatan/{id}/update','KegiatanController@update');
});


Route::group(['middleware' => ['auth','checkRole:admin,sisya,pengunjung']],function(){
    Route::get('/dashboard','DashboardController@index');
    Route::resource('/forum','ForumController');
    Route::resource('/tag','TagController');
    Route::get('/kegiatan{id}/next','KegiatanController@next')->name('kegiatan.next');
    Route::get('/forum/read/{slug}','ForumController@show')->name('forumslug');
    Route::post('/comment/addComment/{forum}','CommentController@addComment')->name('addComment');
    Route::post('/comment/replyComment/{comment}','CommentController@replyComment')->name('replyComment');
    Route::get('/cobadesign','ForumController@cobadesign');

    Route::get('/chat','ChatController@index');
    Route::get('/message/{id}','ChatController@getMessage')->name('message');
    Route::post('message','ChatController@sendMessage');
    
    // Route::post('/push','ChatController@push');
    // Route::post('ChatSession','ChatController@chatSession');
    // Route::post('textsession','ChatController@textsession');
    Route::post('/jawaban','JawabanController@postJawaban');

    Route::get('/sisya/{id}/showMateri','MateriController@showMateri')->name('showMateri');
    Route::get('/sisya/soal/{id}','SoalController@showSoal');
    Route::get('/materi/{id}/show','MateriController@show');


    route::post('/sisya/naiktingkat','SisyaController@requestNaikTingkat'); // naik tingkat

    Route::get('/singkat','SingkatController@index');
    Route::patch('/singkat/{naik_tingkat}/accept','SingkatController@accept');
});

Route::group(['midleware' => ['auth','checkRole:sisya']],function(){
    Route::get('profilesaya','SisyaController@profilesaya');
    Route::get('/editprofilesisya','SisyaController@editprofilesisya');    
});

Route::get('getdatasisya',[
    'uses' => 'SisyaController@getdatasisya',
    'as' => 'ajax.get.data.sisya'
]);

Route::get('/{slug}',[
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post'
]);

Route::get('kegiatan/{slug}',[
    'uses' => 'KegiatanController@showkegiatan',
    'as' => 'show.kegiatan'
]); 

// github
// git add .
// git commit -m "progress"
// git push -u elearning
    
//highchart
//x-editable
//export pdf & excel
//sweetalert
//toastr
//laravelcolective
//ckeditor
//laravel file manager
//slugable
//yajra datatables