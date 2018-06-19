@extends('layouts.front')

@section('content')
<!-- page section -->
    <div class="page-section spad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 blog-posts">
                    <!-- Single Post -->
                    <div class="single-post">
                        @include('partials.article.single-post')
                        <!-- Post Comments -->
                        @include('partials.article.comments')
                        <!-- Commert Form -->
                        @include('partials.article.comment-form')
                    </div>
                </div>

                @include('components.sidebar')

            </div>
        </div>
    </div>
    <!-- page section end-->

    @include('components.newsletter')
@endsection