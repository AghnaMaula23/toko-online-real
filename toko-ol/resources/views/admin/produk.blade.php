@extends('layouts.master-dashboard')

<section>
    @section('content-dashboard')
    <div class="row">
    <div class="search-produk-dashboard">
          <form action="{{ route('produk') }}" method="GET" class="search-form">
            <div class="input-container">
              <i class="fas fa-search"></i>
              <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Produk..." />
            </div>
          </form>
        </div>

        <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Products List</h6>
                <div style="text-align: right">
                  <a href="{{ route('produk.add') }}" class="btn btn-sm btn-success">
                      <i class="fas fa-plus me-1"></i> Add Product
                  </a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @foreach ($products as $product)
                            <tr style="border-bottom: white;">
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $product->title }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ Str::words($product->harga, 5, '...') }}</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    {{ $product->description }}
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $product->director }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <a href="{{ route('produk.editProduk', $product->id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit Produk">
                                        Edit
                                    </a>
                                    <form action="{{ route('produk.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('produk.show', $product->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="View Details">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Paginasi -->
                <div class="d-flex justify-content-between align-items-center mt-4 ms-4">
                  <!-- Pagination -->
                  <nav aria-label="Page navigation example">
                      {{ $products->links('pagination::bootstrap-5') }}
                  </nav>
              </div>
              
            </div>
            
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