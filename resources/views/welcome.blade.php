<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-gray-950 h-dvh p-20">
    <div class=" flex flex-col content-stretch gap-5 w-full overflow-auto ">
        @foreach ( $listPost as $post )
        <a class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
            <div class=" max-h-96 overflow-auto">
                <p class="font-normal text-gray-700 dark:text-gray-400">{{$post->body}}</p>
            </div>
        </a>
        @endforeach
    </div>
</body>
</html>
