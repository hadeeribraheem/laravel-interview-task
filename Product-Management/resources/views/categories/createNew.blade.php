@extends('layouts')

@section('content')
    <div class="container">
        <h1>Create Category with Questions</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <!-- Category Name -->
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <!-- Dynamic Questions Section -->
            <h3>Questions</h3>
            <div id="questions-section">
                <div class="form-group">
                    <label for="question_0">Question 1</label>
                    <input type="text" name="questions[0][question]" id="question_0" class="form-control" required>

                    <label for="type_0">Question Type</label>
                    <select name="questions[0][type]" id="type_0" class="form-control" onchange="showOptions(this, 0)" required>
                        <option value="text">Text</option>
                        <option value="select">Select</option>
                        <option value="data">Data</option>
                    </select>

                    <!-- Options Section for Select -->
                    <div id="select-options-0" class="mt-2" style="display: none;">
                        <h5>Options</h5>
                        <div class="form-group">
                            <input type="text" name="questions[0][options][]" class="form-control mb-2" placeholder="Option 1">
                            <input type="text" name="questions[0][options][]" class="form-control mb-2" placeholder="Option 2">
                            <button type="button" class="btn btn-secondary" onclick="addOption(0)">Add Another Option</button>
                        </div>
                    </div>

                    <label for="is_required_0">Is Required?</label>
                    <select name="questions[0][is_required]" id="is_required_0" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <button type="button" class="btn btn-secondary" id="add-question">Add Another Question</button>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
        </form>
    </div>

    <script>

    </script>
@endsection
