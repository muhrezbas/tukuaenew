<?php
use App\Blog;
use App\User;


Route::get('/tes', function () {
    return view('layout_master.tes');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@home');
Route::get('/contact', 'AboutController@contact');
Route::get('/contact1', 'BelajarController@index');
Route::get('/blog/{id}', 'BlogController@tampilkanID');
Route::get('/about', 'AboutController@index');

Route::get('/tambah', function()
{
    $blog = new Blog;  
    $blog->judul = "Judul Pertama";
    $blog->deskripsi = "Deskripsi nya disini, contoh menambah data pada route.";
    $blog->save();    
});
Route::get('/update', function()
{
    $blog = Blog::find(1);  
    $blog->judul = "Judul Diedit";
    $blog->deskripsi = "Deskripsi juga sudah di Edit";
    $blog->save();
});
Route::get('/tampil', function()
{
    $blog = Blog::all();
    echo "<ul>";
    foreach($blog as $blog)
    {
       echo "<li>"; 
       echo "<b>Judul nya</b> : "; 
       echo $blog->judul;
       echo " <b>Deskripsi nya</b> : "; 
       echo $blog->deskripsi; 
       echo "</li>";
    } 
    echo "</ul>";
});
Route::get('/hapus', function()
{
    $blog = Blog::find(2);
    $blog->delete();    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'ProdukController@index')->name('home');
Route::get('/content/{nama_subkategori?}/{nama_kategori?}/{nama_jenis?}', 'ProdukController@index')->name('content');
// Route::get('/subkategori/{nama_subkategori?}', 'ProdukController@subkategori')->name('content');
// Route::get('/kategori/{nama_kategori?}', 'ProdukController@kategori')->name('content');


Route::get('/blog', 'BlogController@index')->name('blogmedium');

Route::get('/product/{id}', 'ProdukController@tampilkanProduk')->name('produk');
Route::post('/product/filterbrand', 'ProdukController@filterBrand')->name('brand');
Route::get('/brand/{nama_brand?}', 'ProdukController@tampilkanBrand')->name('brand');
Route::get('/article/brand/{nama_brand?}', 'BlogController@tampilkanBrand')->name('brand');
Route::get('/video/brand/{nama_brand?}', 'VideoController@tampilkanBrand')->name('brand');
Route::post('/search', 'ProdukController@search')->name('search');






















Route::get('/blog/{id}', 'BlogController@tampilkanBlog')->name('blog');

Route::get('/video', 'VideoController@index')->name('video');

Route::get('/sidebar', 'KategoriController@index')->name('kategori');

 Route::get('/tukuae2017admin', 'GrafikController@login')->name('loginadmin');
Route::group(['middleware' => ['auth']], function () {

Route::get('/destroy/{id_transaksi}', 'ReviewController@destroy')->name('hapuss');

Route::get('/ongkir',  'OngkirController@index')->name('ongkir');
Route::get('/kurir',  'OngkirController@kurir')->name('kurir');
Route::post('ongkir/simpan',  'OngkirController@simpan')->name('simpan');
Route::get('/bayar',  'BayarController@index')->name('bayar');
Route::post('bayar/simpan',  'BayarController@simpan')->name('bayar');
Route::get('/review',  'ReviewController@index')->name('review');
Route::post('review/simpan',  'ReviewController@simpan')->name('review');
Route::get('/detail',  'ReviewController@detail')->name('detail');
Route::get('/history',  'ReviewController@history')->name('history');
Route::get('/konfirmasi',  'ReviewController@konfirmasi')->name('konfirmasi');
Route::post('/konfirmasi/simpan',  'ReviewController@simpanKonfirmasi')->name('konfirmasi');
Route::post('/rate/{id_transaksi}',  'ReviewController@rating')->name('rating');


Route::get('/cart',  'KeranjangController@index')->name('cart');
Route::post('/keranjang/simpan/', 'KeranjangController@tambah')->name('publishdong');
Route::get('/keranjang/update/{id}/{jumlah}',  'KeranjangController@postUpdate')->name('cart');
Route::get('/keranjang/delete/{id}/',  'KeranjangController@delete')->name('cart');

Route::get('/alamat',  'AlamatController@index')->name('alamat');
Route::get('/kota/{id}',  'AlamatController@kota')->name('kota');
Route::get('/kota', function () {
    $url = "http://api.rajaongkir.com/starter/city";
    $response = \Httpful\Request::get($url)
        ->addHeaders(array('key' => '8a139d4ada80a196c057bc885ba410c6',))
    ->expectsJson()
    ->send();
    $kota= $response->body->rajaongkir->results;
    return $kota;
});
Route::get('/provinsi', function () {
    $url = "http://api.rajaongkir.com/starter/province";
    $response = \Httpful\Request::get($url)
        ->addHeaders(array('key' => '8a139d4ada80a196c057bc885ba410c6',))
    ->expectsJson()
    ->send();
    $provinsi= $response->body->rajaongkir->results;
    return $provinsi;   
});
Route::post('alamat/simpan',  'AlamatController@simpan')->name('simpan');


});


Route::group(['middleware' => ['LevelAdmin','auth']], function () {





Route::get('/customer', 'AdminCustomerController@index')->name('customeradmin');
Route::get('/customer/edit/{id}', 'AdminCustomerController@showEdit')->name('customeradmin');
Route::post('/customer/update/{id}', 'AdminCustomerController@postUpdate')->name('customeradmin');
Route::get('/rekeningadmin', 'AdminRekeningController@index')->name('adminjenis');
Route::post('/rekeningadmin/simpan', 'AdminRekeningController@tambah')->name('publishdong');
Route::get('/rekeningadmin/edit/{id_rekening}', 'AdminRekeningController@showEdit')->name('publishdong');
Route::post('/rekeningadmin/update/{id_rekening}', 'AdminRekeningController@postUpdate')->name('publishdong');



Route::get('/admin', 'GrafikController@index')->name('beranda');
Route::post('/admin', 'GrafikController@index')->name('beranda');



Route::get('/videoadmin', 'PublishVideoController@index')->name('publish');
Route::post('/videoadmin/simpan', 'PublishVideoController@tambah')->name('publish');
Route::get('/videoadmin/edit/{id_video}', 'PublishVideoController@showEdit')->name('publish');
Route::post('/videoadmin/update/{id_video}', 'PublishVideoController@postUpdate')->name('publish');

Route::get('/blogadmin', 'PublishBlogController@index')->name('publishdong');
Route::post('/blogadmin/simpan', 'PublishBlogController@tambah')->name('publishdong');
Route::get('/blogadmin/edit/{id_blog}', 'PublishBlogController@showEdit')->name('publishdong');
Route::post('/blogadmin/update/{id_blog}', 'PublishBlogController@postUpdate')->name('publishdong');

Route::get('/jenisadmin', 'AdminJenisController@index')->name('adminjenis');
Route::post('/jenisadmin/simpan', 'AdminJenisController@tambah')->name('publishdong');
Route::get('/jenisadmin/edit/{id_jenis}', 'AdminJenisController@showEdit')->name('publishdong');
Route::post('/jenisadmin/update/{id_jenis}', 'AdminJenisController@postUpdate')->name('publishdong');

Route::get('/kategoriadmin', 'AdminKategoriController@index')->name('adminjenis');
Route::post('/kategoriadmin/simpan', 'AdminKategoriController@tambah')->name('publishdong');
Route::get('/kategoriadmin/edit/{id_kategori}', 'AdminKategoriController@showEdit')->name('publishdong');
Route::post('/kategoriadmin/update/{id_kategori}', 'AdminKategoriController@postUpdate')->name('publishdong');

Route::get('/produkadmin', 'AdminProdukController@index')->name('adminjenis');
Route::post('/produkadmin/simpan', 'AdminProdukController@tambah')->name('publishdong');
Route::get('/produkadmin/edit/{id_produk}', 'AdminProdukController@showEdit')->name('publishdong');
Route::post('/produkadmin/update/{id_produk}', 'AdminProdukController@postUpdate')->name('publishdong');

Route::get('/brandadmin', 'AdminBrandController@index')->name('adminjenis');
Route::post('/brandadmin/simpan', 'AdminBrandController@tambah')->name('publishdong');
Route::get('/brandadmin/edit/{id_brand}', 'AdminBrandController@showEdit')->name('publishdong');
Route::post('/brandadmin/update/{id_brand}', 'AdminBrandController@postUpdate')->name('publishdong');

Route::get('/subkategoriadmin', 'AdminSubkategoriController@index')->name('adminjenis');
Route::post('/subkategoriadmin/simpan', 'AdminSubkategoriController@tambah')->name('publishdong');
Route::get('/subkategoriadmin/edit/{id_subkategori}', 'AdminSubkategoriController@showEdit')->name('publishdong');
Route::post('/subkategoriadmin/update/{id_subkategori}', 'AdminSubkategoriController@postUpdate')->name('publishdong');

Route::get('/ukuran', 'AdminUkuranController@index')->name('adminjenis');
Route::post('/ukuran/simpan', 'AdminUkuranController@tambah')->name('publishdong');
Route::get('/ukuran/edit/{id_ukuran}', 'AdminUkuranController@showEdit')->name('publishdong');
Route::post('/ukuran/update/{id_ukuran}', 'AdminUkuranController@postUpdate')->name('publishdong');

Route::get('/pembayaranadmin', 'AdminTransaksiController@index')->name('adminjenis');
Route::get('/pembayaranadmin/edit/{id_transaksi}', 'AdminTransaksiController@showEditTransaksi')->name('publishdong');
Route::post('/pembayaranadmin/update/{id_transaksi}', 'AdminTransaksiController@updateTransaksi')->name('publishdong');


Route::get('/pembayaranadmin/detail/{id}', 'AdminTransaksiController@detail')->name('adminjenis');
Route::get('/pembayaranadmin/detail/edit/{id}', 'AdminTransaksiController@showEditDetail')->name('adminjenis');
Route::post('/pembayaranadmin/detail/update/{id}', 'AdminTransaksiController@updateDetailTransaksi')->name('adminjenis');
Route::get('/pembayaranadmin/{url}', 'AdminTransaksiController@index')->name('adminjenis');


Route::get('/pengiriman', 'AdminTransaksiController@pengiriman')->name('adminjenis');
Route::get('/pengiriman/edit/{id_pengiriman}', 'AdminTransaksiController@showEditPengiriman')->name('adminjenis');
Route::post('/pengiriman/update/{id_pengiriman}', 'AdminTransaksiController@updatePengiriman')->name('adminjenis');
Route::get('/pengiriman/{url}', 'AdminTransaksiController@pengiriman')->name('adminjenis'); 


Route::get('/konfirmasipembayaranadmin', 'AdminTransaksiController@konfirmasi_pembayaran')->name('admin');
Route::get('/konfirmasipembayaranadmin/edit/{id_pembayaran}', 'AdminTransaksiController@showEditPembayaran')->name('publishdong');
Route::post('/konfirmasipembayaranadmin/update/{id_pembayaran}', 'AdminTransaksiController@updatePembayaran')->name('publishdong');
Route::get('/konfirmasipembayaranadmin/{url}', 'AdminTransaksiController@konfirmasi_pembayaran')->name('publishdong');  
Route::get('/jenisadmin/jenis/{id}', 'AdminjenisController@jenis')->name('adminjenis');
Route::get('/kategoriadmin/kategori/{id}', 'AdminkategoriController@kategori')->name('adminjenis');
});


