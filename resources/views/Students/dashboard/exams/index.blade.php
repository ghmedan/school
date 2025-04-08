
@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        قائمة الاختبارات
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        قائمة الاختبارات
    @stop
    <!-- breadcrumb -->
@endsection



@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المادة الدراسية</th>
                                        <th>اسم الاختبار</th>
                                        <th>دخول / درجة الاختبار</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quizzes as $quiz)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$quiz->subject->name}}</td>
                                            <td>{{$quiz->name}}</td>
                                            <td>
                                                {{-- @if($quiz->degree->count() > 0 && $quiz->id == $quiz->degree[0]->quizze_id)
                                                    {{$quiz->degree[0]->score}}
                                                @else --}}
                                                    <a href="{{route('exam.start', $quiz->id)}}">
                                                        <i class="fas fa-person-booth"></i></a>
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection 
@section('js')
    @toastr_js
    @toastr_render

        <script>
            function alertAbuse() {
                alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
            }
        </script>

@endsection
