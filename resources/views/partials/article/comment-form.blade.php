<div class="row">
  <div class="col-md-9 comment-from">
      <h2>Leave a comment</h2>
      <form class="form-class" action="{{route('comments.store')}}" method="POST">
        @csrf
          <div class="row">
              <div class="col-sm-6">
                  <input type="text" name="name" placeholder="Your name" value="{{old('name')}}">
              </div>
              <div class="col-sm-6">
                  <input type="text" name="email" placeholder="Your email" value="{{old('email')}}">
              </div>
              <div class="col-sm-12">
                  {{-- <input type="text" name="subject" placeholder="Subject"> --}}
                  <textarea name="content" placeholder="Message">{{old('content')}}</textarea>
                  <button type="submit" class="site-btn">send</button>
              </div>
          </div>
      </form>
  </div>
</div>