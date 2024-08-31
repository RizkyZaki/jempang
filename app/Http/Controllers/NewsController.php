<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
  public function index()
  {
    return view('admin.pages.news.index', [
      'title' => 'Berita',
      'heading' => 'Data Berita',
      'data' => News::latest()->get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.pages.news.create', [
      'title' => 'Berita',
      'heading' => 'Tambah Berita',
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'slug' => 'required',
      'description' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
      'potrait' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
      'name.required' => 'Judul Tidak Boleh Kosong.',
      'description.required' => 'Deskripsi Tidak Boleh Kosong.',
      'slug.required' => 'Slug Tidak Boleh Kosong',
      'image.image' => 'File yang diunggah harus berupa gambar.',
      'image.mimes' => 'File gambar harus dalam format: jpeg, png, jpg, gif.',
      'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
    ]);

    $hashImage = null;

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $hashImage = md5($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
      $imagePath = 'assets/attach/' . $hashImage;
      $image->storeAs($imagePath);
    }

    News::create([
      'enhancer' => Auth::user()->id,
      'name' => $request->name,
      'slug' => $request->slug,
      'image' => $hashImage,
      'description' => $request->description,
    ]);

    return redirect('dashboard/news')->with('success', 'Berita Berhasil Dibuat');
  }


  /**
   * Display the specified resource.
   */
  public function show(News $info) {}

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($slug)
  {
    $news = News::where('slug', $slug)->first();
    return view('admin.pages.news.update', [
      'title' => 'Berita',
      'heading' => 'Ubah Data Berita',
      'data' => $news,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $slug)
  {
    // Validasi data dengan pesan kustom
    $news = News::where('slug', $slug)->first();
    $validatedData = $request->validate([
      'name' => 'required',
      'slug' => 'required',
      'description' => 'required',
      'image' => $request->hasFile('image') ? 'image|mimes:jpeg,png,jpg|max:2048' : '',
      'potrait' => $request->hasFile('potrait') ? 'image|mimes:jpeg,png,jpg|max:2048' : '',
    ], [
      'name.required' => 'Judul Tidak Boleh Kosong.',
      'slug.required' => 'Slug Tidak Boleh Kosong',
      'description.required' => 'Deskripsi Tidak Boleh Kosong',
      'image.image' => 'File yang diunggah harus berupa gambar.',
      'image.mimes' => 'File gambar harus dalam format: jpeg, png, jpg, gif.',
      'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
    ]);

    if ($request->hasFile('image')) {
      if ($news->image) {
        Storage::delete('assets/attach/' . $news->image);
      }

      $image = $request->file('image');
      $hashLS = md5($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
      $image->storeAs('assets/attach', $hashLS);

      $news->image = $hashLS;
    }
    $news->name = $request->name;
    $news->description = $request->description;
    $news->slug = $request->slug;
    $news->save();

    return redirect('dashboard/news')->with('success', 'Berita berhasil diubah');
  }



  /**
   * Remove the specified resource from storage.
   */
  public function destroy($slug)
  {
    $info = News::where('slug', $slug)->first();

    if ($info) {

      $info->delete();

      return response()->json([
        'status' => 'true',
        'title' => 'Berhasil',
        'description' => 'Berita berhasil dihapus.',
        'icon' => 'success',
      ]);
    } else {
      return response()->json([
        'status' => 'false',
        'title' => 'Gagal',
        'description' => 'Berita tidak ditemukan.',
        'icon' => 'error',
      ]);
    }
  }
}
