@extends('layouts.master-dashboard')
@section('title-page', 'Movie Details')
<section>
    @section('content-dashboard')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Category Details</p>
                    </div>
                </div>
    
                <div class="card-body">
                    <div class="row">
                        <!-- Year -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">name</label>
                                <input id="name" name="name" class="form-control" type="text" value="{{ $category->name }}" disabled>
                            </div>
                        </div>
    
    
                        <!-- Back Button -->
                        <div class="col-12">
                            <a href="{{ route('category') }}" class="btn btn-secondary w-25">Back to Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</section>