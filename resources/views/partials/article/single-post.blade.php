<div class="post-thumbnail">
    <img src="{{Storage::disk('articlesThumbs')->url($article->image)}}" alt="">
    <div class="post-date">
        <h2>{{$article->created_at->format('d')}}</h2>
        <h3>{{$article->created_at->format('M Y')}}</h3>
    </div>
</div>
<div class="post-content">
    <h2 class="post-title">{{$article->titre}}</h2>
    <div class="post-meta">
        <a href="">{{$article->user->name}}</a>
        <a href="">
            @foreach($article->tags as $tag)
                <span>{{$tag->name}}</span>
            @endforeach
        </a>
        <a href="">2 Comments</a>
    </div>
    <p>{{$article->content}}</p>
</div>
<!-- Post Author -->
<div class="author">
    <div class="avatar">
        <img src="{{Storage::disk('editeursMini')->url($article->user->image)}}" alt="">
    </div>
    <div class="author-info">
        <h2>{{$article->user->name}}, <span>Author</span></h2>
        <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
    </div>
</div>