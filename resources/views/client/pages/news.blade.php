@extends('client.layout.main')

@section('content-client')
    <section class="page-title gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Berita</h1>
                        <nav class="transparent">
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item"><a href="https://ppid.purwakartakab.go.id/">Beranda</a></li>
                                <li class="breadcrumb-item active theme-cl" aria-current="page">Berita</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="crs_grid">
                            <div class="crs_grid_thumb">
                                <a href="https://ppid.purwakartakab.go.id/read/program-sikomandan-purwakarta-tingkatkan-populasi-ribuan-ekor-ternak"
                                    class="crs_detail_link">
                                    <img src="https://ppid.purwakartakab.go.id/assets/upload/images/berita/91037ceffbbd37adf66785cb06a5f98a.jpg"
                                        class="img-cover rounded"
                                        alt="Program SIKOMANDAN Purwakarta Tingkatkan Populasi Ribuan Ekor Ternak">
                                </a>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_8"><span>Berita</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_inrolled"><strong>62</strong>Membaca</div>
                                    </div>
                                </div>
                                <div class="crs_title">
                                    <h4><a title="Program SIKOMANDAN Purwakarta Tingkatkan Populasi Ribuan Ekor Ternak"
                                            href="https://ppid.purwakartakab.go.id/read/program-sikomandan-purwakarta-tingkatkan-populasi-ribuan-ekor-ternak"
                                            class="crs_title_link overflow">Program SIKOMANDAN Purwakarta Tingkatkan
                                            Populasi Ribuan Ekor Ternak</a></h4>
                                </div>
                                <div class="crs_info_detail">
                                    <ul>
                                        <li><i class="fa fa-clock text-danger"></i><span>16 Agustus 2024 10:08</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="crs_grid_foot">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_tutor">
                                            <div class="crs_tutor_name">Administrator</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
