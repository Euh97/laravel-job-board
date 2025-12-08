<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel - {{ $title ?? 'Job Board' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company" class="size-8" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                                @php
                                    $current = 'bg-gray-900 text-white';
                                    $default = 'text-gray-300 hover:bg-white/5 hover:text-white';

                                @endphp
                                <a href="/job" aria-current="page"
                                    class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('job') ? $current : $default }}">Dashboard</a>
                                <a href="/about"
                                    class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('about') ? $current : $default }}">About</a>
                                <a href="/contact"
                                    class="rounded-md px-3 py-2 text-sm font-medium {{ request()->is('contact') ? $current : $default }}">Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <header class="relative bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title ?? '' }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
