@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Questions
                    </div>

                    <div class="card-body">
                        @forelse($questions as $question)
                            <div class="media">
                                <div class="d-flex flex-column counters">
                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong> {{\Illuminate\Support\Str::plural('vote',$question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{$question->answers}}</strong> {{\Illuminate\Support\Str::plural('answer',$question->answers)}}
                                    </div>
                                    <div class="view">
                                        {{$question->views.' '.\Illuminate\Support\Str::plural('view',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h3 class="mt-0">
                                        <a href="{{$question->url}}">{{$question->title}}</a>
                                    </h3>
                                    <p class="lead">
                                        Asked By
                                        <a href="{{$question->creator->url}}">{{$question->creator->name}}</a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                    </p>
                                    {{\Illuminate\Support\Str::limit($question->body,250)}}

                                </div>
                            </div>
                            <hr>
                        @empty
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-center text-danger">No Questions Result!</p>
                                </div>
                            </div>
                        @endforelse
                        <div class="justify-content-center">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
