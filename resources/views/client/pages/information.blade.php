@extends('client.layout.main')

@section('content-client')
    @extends('client.layout.main')

@section('content-client')
    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="ed_detail_wrap">
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $data->name }}</h2>
                            <ul>
                                <li><i class="ti-calendar"></i>{{ timesInd($data->created_at) }}</li>
                                <li><i class="ti-user"></i>{{ $data->user->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="gray">
        <div class="container">
            <div class="article_detail_wrapss single_article_wrap format-standard">
                <div class="article_body_wrap">
                    <div class="article_featured_image">
                        <img class="img-fluid" src="{{ asset('storage/assets/attach/' . $data->image) }}"
                            alt="Perkuat Iklim Usaha Dan Perlindungan Konsumen, Purwakarta Uji Tera Ribuan Alat Ukur Perdagangan">
                    </div>
                    {!! $data->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@endsection
