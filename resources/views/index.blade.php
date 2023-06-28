@extends('components.html')
@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <h1 style="padding-top: 5vh">toDo</h1>
                <form method="POST" action="{{ route('listings.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-9">
                            <input type="text" class="form-control" name="task" placeholder="New task?"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
                    </div>
                </form>

                <div class="accordion accordion-flush" id="accordionFlush" style="padding-top: 2vh">
                    @foreach ($listings as $listing)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading{{ $listing->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $listing->id }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $listing->id }}">
                                    {{ $listing->task }}
                            </h2>
                            <div id="flush-collapse{{ $listing->id }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading{{ $listing->id }}" data-bs-parent="#accordionFlush">
                                <div class="accordion-body">
                                    <form method="POST" action="{{ route('listings.update', $listing) }}">
                                        @csrf
                                        @method('put')
                                        <input type="text" class="form-control" placeholder="New name"
                                            name="task" style="margin-bottom:2vh"
                                            aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" value="{{ $listing->task }}">
                                        <button type="submit" class="btn btn-outline-success"
                                            style="float: left">Edit</button>
                                    </form>
                                    <form method="POST" action="{{ route('listings.destroy', $listing) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger"
                                            style="float: right">Delete</button>
                                    </form>
                                    <br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
@endsection
