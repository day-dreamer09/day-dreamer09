@extends('dashboard.template')
@section('dashboard-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Food Item</div>

                <div class="card-body">
                   @include('dashboard.partials.alert')

                   <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- This is necessary for CSRF protection -->



                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" >
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" >{{ old('Description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="{{ old('Price') }}" required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="" disabled selected>Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" >
                                    {{ $category->cate_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="made_by">Made By</label>
                        <input type="text" id="made_by" name="made_by" class="form-control" value="{{ old('Made_by') }}" >
                        @error('Made_by')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Quantity">Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control" value="{{ old('Quantity') }}" >
                        @error('Quantity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control" >
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gallery_image">Gallery Image (Optional)</label>
                        <input type="file" id="gallery_image" name="gallery_image" class="form-control">
                        @error('gallery_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection