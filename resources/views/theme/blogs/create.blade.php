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
                    <h2 class="mb-4">Add New Blog</h2>

                    <form method="POST"
                          action="{{ route('blogs.store') }}"
                          class="form-contact contact_form"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row">

                            {{-- Blog Name --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <input
                                        class="form-control border"
                                        name="name"
                                        id="name"
                                        type="text"
                                        value="{{ old('name') }}"
                                        placeholder="Enter blog name"
                                       >

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
                                        id="category_id"
                                       >

                                        <option value="">Select Category</option>

                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                    placeholder="Enter blog description"
                                   >{{ old('description') }}</textarea>

                                    <x-input-error
                                        :messages="$errors->get('description')"
                                        class="mt-2"/>
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image">Blog Image</label>

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
                                Add Blog
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- ================ contact section end ================= -->

@endsection
