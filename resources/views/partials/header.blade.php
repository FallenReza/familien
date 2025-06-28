<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-[var(--border-color)] bg-white px-6 lg:px-10 py-4 shadow-sm">
    {{-- BAGIAN KIRI: LOGO --}}
    <div class="flex items-center gap-3">
        <div class="size-6 text-[var(--primary-color)]">
            <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M24 4H42V17.3333V30.6667H24V44H6V30.6667V17.3333H24V4Z" fill="currentColor" fill-rule="evenodd"></path>
            </svg>
        </div>
        <h2 class="text-[var(--text-primary)] text-xl font-semibold leading-tight tracking-[-0.015em]">Familien</h2>
    </div>

    {{-- BAGIAN TENGAH: NAVIGASI --}}
    <nav class="hidden lg:flex items-center gap-8">
        <a href="{{ route('dashboard') }}" class="text-sm font-medium leading-normal {{ request()->is('dashboard*') ? 'nav-link-active' : 'text-[var(--text-secondary)] hover:text-[var(--primary-color)]' }}">Dashboard</a>
        <a href="#" class="text-sm font-medium leading-normal text-[var(--text-secondary)] hover:text-[var(--primary-color)]">Maintenance</a>
    </nav>

    {{-- BAGIAN KANAN: AKSI (NOTIFIKASI & PROFIL) --}}
    <div class="flex items-center gap-4">

        <div x-data="{ open: false }" class="relative">

            {{-- Tombol Lonceng ada di sini --}}

            <button @click="open = !open" class="relative flex items-center justify-center rounded-full h-10 w-10 hover:bg-gray-100 text-gray-500 transition-colors">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>

                @if(isset($maintenanceUnits) && $maintenanceUnits->isNotEmpty())

                    <span class="absolute top-1 right-1 flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-orange-500"></span>
                    </span>
                @endif
            </button>

            {{-- Menu Dropdown Notifikasi ada di sini --}}
            
            <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-96 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-20" style="display: none;">
                <div class="flex items-center justify-between p-3 font-semibold border-b">
                    <span>Unit Under Maintenance</span>
                    {{-- DIUBAH: dari $unreadNotifications --}}
                    <span class="bg-orange-100 text-orange-600 text-xs font-bold px-2 py-1 rounded-full">{{ $maintenanceUnits->count() }}</span>
                </div>
                <div class="py-1 max-h-96 overflow-y-auto">
                    {{-- DIUBAH: dari $unreadNotifications as $notification menjadi $maintenanceUnits as $unit --}}
                    @forelse($maintenanceUnits as $unit)
                    <a href="{{ route('units.show', $unit->id) }}" class="block px-3 py-3 text-sm text-gray-700 hover:bg-gray-100 border-b last:border-b-0">
                        <div class="flex items-center justify-between">
                            <p class="font-bold text-gray-800">Unit: {{ $unit->unit_number }}</p>
                            <span class="px-2 py-1 rounded-full text-xs font-semibold status-maintenance">{{ ucfirst($unit->status) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
                            <span>Floor: {{ $unit->floor }}</span>
                            <span>Tower: {{ $unit->tower }}</span>
                        </div>
                    </a>
                    @empty
                    <p class="text-center text-sm text-gray-500 py-6">Tidak ada unit yang sedang maintenance.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="block">
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-transparent hover:border-[var(--primary-color)] transition-all" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA40AyJ172bGR6Zg2nnPFbyLw-IBEftL81JPxYwOhiB8RDUhBWSrvEpSgkyWb6YTncyeXgSYfMFNFFNDA2qwNLsrhzwWHh6Bs7gC6ql7lYhWNy4P5KjSMIUW2wFleA08nFt0GUS5GT6UQ2gWvvPUHnhK6Zr5q2RGrouA5BLChc7VQT59gV3-h0eGL-q1WVH--7hTnnSVhzBGM530KfbOeWHk9RxKCLnTU90q2pT6okJCg99iFAo3UqG5zLwq26n4UcUFtwy4lDDhDfR");'></div>
            </button>
            <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-64 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 z-20" style="display: none;">
                <div class="py-1">
                    <div class="px-4 py-3 border-b border-gray-200">
                        <p class="text-sm font-semibold text-gray-900 truncate mb-1">{{ Auth::user()->name }}</p>
                        <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="px-2 py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white text-center shadow-sm hover:bg-red-700 transition-colors">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="lg:hidden text-[var(--text-secondary)] hover:text-[var(--primary-color)]">
            <span class="sr-only">Buka menu</span>
        <svg fill="currentColor" height="24px" viewBox="0 0 256 256" width="24px"
                xmlns="http://www.w3.org/2000/svg">
                <path
                d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
            </path>
        </svg>
    </button>
    </div>
</header>