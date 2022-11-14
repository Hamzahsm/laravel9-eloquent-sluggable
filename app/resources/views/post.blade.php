@extends('layouts.main')

@section('dashboard-container')
<div class="container mt-5">
    <h3 class="text-uppercase">Input The Product</h3>
    <h5 class="fw-bold">Instruction</h5>
    <ul>
        <li>Fill the title form then 'click' tab on keybord</li>
    </ul>

    <div class="col-lg-8 mt-3">
        <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control mt-2 @error('title') is-invalid @enderror" id="title" name="title" required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> 
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control mt-2 @error('slug') is-invalid @enderror" id="slug" name="slug"  disabled readonly >
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Test !</button>
        </form>
    </div>
</div>

{{-- script dibawah adalah untuk membuat sluggable & preview image  --}}
<script>
    // script untuk membuat slug otomatis
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');

    title.addEventListener('change', function(){
        fetch('/post/createSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>

@endsection