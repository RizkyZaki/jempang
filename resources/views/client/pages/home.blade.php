@extends('client.layout.main')

@section('content-client')
    <div class="hero_banner image-cover image_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="simple-search-wrap text-left">
                        <div class="hero_search-2">
                            <h1 class="banner_title mb-4">Info Jempang</h1>
                            <p class="font-lg mb-4">Informasi Jempang</p>
                            <form action="{{ url('search') }}" method="post">
                                <input type="hidden" name="_token" value="64wmOTRUqAKCSyZsEWa2YbxHhtQPUDKl5GW85G4n"
                                    autocomplete="off">
                                <div class="input-group simple_search">
                                    <i class="fa fa-search ico"></i>
                                    <input type="text" class="form-control" placeholder="Cari Informasi" name="search"
                                        autocomplete="off">
                                    <div class="input-group-append">
                                        <button class="btn theme-bg">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="side_block">
                        <img src="{{ asset('client/headin.png') }}" class="img-fluid" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="min gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Berita <span class="theme-cl">Terbaru</span></h2>
                        <p>Info Jempang</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($news as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="crs_grid">
                            <div class="crs_grid_thumb">
                                <a href="{{ url('news/' . $item->slug) }}" class="crs_detail_link">
                                    <img src="{{ asset('storage/assets/attach/' . $item->image) }}"
                                        class="img-cover rounded" />
                                </a>
                            </div>
                            <div class="crs_grid_caption">
                                <div class="crs_flex">
                                    <div class="crs_fl_first">
                                        <div class="crs_cates cl_8"><span>Berita</span></div>
                                    </div>
                                    <div class="crs_fl_last">
                                        <div class="crs_inrolled"><strong>{{ $item->comments->count() }}</strong>Komentar
                                        </div>
                                    </div>
                                </div>
                                <div class="crs_title">
                                    <h4><a href="{{ url('news/' . $item->slug) }}"
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
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <a href="{{ url('news') }}" class="btn text-success theme-bg-light">Lihat Lebih
                    Banyak</a>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection
