@extends('layouts.backend')

@section('title', 'Categories')



@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <h4 class="fw-bold pt-3  px-3 d-flex justify-content-between align-items-center">
                    @isset($category)
                    {{ $category->name }} - {{ $title }}
                    @else
                    {{ $title }}
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

                        <x-textbox name="category_name" labelname="Category Name" errorName="category_name" value="{{ $category->name ?? old('category_name')}}" />

                        <x-textbox type="file" name="categories_icon" labelname="Category Icon" errorName="categories_icon" />

                        <x-selectbox type="file" name="status" labelname="Status" errorName="status">
                                <option selected>Select Status</option>
                                @foreach (STATUS as $key=>$value)
                                <option value="{{$key}}" @isset($category) {{ $category->status==$key  ? 'selected' : ""}}
                                    @endisset>{{$value}}</option>
                                @endforeach
                        </x-selectbox>
                        <button type="submit" class="btn btn-primary btn-sm px-5 py-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
