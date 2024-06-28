@extends('layouts.header',['title' => 'Question', 'pageCss' => 'assets/css/que.css'])

@section('content')
    <div class="post">
        <div class="bg-light pt-4">
            <div class="container mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="bg-white border-gray p-4">
                            <div class="post-container">
                                <h2>Ask a Question</h2>
                                <form id="postForm" action="{{ route('que.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <textarea id="postText" name="content" rows="6" class="form-control" placeholder="Type your Question..." required></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="file" id="postImage" name="post_image" class="form-control">
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary w-100">Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center py-3 mt-5">
        <h6>හො.ම.ත.ග.යු - සියලු හිමිකම් ඇවිරිණි. -2024</h6>
    </footer>
@endsection
