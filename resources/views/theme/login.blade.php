@extends('theme.master')
@section('title','Login')


@section('content')

    <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'Login'])
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form method="POST" action="{{ route('login') }}" class="form-contact contact_form"  novalidate="novalidate">
                        @csrf
                        <div class="form-group">
                            <input class="form-control border" type="email" name="email" value="{{old('email')}}"   placeholder="Enter email address">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="password" type="password" placeholder="Enter your password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <a href="{{route('register')}}" class="mr-3">Sing UP instead?</a>
                            <button type="submit" class="button button--active button-contactForm">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->


@endsection
