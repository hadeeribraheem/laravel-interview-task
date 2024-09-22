@extends('layout.master')

@section('title', 'Notifications')

@section('content')
    <div class="container">
        <h2>User Notifications</h2>

        @if ($notifications->isEmpty())
            <p>No notifications at this moment.</p>
        @else
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        {{ $notification->data['comment_content'] }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
