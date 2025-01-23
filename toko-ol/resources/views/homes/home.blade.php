@extends('layouts.master')
<body>
    @include('layouts.navbar')
    <section class="bg-white py-25 antialiased dark:bg-gray-900 md:py-24">
        <div class="mx-auto grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-12 lg:pb-16 xl:gap-0">
          <div class="content-center justify-self-start md:col-span-7 md:text-start">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight dark:text-white md:max-w-2xl md:text-5xl xl:text-6xl">Limited Time Offer!<br />Up to 50% OFF!</h1>
            <p class="mb-4 max-w-2xl text-gray-500 dark:text-gray-400 md:mb-12 md:text-lg mb-3 lg:mb-5 lg:text-xl">Don't Wait - Limited Stock at Unbeatable Prices!</p>
          </div>
          <div class="hidden md:col-span-5 md:mt-0 md:flex">
            <img class="dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/girl-shopping-list.svg" alt="shopping illustration" />
            <img class="hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/girl-shopping-list-dark.svg" alt="shopping illustration" />
          </div>
        </div>
      </section>
      <div class="bg-white px-16" >
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Best Seller</h2>
      
          <div class="mt-6 grid grid-cols-4 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative">
              <img src="../img/denim.jpeg" alt="Front of men&#039;s Basic Tee in black." class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700">
                    <a href="#">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Denim Jacket
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Blue</p>
                </div>
                <p class="text-sm font-medium text-gray-900">$70</p>
              </div>
            </div>
            <!-- More products... -->
            
          </div>

        </div>
      </div>
      
    </body>