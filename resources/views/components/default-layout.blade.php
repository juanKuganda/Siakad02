@props(["title", "section_title" => "Menu"])
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
  <main x-data="{ sidebarOpen: true }" class="flex w-screen h-screen">
    <div x-show="sidebarOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-x-full"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform -translate-x-full"
         class="bg-white p-5 w-[20%] hidden md:block">
      <nav>
        <ul class="flex flex-col gap-5">
          <li>
            <div class="flex items-center gap-2">
              <img src="/assets/img/logoUntad.png" alt="" class="size-8">
              <p class="text-xl uppercase font-bold">Siakad02</p>
            </div>
          </li>
          <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->is('dashboard') ? 'text-black' : 'text-zinc-500' }}
               flex items-center gap-2 px-2 py-1 rounded font-semibold hover:text-black text-sm">
               <i class="ph ph-house block text-black text-2xl"></i>
              Dashboard
            </a>
          </li>
          <li>
            <a href="{{ route('students.index') }}"
               class="{{ request()->is('students') ? 'text-black' : 'text-zinc-500' }}
               flex items-center gap-2 px-2 py-1 rounded font-semibold hover:text-black text-sm">
               <i class="ph ph-student block text-black text-2xl"></i>
              Students
            </a>
          </li>
          <li>
            <a href="{{ route('majors.index') }}"
               class="{{ request()->is('majors') ? 'text-black' : 'text-zinc-500' }}
               flex items-center gap-2 px-2 py-1 rounded font-semibold hover:text-black text-sm">
          <i class="ph ph-chalkboard block text-black text-2xl"></i>
              Majors
            </a>
          </li>
          <li>
            <a href="{{ route('subject.index') }}"
               class="{{ request()->is('subject') ? 'text-black' : 'text-zinc-500' }}
               flex items-center gap-2 px-2 py-1 rounded font-semibold hover:text-black text-sm">
          <i class="ph ph-exam block text-black text-2xl"></i>
              Subject
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <div class="w-full">
      <header x-data="{ open: false }"
              class="flex items-center justify-between sm:justify-start gap-8 bg-white border-b border-zinc-300 sticky top-0 px-3 sm:px-8 py-4">

        <button @click="sidebarOpen = !sidebarOpen" 
                class="p-2 border rounded-lg cursor-pointer hover:bg-gray-100 hidden md:block">
          <i class="ph ph-sidebar-simple block text-black text-2xl"></i>
        </button>
        
       

        <div class="ml-auto relative" x-data="{ profileOpen: false }">
          <button  @click="profileOpen = !profileOpen"
          class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-100 group">
              <i class="ph ph-user-circle block text-black text-2xl"></i>
              <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
          </button>
  
          <div x-show="profileOpen" 
          class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 border">
              <a href="{{ route('profile.index') }}" 
                 class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                  Profile Settings
              </a>
              <form method="POST" action="{{ route('auth.logout') }}">
                  @csrf
                  @method("DELETE")
                  <button type="submit" 
                          class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      Sign Out
                  </button>
              </form>
          </div>
      </div>

       {{-- hamburger menu --}}
       <button x-on:click="open = !open" class="block sm:hidden bg-slate-50 border border-slate-400 p-2">
        <i class="ph ph-list block text-slate-400"></i>
      </button>

        {{-- mobile navigation --}}
        <div x-show="open" class="bg-white border border-zinc-300 shadow-lg sm:hidden absolute top-12 right-3">
          <ul class="flex flex-col gap-2">
            <li x-on:click="open = !open">
              <a href="{{ route('dashboard') }}"
                 class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100">Dashboard</a>
            </li>
            <li x-on:click="open = !open">
              <a href="{{ route('students.index') }}"
                 class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100">Students</a>
            </li>
            <li x-on:click="open = !open">
              <a href="{{ route('majors.index') }}"
                 class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100">Majors</a>
            </li>
            <li x-on:click="open = !open">
              <a href="{{ route('profile.index') }}"
                 class="block px-4 py-2 text-zinc-600 text-sm hover:bg-gray-100">Profile</a>
            </li>
          </ul>
        </div>
      </header>
      
      <section class="px-3 sm:px-8 py-4 flex flex-col gap-6">
        <h1 class="text-3xl font-bold">{{ $section_title }}</h1>
        {{ $slot }}
      </section>
    </div>
  </main>
</body>
</html>