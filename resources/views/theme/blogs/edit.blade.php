@extends('theme.master')
@section('title','add New Blog')


@section('content')

    <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'add New Blog'])
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

                    <h2 class="mb-4">Edit Blog</h2>

                    <form method="POST"
                          action="{{ route('blogs.update', $blog->id) }}"
                          class="form-contact contact_form"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            {{-- Blog Name --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input
                                        class="form-control border"
                                        name="name"
                                        id="name"
                                        type="text"
                                        value="{{ old('name', $blog->name) }}"
                                        placeholder="Enter blog name">

                                    <x-input-error
                                        :messages="$errors->get('name')"
                                        class="mt-2"/>
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <select
                                        class="form-control border"
                                        name="category_id"
                                        id="category_id">

                                        <option value="">Select Category</option>

                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                    <x-input-error
                                        :messages="$errors->get('category_id')"
                                        class="mt-2"/>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-12">
                                <div class="form-group">
                                <textarea
                                    class="w-100 border"
                                    name="description"
                                    id="description"
                                    rows="10"
                                    placeholder="Enter blog description">{{ old('description', $blog->description) }}</textarea>

                                    <x-input-error
                                        :messages="$errors->get('description')"
                                        class="mt-2"/>
                                </div>
                            </div>

                            {{-- Current Image --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Current Blog Image</label>
                                    <br>

                                    @if ($blog->image)
                                        <img
                                            src="{{ asset('storage/blogs/' . $blog->image) }}"
                                            alt="{{ $blog->name }}"
                                            width="150"
                                            class="mb-3">
                                    @else
                                        <p>No image uploaded.</p>
                                    @endif
                                </div>
                            </div>

                            {{-- New Image --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">
                                        Choose New Image (Optional)
                                    </label>

                                    <input
                                        class="form-control border"
                                        name="image"
                                        id="image"
                                        type="file"
                                        accept="image/*">

                                    <x-input-error
                                        :messages="$errors->get('image')"
                                        class="mt-2"/>
                                </div>
                            </div>

                        </div>

                        <div class="form-group text-center text-md-right mt-3">
                            <button
                                type="submit"
                                class="button button--active button-contactForm">
                                Update Blog
                            </button>

                            <a href="{{ route('blogs.my-blogs') }}"
                               class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    <!-- ================ contact section end ================= -->

@endsection
