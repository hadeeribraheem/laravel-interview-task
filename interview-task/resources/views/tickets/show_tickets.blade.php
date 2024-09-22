@extends('layout.master')

@section('title', 'Ticket Details')

@section('content')
    <div class="section-body">
        <div class="row mt-5">
            <div class="col-12 col-md-12 col-lg-10">

                <div class="card">
                    <div class="card-header">
                        @if ($tickets->isEmpty())
                            <p>No tickets yet.</p>
                        @else
                            @foreach($tickets as $ticket)
                        <h4>Ticket: {{ $ticket->title }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Type:</strong> {{ $ticket->type }}</p>
                        <p><strong>Info:</strong> {{ $ticket->info }}</p>

                        <hr>

                        <h5>Comments:</h5>

                        @if($ticket->comments->isEmpty())
                            <p>No comments yet.</p>
                        @else
                            <ul class="list-group">
                                @foreach($ticket->comments as $comment)
                                    <li class="list-group-item">
                                        <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <hr>

                        <h5>Add a Comment:</h5>
                        <form method="POST" action="{{ route('comments.store', $ticket->id) }}">
                            @csrf
                            <div class="form-group">
                                <textarea name="comment" class="form-control" rows="4" placeholder="Enter your comment" required>{{ old('comment') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
