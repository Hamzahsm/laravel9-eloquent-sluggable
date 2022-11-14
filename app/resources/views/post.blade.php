@extends('layouts.main')

@section('dashboard-container')
<div class="container mt-5">
    <h3 class="text-uppercase">Buat Postingan Baru</h3>

    <div class="col-lg-8 mt-3">
        <form action="/user" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Judul</label>
                <input type="text" class="form-control mt-2 @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> 
            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control mt-2 @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" disabled readonly >
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
                <img class="image-preview img-fluid mb-3 col-sm-5">
                <input type="file" class="form-control" id="image" name="image" onChange="previewImage()">
                @error('image')
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
        fetch('/user/post/createSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    // script untuk preview image
    function previewImage(){
        const image = document.getElementById('image');
        const imagePreview = document.querySelector('.image-preview');

        imagePreview.style.display = 'block'; 

        // mengambil gambar
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imagePreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection