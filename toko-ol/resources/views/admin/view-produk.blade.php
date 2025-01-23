@extends('layouts.master-dashboard')

<section>
    @section('content-dashboard')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Produk Details</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Category -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category" class="form-control-label">Category</label>
                                <select id="category" name="category_id" class="form-control" disabled>
                                    <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
                                </select>
                            </div>
                        </div>
    
                        <!-- Title -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title</label>
                                <input id="title" name="title" class="form-control" type="text" value="{{ $product->title }}" disabled>
                            </div>
                        </div>
    
                        <!-- Price -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="harga" class="form-control-label">Price</label>
                                <input id="harga" name="harga" class="form-control" type="text" value="{{ $product->harga }}" disabled>
                            </div>
                        </div>
    
                        <!-- Description -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description" class="form-control-label">Description</label>
                                <textarea id="description" name="description" class="form-control" rows="3" disabled>{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <!-- Image -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="image" class="form-control-label">Image</label>
                                <div>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product View" class="img-fluid rounded" width="30%">
                                </div>
                            </div>
                        </div>    
    
                        <!-- Back Button -->
                        <div class="col-12">
                            <a href="{{ route('produk') }}" class="btn btn-secondary w-25">Back to produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</section>