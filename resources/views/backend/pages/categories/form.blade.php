@extends('layouts.backend')

@section('title', 'Categories')



@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <h4 class="fw-bold pt-3  px-3 d-flex justify-content-between align-items-center"> New Category Add
                    <a href="{{ route('admin.categories.index')}}" class="btn btn-sm btn-danger px-5 py-2
                    ">
                        BACK</a>
                </h4>

                <div class="card-body">
                    <form action="{{ route('admin.categories.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Category Name</label>
                            <input type="text" class="form-control form-control-sm" name="category_name"
                                id="category-name" placeholder="Example: Electronics">
                            @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category-icon" class="form-label">Category Icon</label>
                            <input type="file" class="form-control form-control-sm" name="category_icon"
                                id="category-icon">
                            @error('category_icon')

                            <span class="text-danger">{{ $message }}</span>

                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category-status" class="form-label">Category Status</label>
                            <select class="form-select  form-control-sm" name="status" id="category-status"
                                aria-label="Default select example">

                                <option selected>Select Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Publish</option>
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