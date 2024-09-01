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
                    <div class="crs_grid">
                        <div class="crs_grid_thumb">
                            <a href="{{ url('news/' . $item->slug) }}" target="_blank" class="crs_detail_link">
                                <img src="{{ asset('storage/assets/attach/' . $item->image) }}"
                                    class="img-fluid rounded image-full" />
                            </a>
                        </div>
                        <div class="crs_grid_caption">
                            <div class="crs_flex">
                                <div class="crs_fl_first">
                                    <div class="crs_cates cl_8"><span>Berita</span></div>
                                </div>
                                <div class="crs_fl_last">
                                    <div class="crs_inrolled"><strong>{{ $item->comments->count() }}</strong>Komentar</div>
                                </div>
                            </div>
                            <div class="crs_title">
                                <h4><a href="{{ url('news/' . $item->slug) }}" target="_blank"
                                        class="crs_title_link overflow">{{ $item->name }}</a></h4>
                            </div>
                            <div class="crs_info_detail">
                                <ul>
                                    <li><i
                                            class="fa fa-clock text-danger"></i><span>{{ timesInd($item->created_at) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="crs_grid_foot">
                            <div class="crs_flex">
                                <div class="crs_fl_first">
                                    <div class="crs_tutor">
                                        <div class="crs_tutor_name">{{ $item->user->name }}</div>
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
