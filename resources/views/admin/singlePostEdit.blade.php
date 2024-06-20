<x-app-layout>
<body class="bg-gray-950 h-dvh p-20 flex justify-around">
    <div class="m-20 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6 h-full flex flex-col" method="post" action="/admin/post/{{$post->id}}/edit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Edytuj post</h5>
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Tytuł</label>
                <input type="text" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Przykładowy Tytuł..." value="{{$post->title}}" required/>
            </div>
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Treść postu</label>
            <textarea name="body" rows="4" class="block p-2.5 w-full resize-none h-64 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Treść przykładowego postu..." required> {{$post->body}}</textarea>
            <div class="flex flex-row justify-between">
            <div>
                <label for="previev" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Aktualne zdjęcie</label>
                @if (!is_null($post->file_extention))
                    <div class=" w-full flex justify-center">
                        <img class="rounded-lg w-20" src="/uploads/{{ $post->id . '.' . $post->file_extention }}"
                            alt="" />
                    </div>
                @endif
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zmień zdjęcie</label>
                <input type="file" name="file"
                  class="w-full text-gray-400 font-semibold text-sm bg-white border file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded" />
                <p class="text-xs text-gray-400 mt-2">PNG, JPG SVG, WEBP, GIF są dozwolone.</p>
            </div>
            </div>
            <div class=" w-full flex justify-end self-end">
                <button type="submit" class="place-self-end text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                        <span class="sr-only">Icon description</span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
