<html>
<head>
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link as="style"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
        onload="this.rel='stylesheet'" rel="stylesheet" />
    <meta charset="utf-8" />
    <title>Familien </title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style type="text/tailwindcss">
        :root {
            --primary-color: #dad740;
            --secondary-color: #f0f2f5;
            --text-primary: #111418;
            --text-secondary: #60758a;
            --border-color: #dbe0e6;
        }

        body {
            font-family: 'Inter', "Noto Sans", sans-serif;
        }

        .nav-link-active {
            color: var(--primary-color);
            font-weight: 700;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 4px;
        }

        .status-vacant {
            background-color: #e6fffa;
            color: #38a169;
            border: 1px solid #a0f0d0;
        }

        .status-maintenance {
            background-color: #fff9db;
            color: #d69e2e;
            border: 1px solid #f6e05e;
        }

        .status-occupied {
            background-color: #fff5f5;
            color: #c53030;
            border: 1px solid #fcc5c5;
        }

        .table-header-custom {
            color: var(--text-secondary);
            font-weight: 500;
        }

        .table-cell-link {
            color: var(--primary-color);
            font-weight: 500;
            cursor: pointer;
        }

        .table-cell-link:hover {
            text-decoration: underline;
        }

        .action-button {
            background-color: var(--primary-color);
            color: white;
        }

        .action-button:hover {
            background-color: #0b6acb;
        }

        .secondary-button {
            background-color: var(--secondary-color);
            color: var(--text-primary);
        }

        .secondary-button:hover {
            background-color: #e2e8f0;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="relative flex size-full min-h-screen flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-[var(--border-color)] bg-white px-6 lg:px-10 py-4 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="size-6 text-[var(--primary-color)]">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M24 4H42V17.3333V30.6667H24V44H6V30.6667V17.3333H24V4Z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 class="text-[var(--text-primary)] text-xl font-semibold leading-tight tracking-[-0.015em]">
                        Familien</h2>
                </div>
                <nav class="hidden lg:flex items-center gap-8">
                    <a class="nav-link-active text-[var(--text-secondary)] hover:text-[var(--primary-color)] text-sm font-medium leading-normal"
                        href="#">Dashboard</a>
                    <a class="text-[var(--text-secondary)] hover:text-[var(--primary-color)] text-sm font-medium leading-normal" href="#">Units</a>
                    <a class="text-[var(--text-secondary)] hover:text-[var(--primary-color)] text-sm font-medium leading-normal"
                        href="#">Maintenance</a>
                    <a class="text-[var(--text-secondary)] hover:text-[var(--primary-color)] text-sm font-medium leading-normal"
                        href="#">Reports</a>
                </nav>
                <div class="flex items-center gap-4">
                    <button
                        class="flex items-center justify-center rounded-full h-10 w-10 hover:bg-[var(--secondary-color)] text-[var(--text-secondary)] hover:text-[var(--primary-color)] transition-colors">
                        <span class="sr-only">Notifications</span>
                        <div data-icon="Bell" data-size="24px" data-weight="regular">
                            <svg fill="currentColor" height="24px" viewBox="0 0 256 256" width="24px"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216ZM48,184c7.7-13.24,16-43.92,16-80a64,64,0,1,1,128,0c0,36.05,8.28,66.73,16,80Z">
                                </path>
                            </svg>
                        </div>
                    </button>
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 border-2 border-transparent hover:border-[var(--primary-color)] transition-all"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA40AyJ172bGR6Zg2nnPFbyLw-IBEftL81JPxYwOhiB8RDUhBWSrvEpSgkyWb6YTncyeXgSYfMFNFFNDA2qwNLsrhzwWHh6Bs7gC6ql7lYhWNy4P5KjSMIUW2wFleA08nFt0GUS5GT6UQ2gWvvPUHnhK6Zr5q2RGrouA5BLChc7VQT59gV3-h0eGL-q1WVH--7hTnnSVhzBGM530KfbOeWHk9RxKCLnTU90q2pT6okJCg99iFAo3UqG5zLwq26n4UcUFtwy4lDDhDfR");'>
                    </div>
                    <button class="lg:hidden text-[var(--text-secondary)] hover:text-[var(--primary-color)]">
                        <svg fill="currentColor" height="24px" viewBox="0 0 256 256" width="24px"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                            </path>
                        </svg>
                    </button>
                </div>
            </header>
            <main class="px-6 lg:px-10 flex flex-1 justify-center py-8">
                <div class="layout-content-container flex flex-col w-full max-w-6xl">
                    @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-6 px-1">
                        <h1 class="text-[var(--text-primary)] text-3xl font-bold leading-tight">Apartment Units</h1>
                        <button
                            onclick="document.getElementById('addUnitModal').classList.remove('hidden')"
                            class="action-button flex items-center justify-center gap-2 rounded-lg h-10 px-5 text-sm font-medium leading-normal shadow-sm transition-colors">
                            <svg fill="currentColor" height="18px" viewBox="0 0 256 256" width="18px"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z">
                                </path>
                            </svg>
                            <span class="truncate">Add New Unit</span>
                        </button>
                    </div>
                    <form method="GET" action="{{ route('dashboard') }}" class="mb-6 px-1">
                        <label class="flex flex-col min-w-40 h-12 w-full max-w-md">
                            <div
                                class="flex w-full flex-1 items-stretch rounded-lg h-full shadow-sm border border-transparent focus-within:border-[var(--primary-color)] focus-within:ring-1 focus-within:ring-[var(--primary-color)]">
                                <div
                                    class="text-[var(--text-secondary)] flex bg-[var(--secondary-color)] items-center justify-center pl-4 rounded-l-lg">
                                    <svg fill="currentColor" height="20px" viewBox="0 0 256 256" width="20px"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                                        </path>
                                    </svg>
                                </div>
                                <input
                                    name="search"
                                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-[var(--text-primary)] focus:outline-none focus:ring-0 border-none bg-[var(--secondary-color)] h-full placeholder:text-[var(--text-secondary)] px-4 py-2 text-sm font-normal leading-normal"
                                    placeholder="Search by unit number, floor, tower, status" value="{{ $search ?? '' }}" />
                            </div>
                        </label>
                    </form>
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden @container">
                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[900px]">
                                <thead class="bg-gray-50 border-b border-[var(--border-color)]">
                                    <tr>
                                        <th
                                            class="table-header-custom px-6 py-4 text-left text-xs tracking-wider uppercase">
                                            Unit</th>
                                        <th
                                            class="table-header-custom px-6 py-4 text-left text-xs tracking-wider uppercase">
                                            Floor</th>
                                        <th
                                            class="table-header-custom px-6 py-4 text-left text-xs tracking-wider uppercase">
                                            Tower</th>
                                        <th
                                            class="table-header-custom px-6 py-4 text-left text-xs tracking-wider uppercase">
                                            Status</th>
                                        <th
                                            class="table-header-custom px-6 py-4 text-left text-xs tracking-wider uppercase">
                                            <span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($units as $unit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $unit->unit_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $unit->floor }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $unit->tower }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="
                                                @if($unit->status == 'available') status-vacant
                                                @elseif($unit->status == 'maintenance') status-maintenance
                                                @elseif($unit->status == 'occupied') status-occupied
                                                @else ''
                                                @endif
                                                px-2 py-1 rounded-full text-xs font-semibold">
                                                {{ ucfirst($unit->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('units.show', $unit->id) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium mr-2">
                                                View
                                            </a>
                                            <button
                                                onclick="openEditModal({{ $unit->id }}, '{{ $unit->unit_number }}', {{ $unit->floor }}, '{{ $unit->tower }}', '{{ $unit->status }}')"
                                                class="text-indigo-600 hover:text-indigo-900 text-sm font-medium mr-2">
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ route('units.delete', $unit->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this unit?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No units found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-center">
                        {{ $units->withQueryString()->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Unit Modal -->
    <div id="addUnitModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Add New Unit</h2>
            <form method="POST" action="{{ route('units.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="unit_number" class="block text-sm font-medium text-gray-700">Unit Number</label>
                    <input type="text" name="unit_number" id="unit_number" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50" />
                </div>
                <div class="mb-4">
                    <label for="floor" class="block text-sm font-medium text-gray-700">Floor</label>
                    <input type="number" name="floor" id="floor" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50" />
                </div>
                <div class="mb-4">
                    <label for="tower" class="block text-sm font-medium text-gray-700">Tower</label>
                    <input type="text" name="tower" id="tower" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50" />
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50">
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('addUnitModal').classList.add('hidden')"
                        class="secondary-button rounded-lg px-4 py-2">Cancel</button>
                    <button type="submit" class="action-button rounded-lg px-4 py-2">Add Unit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Edit Unit Modal -->
    <div id="editUnitModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Edit Unit</h2>
            <form id="editUnitForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_unit_number" class="block text-sm font-medium text-gray-700">Unit Number</label>
                    <input type="text" name="unit_number" id="edit_unit_number" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50" />
                </div>
                <div class="mb-4">
                    <label for="edit_floor" class="block text-sm font-medium text-gray-700">Floor</label>
                    <input type="number" name="floor" id="edit_floor" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50" />
                </div>
                <div class="mb-4">
                    <label for="edit_tower" class="block text-sm font-medium text-gray-700">Tower</label>
                    <input type="text" name="tower" id="edit_tower" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50" />
                </div>
                <div class="mb-4">
                    <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="edit_status" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[var(--primary-color)] focus:ring focus:ring-[var(--primary-color)] focus:ring-opacity-50">
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('editUnitModal').classList.add('hidden')"
                        class="secondary-button rounded-lg px-4 py-2">Cancel</button>
                    <button type="submit" class="action-button rounded-lg px-4 py-2">Update Unit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, unitNumber, floor, tower, status) {
            const modal = document.getElementById('editUnitModal');
            modal.classList.remove('hidden');

            const form = document.getElementById('editUnitForm');
            form.action = `/units/${id}`;

            document.getElementById('edit_unit_number').value = unitNumber;
            document.getElementById('edit_floor').value = floor;
            document.getElementById('edit_tower').value = tower;
            document.getElementById('edit_status').value = status;
        }
    </script>
</body>

</html>
