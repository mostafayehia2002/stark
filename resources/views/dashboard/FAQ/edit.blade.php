@extends('dashboard.layouts.master', ['title' => trans('dashboard.edit_FAQ')])
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>{{ trans('dashboard.edit_FAQ') }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">{{trans('dashboard.edit_FAQ')}}</li>
                            <li class="breadcrumb-item"><a
                                        href="{{route('admin.FAQ-list')}}">{{trans('dashboard.FAQ')}}</a></li>
                            <li class="breadcrumb-item active">{{trans('dashboard.support')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Form to Create FAQ -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.FAQ-update',$faq->id)}}" method="POST">
                            @csrf

                            <!-- Question English -->
                            <div class="form-group">
                                <label for="question_en">{{ trans('label.question_en') }}</label>
                                <input type="text" name="question_en" id="question_en" class="form-control @error('question_en') is-invalid @enderror" value="{{ old('question_en',$faq->getTranslation('question','en')) }}">
                                @error('question_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Question Arabic -->
                            <div class="form-group">
                                <label for="question_ar">{{ trans('label.question_ar') }}</label>
                                <input type="text" name="question_ar" id="question_ar" class="form-control @error('question_ar') is-invalid @enderror" value="{{ old('question_ar',$faq->getTranslation('question','ar')) }}">
                                @error('question_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Answer English -->
                            <div class="form-group">
                                <label for="answer_en">{{ trans('label.answer_en') }}</label>
                                <textarea name="answer_en" id="answer_en" class="form-control @error('answer_en') is-invalid @enderror">{{ old('answer_en',$faq->getTranslation('answer','en')) }}</textarea>
                                @error('answer_en')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Answer Arabic -->
                            <div class="form-group">
                                <label for="answer_ar">{{ trans('label.answer_ar') }}</label>
                                <textarea name="answer_ar" id="answer_ar" class="form-control @error('answer_ar') is-invalid @enderror">{{ old('answer_ar',$faq->getTranslation('answer','ar')) }}</textarea>
                                @error('answer_ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('label.update') }}</button>
                            <button type="reset" class="btn btn-danger">{{ trans('label.reset') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
