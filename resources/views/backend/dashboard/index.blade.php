@extends('backend.main.index')
@push('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row align-items-end">
                    <div class="col-12">
                        <div class="box bg-primary-light overflow-hidden pull-up">
                            <div class="box-body pe-0 ps-lg-50 ps-15 py-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-8">
                                        <h1 class="fs-40 text-dark">Hi {{ $user->name }}!</h1>
                                        <p class="text-dark mb-0 fs-20">
                                            Welcome to {!! config('master.app.profile.name') !!}, CRUD Generator
                                            laravel {!! config('master.app.profile.laravel') !!} easily and quickly.
                                        </p>
                                        <p class="text-dark mb-0 fs-20">
                                            If you find any bugs or errors, please report them to us on 
                                            <a target="_blank" href="https://github.com/arwahyu01/main-master/issues"
                                               class="text-blue">Github</a>.
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <img src="{{ url($template."/images/svg-icon/color-svg/custom-15.svg") }}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('backend.main.menu.announcement')
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')

@endpush
