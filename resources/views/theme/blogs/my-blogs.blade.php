@extends('theme.master')
@section('title','My Blogs')


@section('content')

    <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'My Blogs'])
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->

    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h2 class="mb-4">All Blogs</h2>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Actions</th>

                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->name }}</td>

                                    <td>
                                        {{ Str::limit($blog->description, 255) }}
                                    </td>

                                    <td>
                                        @if ($blog->image)
                                            <img
                                                src="{{ asset('storage/blogs/' . $blog->image) }}"
                                                alt="{{ $blog->name }}"
                                                width="100"
                                                height="70"
                                                style="object-fit: cover;"
                                            >
                                        @else
                                            No image
                                        @endif
                                    </td>

                                    <td>
                                        {{ $blog->category?->name ?? 'No category' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('blogs.show', $blog->id) }}"
                                           class="btn btn-success btn-sm">
                                            Show
                                        </a>
                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                           class="btn btn-primary btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('blogs.destroy', $blog->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class=" mr-4 btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>


                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No blogs found.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{ $blogs->links() }}

                </div>
            </div>
        </div>
    </section>

    <!-- ================ contact section end ================= -->

@endsection

