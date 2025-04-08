@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    إجراء اختبار
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    إجراء اختبار
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<div class="container">
    @if (!empty($question))

        <!-- row -->
        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h1>السؤال {{ $question->id }}</h1>

                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <form action="{{ route('exam.submit') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                                        <p style="font-weight: bold">{{ $question->title }}</p>
                                        @foreach (explode('-', $question->answers) as $index => $answer)
                                            <div>
                                                <input type="radio" name="selected_answer" value="{{ $answer }}"
                                                    id="answer{{ $index }}">
                                                <label for="answer{{ $index }}">{{ $answer }}</label>
                                            </div>
                                        @endforeach
                                        <button type="submit" class="btn btn-primary">التالي</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row closed -->
</div>
@else
<p>لا توجد أسئلة متاحة حاليًا.</p>
@endif
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
