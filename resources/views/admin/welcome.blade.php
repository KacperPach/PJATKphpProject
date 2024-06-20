<x-app-layout>
    <div class=" m-7 flex flex-col content-stretch gap-5  overflow-auto ">
        @foreach ( $listPost as $post )

        <a href="/admin/post/{{$post->id}}" class=" border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <div class="p-5">
                <div class="flex justify-between">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-600">{{$post->created_at}}</h5>
                </div>
                <div class=" max-h-96 overflow-y-auto">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-wrap overflow-x-hidden whitespace-normal sw-11/12">{{$post->body}}</p>
                    @if (!is_null($post->file_extention))
                    <div class=" flex justify-center">
                        <img class="rounded-lg" src="/uploads/{{$post->id.".".$post->file_extention}}" alt="" />
                    </div>
                    @endif
                </div>
            </div>
        </a>

        @endforeach
    </div>
</x-app-layout>
