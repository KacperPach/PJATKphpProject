<x-app-layout>
    <div
        class=" mx-20 mt-20 mb-0 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

        <div>
            <!-- drawer init and toggle -->
            <div class="flex justify-between align-middle">
                <button
                    class=" p-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                    aria-controls="drawer-example">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="white"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 12H15M12 9V15M21.0039 12C21.0039 16.9706 16.9745 21 12.0039 21C9.9675 21 3.00463 21 3.00463 21C3.00463 21 4.56382 17.2561 3.93982 16.0008C3.34076 14.7956 3.00391 13.4372 3.00391 12C3.00391 7.02944 7.03334 3 12.0039 3C16.9745 3 21.0039 7.02944 21.0039 12Z"
                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>


            <!-- drawer component -->
            <div id="drawer-example"
                class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-label">
                <h5 id="drawer-label"
                    class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="white"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 12H15M12 9V15M21.0039 12C21.0039 16.9706 16.9745 21 12.0039 21C9.9675 21 3.00463 21 3.00463 21C3.00463 21 4.56382 17.2561 3.93982 16.0008C3.34076 14.7956 3.00391 13.4372 3.00391 12C3.00391 7.02944 7.03334 3 12.0039 3C16.9745 3 21.0039 7.02944 21.0039 12Z"
                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </h5>
                <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <x-comment-layout :post="$post"/>
            </div>

            <!-- page content -->
        </div>
        <div class="p-5">

            <div class="flex justify-between">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}
                </h5>
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-gray-600">
                    {{ $post->created_at }}</h5>
            </div>

            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}</p>
            @if (!is_null($post->file_extention))
                <div class=" w-full flex justify-center">
                    <img class="rounded-lg" src="/uploads/{{ $post->id . '.' . $post->file_extention }}"
                        alt="" />
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
