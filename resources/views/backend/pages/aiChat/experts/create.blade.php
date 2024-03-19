@extends('backend.layouts.master')


@section('title')
    {{ localize('Add New Expert') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection


@section('contents')
    <section class="tt-section pt-4">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <div class="tt-page-header">
                        <div class="d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title mb-3 mb-lg-0">
                                <h1 class="h4 mb-lg-1">{{ localize('Add New Expert') }}</h1>
                                <ol class="breadcrumb breadcrumb-angle text-muted">
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('writebot.dashboard') }}">{{ localize('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('chat.experts') }}">{{ localize('Experts') }}</a>
                                    </li>
                                    <li class="breadcrumb-item">{{ localize('Add Expert') }}</li>
                                </ol>
                            </div>
                            <div class="tt-action">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-4 g-4">

                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="{{ route('chat.storeExpert') }}" method="POST" class="pb-650">
                        @csrf
                        <!--basic information start-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Basic Information') }}</h5>

                                <div class="mb-4">
                                    <label for="name" class="form-label">{{ localize('Expert Name') }} <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" id="name"
                                        placeholder="{{ localize('Type expert name') }}" class="form-control" required>
                                </div>
 
                                <div class="mb-4">
                                    <label for="short_name" class="form-label">{{ localize('Short Name') }} <span class="text-danger">*</span> </label>
                                    <input type="text" name="short_name" id="short_name"
                                        placeholder="{{ localize('Type short name') }}" class="form-control" required>
                                </div>
 
                                <div class="mb-4">
                                    <label class="form-label">{{ localize('Short Description') }}</label>
                                    <textarea class="form-control" name="description" id="description" rows="4"
                                        placeholder="{{ localize('Type short description') }}"></textarea>
                                </div>

                                
                                <div class="mb-4">
                                    <label for="role" class="form-label">{{ localize('Role') }} <span class="text-danger">*</span> </label>
                                    <input type="text" name="role" id="role"
                                        placeholder="{{ localize('Type role') }}" class="form-control" required>
                                </div>

                                
                                <div class="mb-4">
                                    <label class="form-label">{{ localize('Expertise') }} <span class="text-danger">*</span> </label>
                                    <textarea class="form-control" name="assists_with" id="assists_with" rows="4"
                                        placeholder="{{ localize('I will assist you to generate better content') }}" required></textarea>
                                </div>

 
                                 
                            </div>
                        </div>
                        <!--basic information end-->

                        <!-- image and gallery start-->
                        <div class="card mb-4" id="section-2">
                            <div class="card-body">
                                <h5 class="mb-4">{{ localize('Images') }}</h5>
                                <div class="mb-4">
                                    <label class="form-label">{{ localize('Avatar Image') }} </label>
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold">{{ localize('Choose Avatar') }}</span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="image">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- image and gallery end--> 

                        <!-- submit button -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <button class="btn btn-primary" type="submit">
                                        <i data-feather="save" class="me-1"></i> {{ localize('Save Expert') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- submit button end -->

                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar d-none d-xl-block">
                        <div class="card-body">
                            <h5 class="mb-4">{{ localize('Blog Information') }}</h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active">{{ localize('Basic Information') }}</a>
                                    </li>
                                    <li>
                                        <a href="#section-2">{{ localize('Avatar') }}</a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
