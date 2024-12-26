@extends('layout.user_master')
@section('title-page', 'home')

@section('content-page')
    <h1 class="text-center my-5 display-1 text-primary">Find My Team</h1>
    {{-- the view about of team  --}}
    {{--  this is the response to show the form to add your data --}}
    <div style="display:flex; justify-content:space-around; flex-wrap: wrap; margin-top:50px">

        @foreach ($teams as $team)
            <div class="card my-3" style="width: 18rem;">
                <img src="{{ asset('team.webp') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $team->name }}</h5>
                    @foreach ($members as $member)
                        @if ($member->user_id === $team->user_id)
                            <p class="card-text"><span class="text-primary">Created By</span>
                                {{ $member->name }}
                            </p>
                        @endif
                    @endforeach
                    <a href="{{ route('user.show', $team->id) }}" class="btn btn-primary">show you</a>
                </div>
            </div>
        @endforeach
    </div>
    {{-- end teh view team --}}
    {{-- this is the response to show the form to add your data --}}
    <i class="fa-solid fa-user-plus" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
        id="add_icon"></i>
    <!-- Button trigger modal -->
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add to me</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">name</label>
                            <input type="text" required class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">image</label>
                            <input type="file" required class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">phone</label>
                            <input type="text" required class="form-control" id="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">skills</label>
                            <textarea class="form-control" required id="skills" name="skills"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
