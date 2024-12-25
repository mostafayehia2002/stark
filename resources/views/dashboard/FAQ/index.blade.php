@extends('dashboard.layouts.master', ['title' =>trans('dashboard.FAQ')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>{{trans('dashboard.see_all_FAQ')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.FAQ-list')}}">{{trans('dashboard.FAQ')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.support')}}</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    @can('FAQ-create')
                        <a href="{{route('admin.FAQ-create')}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            {{trans('dashboard.add_FAQ')}}
                        </a>
                    @endcan
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($faqs as $faq)
                                    <div class="col-md-6">
                                        <div class="card border-light mb-4 shadow-sm">
                                            <div class="card-header bg-light d-flex align-items-center">
                                                <h5 class="card-title mb-0 text-primary">
                                                    <i class="fas fa-question-circle me-2"></i> {{ $faq->question }}
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text text-muted">
                                                    {{ $faq->answer }}
                                                </p>
                                                <div class="d-flex justify-content-between mt-3">
                                                    @can('FAQ-edit')
                                                        <a href="{{route('admin.FAQ-edit',$faq->id)}}"
                                                           class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-edit"></i> {{ trans('label.update') }}
                                                        </a>
                                                    @endcan
                                                    @can('FAQ-delete')
                                                        <a href="{{route('admin.FAQ-delete',$faq->id)}}"
                                                           class="btn btn-sm btn-outline-danger"
                                                           onclick="return confirm('{{translate_message('are_you_sure_delete')}}');">
                                                            <i class="fa-solid fa-trash"></i>{{ trans('label.delete') }}
                                                        </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
