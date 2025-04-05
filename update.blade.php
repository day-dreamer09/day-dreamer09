@extends('dashboard.template')

@section('dashboard-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Food Item</div>

                <div class="card-body">
                    @include('dashboard.partials.alert')

                    <form action="{{ route('menu.update', $editdata->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') <!-- This is required for updating --> --}}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $editdata->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description', $editdata->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $editdata->price) }}" required>
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="" disabled>Select a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $editdata->category_id == $category->id ? 'selected' : '' }}>
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
                            <input type="text" id="made_by" name="made_by" class="form-control" value="{{ old('made_by', $editdata->made_by) }}">
                            @error('made_by')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $editdata->quantity) }}">
                            @error('quantity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img src="{{ asset($editdata->image)}}" height="100px" width="100px" alt="">
                            <label class="form-lable">Update Menu Image</label>
                            <input type="file" name="image"  class="form-control>
                           
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
{{-- 
                        <div class="form-group">
                            <label for="gallery_image">Gallery Image (Optional)</label>
                            <input type="file" id="gallery_image" name="gallery_image" class="form-control">
                            @if($menuItem->gallery_image)
                                <img src="{{ asset('storage/' . $menuItem->gallery_image) }}" alt="Gallery Image" width="100">
                            @endif
                            @error('gallery_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div  class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
