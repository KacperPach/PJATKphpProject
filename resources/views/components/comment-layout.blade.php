@props(['post' => 'Post'])

<div>
    <form class="mb-6" action="{{route('saveComm', ['id' => $post->id])}}" method="post">
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            @csrf
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" name="comment" rows="6"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..." required></textarea>
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white dark:bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-800">
            Post comment
        </button>
    </form>
</div>

<div>
    @foreach ( $post->comments as $comm)
    <article class="mb-3 p-6 text-base bg-white rounded-lg dark:bg-gray-900">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center justify-between w-full">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">{{$comm->user != null? $comm->user->name: 'guest'}}</p>
                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                        title="February 8th, 2022">{{date_format($comm->created_at, 'Y/m/d H:i')}}</time></p>
            </div>
        </footer>
        <p class="text-gray-500 dark:text-gray-400">{{$comm->body}}</p>
    </article>
    @endforeach
</div>

