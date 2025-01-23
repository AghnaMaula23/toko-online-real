@extends('layouts.master')

@include('layouts.navbar')

<section>
    <div class="bg-white px-16">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="mt-6 grid grid-cols-4 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($products as $product)
                    <div class="group relative">
                        <!-- Gambar produk, pastikan path gambar sesuai -->
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
                        
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->title }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">${{ $product->harga }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
