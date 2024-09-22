@extends('layout.master')
@section('title','add ticket')

@section('content')
    <div class="section-body">
        <div class="row mt-5">
            <div class="col-12 col-md-12 col-lg-7 add-ticket">
                <div class="card">
                    <form method="post" action="{{route('tickets.store')}}">
                        @csrf
                        <div class="card-header">
                            <h4>Add Ticket</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12 col-md-12 mb-3">
                                    <label>Title</label>
                                    <input class="form-control" name="title" id="title" placeholder="title of ticket" value="{{ old('title') }}" required>
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-12 col-md-12 mb-3">
                                    <label>Type</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="">Select Roles</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-12 col-md-12 mb-3">
                                    <label>Info</label>
                                    <textarea class="form-control" id="info" name="info"  placeholder="write what you want" required>{{ old('info') }}</textarea>
                                    @error('info')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Add Ticket</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
