@extends('admin.layouts.master')
@section('title','Show users')

@section('content')
    {{-- Role Filter --}}
    <div class="col-md-4">
        <form action="{{ route('users') }}" method="GET" class="mb-sm-4">
        <label for="role">Filter by Role:</label>
        <select name="role" id="role" class="form-control">
            <option value="">All Roles</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>user</option>
        </select>
        {{-- Filter Button --}}
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary ms-auto w-75">Apply Filter</button>
        </div>
        </form>
        <h1>All Users</h1>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Control</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($usersByRole as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <a href="/delete-item?model_name=User&id={{$user->id }}" class="btn btn-sm btn-danger rounded-circle m-1"> <i class="bi bi-trash3-fill text-white"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.users.export-pdf') }}" class="btn btn-secondary">Export Users as PDF</a>
    </div>
@endsection
