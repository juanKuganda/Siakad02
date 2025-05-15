@props(["title", "section_title" => "Menu", "section_description" => ""])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
    <title>{{ $title }} - Siakad02</title>
</head>
<body class="bg-zinc-100">
    <main class="flex items-center w-full h-full">
        <div class="space-y-6 p-6 w-full h-full">
            <div class="flex items-center gap-2">
                <img src="/assets/img/logoUntad.png" alt="" class="size-8">
                <p class="text-xl uppercase font-bold">Siakad02</p>
            </div>
            <div
                class="flex justify-center gap-4 w-full border border-zinc-300 rounded-md shadow-md bg-white h-fit">
                <div class="w-[50%] p-6">
                    {{ $slot }}
                </div>
                <div class="rounded-lg">
                   <img src="/assets/img/untad.png" alt="" class="size-96 object-cover w-full h-full rounded-md">
                </div>
            </div>
        </div>
        </div>
    </main>
</body>
</html>