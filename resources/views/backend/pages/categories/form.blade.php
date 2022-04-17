@extends('layouts.backend')

@section('title', 'Categories')



@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <h4 class="fw-bold pt-3  px-3 d-flex justify-content-between align-items-center">
                    @isset($category)
                    {{ $category->name }} -Edit
                    @else
                    New Category Add
                    @endisset
                    <a href="{{ route('admin.categories.index')}}" class="btn btn-sm btn-danger px-5 py-2">BACK</a>
                </h4>

                <div class="card-body">
                    <form
                        action="{{ isset($category) ? route('admin.categories.update',$category->id): route('admin.categories.store')}}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @isset($category)
                        @method('PUT')
                        <input type="hidden" name="update_id" value="{{ $category->id }}">
                        @endisset
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Category Name</label>
                            <input type="text" class="form-control form-control" name="category_name" id="category-name"
                                placeholder="Example: Electronics" value="{{ $category->name ?? old('category_name')}}">
                            @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category-icon" class="form-label">Category Icon</label>
                            <input type="file" class="form-control form-control" name="categories_icon"
                                id="category-icon">
                            @error('categories_icon')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category-status" class="form-label">Category Status</label>
                            <select class="form-select  form-control" name="status" id="category-status">
                                <option selected>Select Status</option>
                                <option value="0" @isset($category) {{ $category->status==0 ? 'selected' : ""}}
                                    @endisset>Pending</option>
                                <option value="1" @isset($category) {{ $category->status==1 ? 'selected' : ""}}
                                    @endisset>Publish</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm px-5 py-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection