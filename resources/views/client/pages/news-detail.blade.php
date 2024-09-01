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
                            alt="{{ $data->name }}">
                    </div>
                    {!! $data->description !!}
                </div>
            </div>

            <!-- Comment Section -->
            <div class="comment-section">
                <h4>Comments</h4>

                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-">
                        <label>Nama</label>
                        <input type="text" name="user" placeholder="Nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="comment" class="form-control" rows="4" placeholder="Add a comment"></textarea>
                        <input type="hidden" name="news_id" value="{{ $data->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                @foreach ($data->comments->where('parent_id', null) as $comment)
                    <div class="comment">
                        <p><strong>{{ $comment->user }}</strong> :</p>
                        <p>{{ $comment->comment }}</p>

                        <!-- Button to toggle reply form -->
                        <a class="text-success mb-1 btn-sm reply-button" style="cursor: pointer"
                            data-toggle="reply-form-{{ $comment->id }}">
                            Balas
                        </a>

                        <!-- Form for replying to a comment -->
                        <form action="{{ route('comments.reply', $comment->id) }}" method="POST" class="reply-form"
                            id="reply-form-{{ $comment->id }}" style="display: none; margin-left: 20px;">
                            @csrf
                            <div class="form-group mb-">
                                <label>Nama</label>
                                <input type="text" name="user" placeholder="Nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="comment" class="form-control" rows="2" placeholder="Reply to this comment"></textarea>
                                <input type="hidden" name="news_id" value="{{ $data->id }}">
                            </div>
                            <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                        </form>

                        <!-- Display replies -->
                        @foreach ($comment->replies as $reply)
                            <div class="reply" style="margin-left: 20px; padding-left: 10px; border-left: 2px solid #ddd;">
                                <p><strong>{{ $reply->user }}</strong> Membalas:</p>
                                <p>{{ $reply->comment }}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.reply-button').forEach(button => {
            button.addEventListener('click', function() {
                const replyForm = document.getElementById(this.dataset.toggle);
                if (replyForm.style.display === "none") {
                    replyForm.style.display = "block";
                } else {
                    replyForm.style.display = "none";
                }
            });
        });
    </script>
@endsection
