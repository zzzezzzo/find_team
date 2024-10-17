@extends('layout.user_master')
@section('title-page', 'show_me')

@section('content-page')
    {{-- this is the show the team  --}}
    <div style="display:flex; justify-content:space-around; flex-wrap: wrap; margin-top:50px">
        @foreach ($members as $member)
            <div class="card" style="display: flex;">
                <div class="card-header">
                    {{ $member->name }}
                </div>
                <div class="card-body">
                    <img src="{{ asset('public/images/' . $member->image) }}" alt="User Image"
                        style="width: 150px; height: 150px; border-radius: 50%; margin-left:auto;">
                    <h5 class="card-title">{{ $member->skills }}</h5>
                    <p class="card-text">{{ $member->phone }}</p>
                    @if (Auth::check() && Auth::user()->id === $member->user_id)
                        <a href="#"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">update</button></a>
                        <form style="display: inline-block" action="{{ route('user.destroy', $member->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    {{-- this is the start to update form --}}
    <form action="{{ route('user.update', $mes->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">update data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">name</label>
                            <input type="text" value="{{ $mes->name }}" required class="form-control" id="name"
                                name="name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">image</label>
                            <input type="file" value="{{ $mes->image }}" required class="form-control" id="image"
                                name="image">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">phone</label>
                            <input type="text" value="{{ $mes->phone }}" required class="form-control" id="phone"
                                name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">skills</label>
                            <textarea class="form-control" required id="skills" name="skills">{{ $mes->skills }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
