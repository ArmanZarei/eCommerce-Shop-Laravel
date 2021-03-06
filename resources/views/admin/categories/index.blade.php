@extends('admin.layouts.master')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container-fluid p-4 rounded-2">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 bg-white rounded-2">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <h5 class="me-3">Categories</h5>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-style-1 no-duration btn-light-primary d-flex align-items-center">
                            <i class="fa fa-plus me-2"></i>
                            New
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table custom-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>NAME</th>
                                <th>SLUG</th>
                                <th>PARENT</th>
                                <th>DESCRIPTION</th>
                                <th>ACTIVE</th>
                                <th>ICON</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($categories->isEmpty())
                                <tr>
                                    <td colspan="10" class="text-center pt-4 pb-4">No records found</td>
                                </tr>
                            @endif
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{ $categories->firstItem() + $key }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->parent ? $category->parent->name : '-' }}</td>
                                    <td>{{ $category->description ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center {{ $category->is_active ? "custom-text-primary" : "custom-text-danger" }}">
                                            <i class="fa fa-circle me-1" style="font-size: 8px"></i>
                                            <span class="custom-text-bold">{{ $category->is_active ? 'Active' : 'Inactive' }}</span>
                                        </div>
                                    </td>
                                    <td><i class="{{ $category->icon }}"></i></td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <div class="cell-actions">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" title="edit"><i class="fad fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
