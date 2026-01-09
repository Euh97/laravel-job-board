<x-layout title="{{ $post->title }}">
    <article class="prose lg:prose-xl mx-auto my-8">
        <h1>{{ $post->title }}</h1>
        <p class="text-gray-500">By {{ $post->author }} on {{ $post->created_at->format('F j, Y') }}</p>
        <div>
            {!! nl2br(e($post->body)) !!}
        </div>
        @forelse ($post->comments as $comment)
            <div class="mt-4 p-3 bg-gray-100 rounded shadow-sm">
                <p class="text-gray-800"><strong>{{ $comment->content }}</strong></p>
                <p class="mt-1 text-sm text-gray-600">-{{ $comment->user_id }}</p>
            </div>
        @empty
            <p>No comments</p>
        @endforelse

        <form method="POST" action="/comments" class="mt-8 px-4 py-6 border border-gray-200 bg-gray-100">
            @csrf
            <input type="hidden" value="{{ $post->id }}" name="post_id" />
            {{-- @error('post_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror --}}
            <div class="space-y-12 px-4">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="user_id" class="block text-sm/6 font-medium text-gray-900">It's comment
                                by</label>
                            <div class="mt-2">
                                <input id="user_id" type="text" name="user_id" value="{{ old('user_id') }}"
                                    autocomplete="family-name"
                                    class="{{ $errors->has('user_id') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                            </div>
                            @error('user_id')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <div class="mt-2">
                                <textarea id="content" name="content" rows="3" placeholder="Leave your comment.."
                                    class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    Comment</button>
            </div>
        </form>
    </article>

</x-layout>
