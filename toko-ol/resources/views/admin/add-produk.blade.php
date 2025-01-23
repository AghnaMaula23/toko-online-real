@extends('layouts.master-dashboard')

<section>
    @section('content-dashboard')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Add Product</p>
                    </div>
                </div>
                <div class="p-2">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <!-- Pesan Error -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Please fix the following issues:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                
                
                
                
                            <div class="card-body">
                                <form action="{{ route('produk.add') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Category -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="category" class="form-control-label">Category</label>
                                                <select id="category" name="category_id" class="form-control">
                                                    @foreach ($categories as $category)
                                                        
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                
                                        <!-- Title -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title" class="form-control-label">Title</label>
                                                <input id="title" name="title" class="form-control" type="text" placeholder="Enter product title">
                                            </div>
                                        </div>
                                
                                        <!-- harga -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="harga" class="form-control-label">Price</label>
                                                <input id="harga" name="harga" class="form-control" type="text" placeholder="Enter product price">
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="image" class="form-control-label">Image</label>
                                                <input id="image" name="image" class="form-control" type="file" accept="image/*">
                                            </div>
                                        </div>
                                        <!-- Description -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description" class="form-control-label">Description</label>
                                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter product description"></textarea>
                                            </div>
                                        </div>
                                
                                        <!-- Submit Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-25">Save</button>
                                        </div>
                                        <!-- Back Button -->
                                        <div class="col-12">
                                            <a href="{{ route('produk') }}" class="btn btn-secondary w-25">Back to Categories</a>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    // Hilangkan alert setelah 5 detik
                    setTimeout(() => {
                        const alerts = document.querySelectorAll('.alert');
                        alerts.forEach(alert => alert.remove());
                    }, 5000); // 5000 ms = 5 detik
                </script>
    @endsection
</section>