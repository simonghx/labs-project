
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Post item -->
					@foreach($articles as $article)
					<div class="post-item">
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
							<p>{{$article->entete}}</p>
							<a href="blog-post.html" class="read-more">Read More</a>
						</div>
					</div>
					@endforeach
					{{$articles->links('components.pagination')}}
					
				</div>