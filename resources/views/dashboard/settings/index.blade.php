@extends('dashboard.layouts.master', ['title' => trans('dashboard.show_setting')])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>{{trans('dashboard.show_setting')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">{{trans('dashboard.show_setting')}}</li>
                            <li class="breadcrumb-item active">{{trans('dashboard.setting')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <!-- Tabs for Settings -->
                        <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" role="tab" aria-controls="general" aria-selected="true">{{trans('dashboard.general_settings')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="social-media-tab" data-bs-toggle="tab" data-bs-target="#social-media" role="tab" aria-controls="social-media" aria-selected="false">{{trans('dashboard.social_media')}}</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-6" id="settingsTabsContent">
                            <!-- General Settings Tab -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                <form action="{{route('admin.update-setting')}}" method="POST" enctype="multipart/form-data" id="myForm">
                                    @csrf
                                    <div class="row">
                                        @foreach ($settings['general'] ?? [] as $setting)
                                            <div class="col-md-6 mb-3">
                                                <label for="{{ $setting->key }}" class="form-label">{{trans('label.'.$setting->key ) }}</label>
                                                <input
                                                    type="{{ $setting->input_type }}"
                                                    class="form-control"
                                                    id="{{ $setting->key }}"
                                                    name="{{ $setting->key }}"
                                                    value="{{ $setting->input_type !== 'file' ? $setting->value : '' }}"
                                                    {{ $setting->input_type !== 'file' ? 'required' : '' }}
                                                >
                                                @if ($setting->input_type === 'file' && $setting->value)
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/uploads/settings/' . $setting->value) }}" alt="{{ $setting->key }}" style="max-height: 50px;">
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                    @can('update-setting')
                                    <button type="submit" class="btn btn-primary" id="submitBtn">{{trans('label.save')}}</button>
                                    @endcan
                                </form>
                            </div>

                            <!-- Social Media Settings Tab -->
                            <div class="tab-pane fade" id="social-media" role="tabpanel" aria-labelledby="social-media-tab">
                                <form action="{{route('admin.update-setting')}}" method="POST" id="myForm">
                                    @csrf
                                    <div class="row">
                                        @foreach ($settings['social_media'] ?? [] as $setting)
                                            <div class="col-md-6 mb-3">
                                                <label for="{{ $setting->key }}" class="form-label">{{ trans('label.'.$setting->key) }}</label>
                                                <input
                                                    type="{{ $setting->input_type }}"
                                                    class="form-control"
                                                    id="{{ $setting->key }}"
                                                    name="{{ $setting->key }}"
                                                    value="{{ $setting->value }}"
                                                >
                                            </div>
                                        @endforeach
                                    </div>
                                    @can('update-setting')
                                    <button type="submit" class="btn btn-primary" id="submitBtn">{{trans('label.save')}}</button>
                                    @endcan
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('dashboard.layouts.spanner')
        </section>
    </div>
@endsection
