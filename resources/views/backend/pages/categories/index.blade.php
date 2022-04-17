@extends('layouts.backend')

@section('title', 'Categories')



@section('contents')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <h4 class="fw-bold py-3 mb-4 px-3 d-flex justify-content-between align-items-center"> Categories
                    <a href="{{ route('admin.categories.create')}}" class="btn btn-sm btn-primary px-5 py-2
                    ">
                        CREATE</a>
                </h4>

                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($category as $key =>$value)


                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$key+1}}</strong>
                                </td>
                                <td>{{ $value->name }}</td>
                                <td><span class="badge bg-label-primary me-1">{{ $value->slug }}</span></td>
                                <td><span class="badge bg-label-primary me-1">{{ $value->status}}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.categories.edit',$value->id)}}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item"
                                                href="{{ route('admin.categories.destroy',$value->id)}}"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection