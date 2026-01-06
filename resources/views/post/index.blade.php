<x-layout title="Blog Posts">

    <div class="mb-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
            New Post</a>
    </div>

    @forelse ($posts as $post)
        <div class="mb-4 p-4 border rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700">{{ $post->body }}</p>
        </div>
    @empty
        <p>No blog posts available.</p>
    @endforelse

    {{ $posts->links() }}

</x-layout>
