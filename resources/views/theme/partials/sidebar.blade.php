<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('subscribe.store')}}" method="post">
                @csrf
                <div class="form-group mt-30">
                    <div class="col-autos">
                        <input name="email" type="text" class="form-control" id="inlineFormInputGroup"
                               placeholder="Enter email"
                               value="{{old('email')}}"
                               onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Enter email'">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
            </form>
        </div>
        @if($categoriesCount>0)
            <div class="single-sidebar-widget post-category-widget">
                <h4 class="single-sidebar-widget__title">Catgory</h4>
                <ul class="cat-list mt-20">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('categories.show', $category->name) }}"
                               class="d-flex justify-content-between">
                                <p>{{$category->name}}</p>
                                <p>({{$category->blogs()->count()}})</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                @forelse($recentBlogs as $blog)
                    <div class="single-post-list">
                        <div class="thumb">
                            <img class="card-img rounded-0" src="{{asset("storage/blogs/".$blog->image)}}" alt="">
                            <ul class="thumb-info">
                                <li><a href="{{route('blogs.show',$blog->id)}}">{{$blog->user->name}}</a></li>
                                <li>
                                    <a href="{{route('blogs.show',$blog->id)}}">{{ $blog->created_at->format('M d') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="{{route('blogs.show',$blog->id)}}">
                                <h6>{{$blog->name}}</h6>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        No Comments found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
