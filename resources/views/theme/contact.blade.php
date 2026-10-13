@extends('theme.master')
@section('title','Contact')
@section('contact-active','active')

@section('content')

    <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'Contact'])
    <!--================ Hero sm banner end =================-->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>California United States</h3>
                            <p>Santa monica bullevard</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <form action="{{ route('contact.store') }}" class="form-contact contact_form" method="post"
                          id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        type="text"
                                        value="{{ old('name') }}"
                                        placeholder="Enter your name"
                                        required>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                                <div class="form-group">
                                    <input
                                        class="form-control"
                                        name="address"
                                        id="address"
                                        type="text"
                                        value="{{ old('address') }}"
                                        placeholder="Enter your address"
                                        required>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <input
                                        class="form-control"
                                        name="subject"
                                        id="subject"
                                        type="text"
                                        value="{{ old('subject') }}"
                                        placeholder="Enter Subject"
                                        required>
                                    <x-input-error :messages="$errors->get('subject')" class="mt-2"/>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                <textarea
                                    class="form-control different-control w-100"
                                    name="message"
                                    id="message"
                                    cols="30"
                                    rows="5"
                                    placeholder="Enter Message"
                                    required>{{ old('message') }}</textarea>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit"
                                    class="button button--active button-contactForm">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
