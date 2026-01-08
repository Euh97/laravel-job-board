<x-layout title="Blog Posts">
    @if (session('success'))
        <div class="bg-green-50 px-3 py-2">{{ session('success') }}</div>
    @endif
    <div class="mb-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
            New Post</a>
    </div>

    @forelse ($posts as $post)
        <div class="mb-4 px-4 py-6 border rounded-lg shadow-sm flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                <p class="text-gray-700">{{ $post->author }}</p>
            </div>
            <div>
                <a href="/blog/{{ $post->id }}/edit"
                    class="text-yellow-600 hover:text-indigo-500">Edit</a>
                <form action="/blog/{{ $post->id }}" method="POST" class="inline" onsubmit="return confirm('Are you sure ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 ml-2">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <p>No blog posts available.</p>
    @endforelse

    {{ $posts->links() }}

</x-layout>
