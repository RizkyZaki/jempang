<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function login()
  {
    return view('admin.pages.auth.login', [
      'title' => 'Masuk Akun',
    ]);
  }
  public function register()
  {
    return view('admin.pages.auth.register', [
      'title' => 'Masuk Akun',
    ]);
  }
  public function authenticated(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required',
    ], [
      'email.required' => 'Email harus diisi.',
      'email.email' => 'Format email tidak valid.',
      'password.required' => 'Kata Sandi harus diisi.',
    ]);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();

      return response()->json([
        'status' => 'false',
        'title' => 'Error',
        'description' => $errors[0],
        'icon' => 'error'
      ]);
    }
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      $request->session()->regenerate();
      return response()->json([
        'status' => 'true',
        'title' => 'Selamat Datang',
        'description' => 'Sesaat lagi anda akan diarahkan ke halaman Dashboard',
        'icon' => 'success'
      ]);
    } else {
      return response()->json([
        'status' => 'false',
        'title' => 'Error',
        'description' => 'Email atau Kata Sandi salah.',
        'icon' => 'error'
      ]);
    }
  }
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
    ], [
      'email.required' => 'Email harus diisi.',
      'email.email' => 'Format email tidak valid.',
      'password.required' => 'Kata Sandi harus diisi.',
    ]);
    if ($validator->fails()) {
      $errors = $validator->errors()->all();

      return response()->json([
        'status' => 'false',
        'title' => 'Error',
        'description' => $errors[0],
        'icon' => 'error'
      ]);
    }
    $data = [
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => 2
    ];
    User::create($data);
    return response()->json([
      'status' => 'true',
      'title' => 'Berhasil',
      'description' => 'berhasil daftar',
      'icon' => 'success'
    ]);
  }
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();


    return redirect('/');
  }
}
