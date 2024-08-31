@extends('client.layout.main')

@section('content-client')
    <section class="page-title gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Hubungi Kami</h1>
                        <nav class="transparent">
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item"><a href="https://ppid.purwakartakab.go.id/">Beranda</a></li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">Hubungi Kami</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
                    <div class="form-group">
                        <h4>Hubungi Kami</h4>
                        <span>Kirim pesan dan kami akan merespons secepat mungkin.</span>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Subjek</label>
                                <input type="text" name="subject" placeholder="Subjek" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea class="form-control" placeholder="Pesan" name="message"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 mt-3 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button class="btn theme-bg text-white btn-sm send custom-btn">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                    <div class="lmp_caption pl-lg-5">
                        <ol class="list-unstyled p-0">
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
                                    <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-home"></i></div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Alamat</h4>
                                    <p>
                                        {{ appSetting()->address }}</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
                                    <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-at"></i></div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Email</h4>
                                    <p>
                                        {{ appSetting()->email }}</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start my-3 my-md-4">
                                <div
                                    class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg-light">
                                    <div class="position-absolute theme-cl h5 mb-0"><i class="fas fa-phone-alt"></i></div>
                                </div>
                                <div class="ml-3 ml-md-4">
                                    <h4>Telepon</h4>
                                    <p>
                                        {{ appSetting()->phone }}</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
