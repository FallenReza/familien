<html>

<head>
    <meta charset="utf-8" />
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link as="style"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B600%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
        onload="this.rel='stylesheet'" rel="stylesheet" />
    <title>Apartment Maintenance</title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style type="text/tailwindcss">
        :root {
            --primary-color: #dad740;
            --primary-hover-color: #939809;
            --secondary-color: #f0f2f5;
            --text-primary: #111418;
            --text-secondary: #60758a;
            --border-color: #dbe0e6;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.25rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .status-completed {
            background-color: #e6f7f0;
            color: #00875a;
        }

        .status-in-progress {
            background-color: #fff3e0;
            color: #ff8f00;
        }

        .status-pending {
            background-color: #e3f2fd;
            color: #1e88e5;
        }
    </style>
</head>

<body class="bg-gray-50" style='font-family: Inter, "Noto Sans", sans-serif;'>
    <div class="relative flex size-full min-h-screen flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1">
                <main class="flex-1 bg-white">
                    <div class="p-6 md:p-8">
                        <a href="{{ route('dashboard') }}" class="inline-block mb-4 px-4 py-2 bg-[var(--primary-color)] text-white rounded hover:bg-[var(--primary-hover-color)]">Back to Dashboard</a>
                        <div class="flex items-center space-x-2 text-sm text-[var(--text-secondary)] mb-6">
                            <a class="hover:text-[var(--primary-color)]" href="#">Units</a>
                            <span>/</span>
                            <span class="font-medium text-[var(--text-primary)]">Unit {{ $unit->unit_number }}</span>
                        </div>
                        <div class="mb-6">
                            <h1 class="text-[var(--text-primary)] text-3xl font-bold">Unit {{ $unit->unit_number }}</h1>
                            <p class="text-[var(--text-secondary)] text-base">Floor {{ $unit->floor }} · Tower {{ $unit->tower }}</p>
                        </div>
                        <div class="border-b border-[var(--border-color)] mb-6">
                            <nav class="flex space-x-8 -mb-px">
                                <a aria-current="page"
                                    class="py-4 px-1 border-b-2 border-[var(--primary-color)] text-[var(--primary-color)] text-sm font-medium"
                                    href="#">Maintenance</a>
                            </nav>
                        </div>
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-[var(--text-primary)] text-xl font-semibold">Maintenance History</h2>
                            <button
                                class="flex items-center gap-2 px-4 py-2 bg-[var(--primary-color)] text-white text-sm font-medium rounded-lg hover:bg-[var(--primary-hover-color)] transition-colors">
                                <svg fill="currentColor" height="20" viewBox="0 0 256 256" width="20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z">
                                    </path>
                                </svg>
                                New Request
                            </button>
                        </div>
                        <div class="overflow-x-auto @container">
                            <div class="border border-[var(--border-color)] rounded-lg bg-white">
                                <table class="min-w-full divide-y divide-[var(--border-color)]">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="table-column-date px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Date</th>
                                            <th class="table-column-type px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Type</th>
                                            <th class="table-column-priority px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Priority</th>
                                            <th class="table-column-reported-by px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Reported By</th>
                                            <th class="table-column-assigned-to px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Assigned To</th>
                                            <th class="table-column-status px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Status</th>
                                            <th class="table-column-description px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Description</th>
                                            <th class="table-column-completed-at px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Completed At</th>
                                            <th class="relative py-3.5 pl-3 pr-4 sm:pr-6" scope="col">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                            <th class="table-column-documentation-images px-6 py-3.5 text-left text-sm font-semibold text-[var(--text-primary)]"
                                                scope="col">Documentation Images</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[var(--border-color)] bg-white">
                                        @foreach ($maintenanceReports as $report)
                                        @php
                                            if ($report->reportedBy) {
                                                $reportedByName = $report->reportedBy->name;
                                            } else {
                                                $reportedByName = 'N/A';
                                            }
                                            if ($report->assignedTo) {
                                                $assignedToName = $report->assignedTo->name;
                                            } else {
                                                $assignedToName = 'N/A';
                                            }
                                            if ($report->completed_at) {
                                                $completedAtFormatted = $report->completed_at;
                                            } else {
                                                $completedAtFormatted = 'N/A';
                                            }
                                        @endphp
                                        <tr>
                                            <td
                                                class="table-column-date whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)]">
                                                {{ \Carbon\Carbon::parse($report->reported_at)->format('M d, Y') }}</td>
                                            <td
                                                class="table-column-type whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)]">
                                                {{ $report->title }}</td>
                                            <td
                                                class="table-column-priority whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)]">
                                                {{ ucfirst($report->priority) }}</td>
                                            <td
                                                class="table-column-reported-by whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)]">
                                                {{ $reportedByName }}</td>
                                            <td
                                                class="table-column-assigned-to whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)]">
                                                {{ $assignedToName }}</td>
                                            <td class="table-column-status whitespace-nowrap px-6 py-4 text-sm">
                                        @php
                                            $statusClass = 'status-pending';
                                            if (strtolower($report->status) == 'completed') {
                                                $statusClass = 'status-completed';
                                            } elseif (strtolower($report->status) == 'in progress') {
                                                $statusClass = 'status-in-progress';
                                            }
                                        @endphp
                                        <span class="status-badge {{ $statusClass }}">
                                            {{ ucfirst($report->status) }}
                                        </span>
                                            </td>
                                            <td
                                                class="table-column-description px-6 py-4 text-sm text-[var(--text-secondary)] max-w-xs truncate">
                                                {{ $report->description }}</td>
                                            <td
                                                class="table-column-completed-at whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)]">
                                                {{ $completedAtFormatted }}</td>
                                             <td
                                                class="table-column-documentation-images whitespace-nowrap px-6 py-4 text-sm text-[var(--text-secondary)] max-w-xs truncate">
                                                @php
                                                    $images = json_decode($report->documentation_images, true);
                                                @endphp
                                                @if(is_array($images) && count($images) > 0)
                                                    <div class="flex space-x-2 overflow-x-auto max-w-xs">
                                                        @foreach($images as $index => $image)
                                                            <img src="{{ asset($image) }}" alt="Documentation Image" class="h-10 w-auto rounded cursor-pointer" onclick="openModal('{{ asset($image) }}')" />
                                                        @endforeach
                                                    </div>
                                                @elseif($report->documentation_images)
                                                    <img src="{{ asset($report->documentation_images) }}" alt="Documentation Image" class="h-10 w-auto rounded cursor-pointer" onclick="openModal('{{ asset($report->documentation_images) }}')" />
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <style>
                                @media (max-width: 640px) {
                                    .table-column-description {
                                        display: none;
                                    }
                                }
                                @media (max-width: 520px) {
                                    .table-column-type {
                                        display: none;
                                    }
                                }
                                @media (max-width: 420px) {
                                    .table-column-date {
                                        display: none;
                                    }
                                }
                            </style>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Modal for image preview -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 z-50" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="modalTitle" aria-describedby="modalDesc">
        <div class="relative max-w-[90vw] max-h-[80vh]">
            <button onclick="closeModal()" aria-label="Close image preview" class="absolute top-2 right-2 text-white text-3xl font-bold cursor-pointer hover:text-gray-300 transition-colors">&times;</button>
            <img id="modalImage" src="" alt="Enlarged Documentation Image" class="max-h-[80vh] max-w-[90vw] rounded mx-auto block" />
        </div>
    </div>

    <script>
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        function openModal(src) {
            modalImage.src = src;
            modal.classList.remove('pointer-events-none', 'opacity-0');
            modal.classList.add('opacity-100');
            modal.setAttribute('aria-hidden', 'false');
            document.addEventListener('keydown', handleKeyDown);
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');
            modal.classList.add('pointer-events-none');
            modal.setAttribute('aria-hidden', 'true');
            modalImage.src = '';
            document.removeEventListener('keydown', handleKeyDown);
        }

        function handleKeyDown(event) {
            if (event.key === 'Escape') {
                closeModal();
            }
        }

        // Close modal when clicking outside the image
        modal.addEventListener('click', function(event) {
            if(event.target === modal) {
                closeModal();
            }
        });
    </script>
</body>




