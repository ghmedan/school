@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة النتائج
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    قائمة النتائج
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<div class="container">
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <h1>نتيجة الامتحان</h1>
                                <p>الدرجة الكلية: {{ $totalScore }}</p>
                                <a href="{{ route('exams') }}" class="btn btn-primary">العودة إلى الامتحانات</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
