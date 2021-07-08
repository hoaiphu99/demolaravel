@extends('admin.master')
@section('title', 'Category')
@section('content')

<!-- Page-header start -->
<div>
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Quản lý chuyên mục</h4>
                    
                </div>
            </div>
            <hr>
            <div>
                <button type="button" class="btn btn-primary">Thêm</button>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard')}}">
                        <i class="icofont icofont-home"></i>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Chuyên mục</a></li>
            </ul>
        </div>
    </div>
</div>
</div>
<!-- Page-header end -->

<!-- Page-body start -->
<div class="page-body">
<!-- Hover table card start -->
<div class="card">
    {{-- <?php dd($category) ?> --}}
    <div class="container">
        <form class="form-group" method="post" action="{{ route('category.create')}}">
            @csrf
          <label for=""></label>
          <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Name</small>
          <input type="text" name="description" id="description" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Description</small>
          <button type="submit">Add</button>
        </form>
    </div>
    {{-- <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên chuyên mục</th>
                        <th>Mô tả</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $c)
                    <tr>
                        <th scope="row">{{ $c->id }}</th>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->description }}</td>
                        <td><i class="fa fa-pencil"><b>Sửa</b></i></td>
                        <td><i class="fa fa-pencil"><a href="{{ route('admin.category')}}">Xóa</a></i></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div> --}}
</div>
<!-- Hover table card end -->
</div>
<!-- Page-body end -->
</div>                    
@endsection