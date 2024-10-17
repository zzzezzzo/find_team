@extends('layout.master')
@section('title-page', 'show')

@section('content-page')
    <h1 class="display-1 text-primary text-center mb-3">show single course</h1>
    <div class=" border border-3 rounded-2 p-4 "
        style="display: flex; justify-content:end; background-color:rgb(219, 220, 221);">
        <div class="image" style="width: 650px">
            <img style="width: 50%" src="{{ asset('public/courses/' . $course->image) }}">
        </div>
        <div class="description">
            <p class="fs-5"><span class="text-danger">course name:</span> {{ $course->name }}</p>
            <p class="fs-5"><span class="text-danger">course description:</span> {{ $course->description }}</p>
            <p class="fs-5"><span class="text-danger">course price:</span> {{ $course->price }}</p>
            {{-- <p>This is the category: {{ $course->category->name }}</p> --}}
            <a class="btn btn-outline-info" href="#">Edit</a>
            <form action="{{ route('courses.destroy',$course->id) }}" style="display: inline-block" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
    <div class="model text-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary mt-5 text-center"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Add lesson
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add lesson</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
