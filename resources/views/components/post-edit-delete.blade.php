@props(['post' => "Post"])
@if (Auth::user() != null && Auth::user()->type == 'ADMIN')
<div class="inline-flex h-11">
    <a href="/admin/post/{{ $post->id }}/edit"
        class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2.5 px-4 rounded-l">
        edit
    </a>
    <form action="/admin/post/{{ $post->id }}/delete" method="post" class="flex">
        @csrf
        @method('DELETE')
        <input type="submit"
            class="  bg-red-900 hover:bg-red-800 text-white font-bold px-3 py-2 rounded-r"
            value="delete">
        </input>
    </form>
</div>
@endif

