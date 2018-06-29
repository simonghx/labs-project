<div class="comments">
  <h2>Comment{{count($article->comments) === 1 ? '':'s'}} ({{count($article->comments)}})</h2>
  <ul class="comment-list">
      @foreach($comments as $comment)
      
      <li>
          <div class="avatar">
              <img src="{{Storage::disk('avatars')->url($comment->image)}}" alt="">
          </div>
          <div class="commetn-text">
              <h3>{{$comment->name}} | {{$comment->email}} | {{$article->created_at->format('d M Y')}}</h3>
              <p>{{$comment->content}}</p>
          </div>
      </li>
      @endforeach
      {{-- <li>
          <div class="avatar">
              <img src="{{asset('theme/img/avatar/02.jpg')}}" alt="">
          </div>
          <div class="commetn-text">
              <h3>Michael Smith | 03 nov, 2017 | Reply</h3>
              <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
          </div>
      </li> --}}
  </ul>
</div>