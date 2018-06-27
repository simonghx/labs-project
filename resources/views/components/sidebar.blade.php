<!-- Sidebar area -->
  
    <!-- Single widget -->
  <div class="col-md-4 col-sm-5 sidebar">
    <div class="widget-item">
      <form action="#" class="search-form">
        <input type="text" placeholder="Search">
        <button class="search-btn"><i class="flaticon-026-search"></i></button>
      </form>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
      <h2 class="widget-title">Categories</h2>
      <ul>
        @foreach($categories as $categorie)
        <li><a href="#">{{$categorie->name}}</a></li>
        @endforeach
        
      </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
      <h2 class="widget-title">Instagram</h2>
      <ul class="instagram">
        <li><img src="{{asset('theme/img/instagram/1.jpg')}}" alt=""></li>
        <li><img src="{{asset('theme/img/instagram/2.jpg')}}" alt=""></li>
        <li><img src="{{asset('theme/img/instagram/3.jpg')}}" alt=""></li>
        <li><img src="{{asset('theme/img/instagram/4.jpg')}}" alt=""></li>
        <li><img src="{{asset('theme/img/instagram/5.jpg')}}" alt=""></li>
        <li><img src="{{asset('theme/img/instagram/6.jpg')}}" alt=""></li>
      </ul>
    </div>
    <!-- Single widget -->
    <div class="widget-item">
      <h2 class="widget-title">Tags</h2>
      <ul class="tag">
        @foreach($tags as $tag)
        <li><a href="">{{$tag->name}}</a></li>
        @endforeach
      </ul>
    </div>

    <div class="widget-item">
      <h2 class="widget-title">Quote</h2>
      <div class="quote">
        <span class="quotation">‘​‌‘​‌</span>
        <p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. Sed lacinia turpis at ultricies vestibulum.</p>
      </div>
      {{-- <!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Add</h2>
						<div class="add">
							<a href=""><img src="img/add.jpg" alt=""></a>
						</div>
					</div> --}}
    </div>
  </div>   
					
				