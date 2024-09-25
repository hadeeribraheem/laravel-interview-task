@extends('layouts')

@section('content')
    <div class="container">
        <h1>Create New Product</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="questions-section">
                @foreach($categories as $category)
                    <div class="category-questions" category-id="{{ $category->id }}" style="display: none;">
                        @foreach($category->questions as $question)
                            <div class="form-group">
                                <label>{{ $question->question }}</label>
                                @if($question->type === 'text')
                                    <input type="text" name="questions[{{ $question->id }}]" class="form-control" required>

                                @elseif($question->type === 'select')

                                    <select name="questions[{{ $question->id }}]" class="form-control" required>
                                        @foreach(json_decode($question->options) as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>

                                @elseif($question->type === 'data')
                                    <textarea name="questions[{{ $question->id }}]" class="form-control" required></textarea>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('category_id').addEventListener('change', function () {
            const selectedCategory = this.value;

            let questions = document.querySelectorAll('.category-questions');
            questions.forEach(section => {
                section.style.display = 'none';
            });

            if (selectedCategory) {
                const categoryQuestions = document.querySelector(`.category-questions[category-id="${selectedCategory}"]`);
                if (categoryQuestions) {
                    categoryQuestions.style.display = 'block';
                }
            }
        });
    </script>
@endsection
