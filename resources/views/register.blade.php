<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link crossorigin="" href="https://fonts.gstatic.com/" rel="preconnect" />
    <link as="style"
        href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B600%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B600%3B700%3B900"
        onload="this.rel='stylesheet'" rel="stylesheet" />
    <title>Register - Familien Property</title>
    <link href="data:image/x-icon;base64," rel="icon" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style type="text/tailwindcss">
        :root {
            --primary-color: #dad740;
            --primary-color-hover: #939809;
        }

        body {
            font-family: 'Inter', "Noto Sans", sans-serif;
            background-image: url("{{ asset('asset/gedung.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-slate-50">
    <div class="relative flex min-h-screen flex-col items-center justify-center group/design-root overflow-x-hidden">
        <div class="w-full max-w-md p-8 space-y-8 bg-white shadow-2xl rounded-xl">
            <header class="text-center">
                <div class="inline-flex items-center justify-center gap-3 text-slate-800 mb-6">
                    <div class="size-8 text-[var(--primary-color)]">
                        <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z"
                                fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold tracking-tight">Familien Property</h1>
                </div>
                <p class="text-slate-600 text-sm">Create a new account</p>
            </header>
            <form method="POST" action="/register" class="space-y-6">
                @csrf
                @if ($errors->any())
                    <div class="mb-4 text-red-600 text-sm">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="username">Username</label>
                    <input autocomplete="username"
                        class="form-input block w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] py-3 px-4 text-sm placeholder-slate-400"
                        id="username" name="username" placeholder="your-username" required type="text" value="{{ old('username') }}" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="name">Name</label>
                    <input autocomplete="name"
                        class="form-input block w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] py-3 px-4 text-sm placeholder-slate-400"
                        id="name" name="name" placeholder="Your full name" required type="text" value="{{ old('name') }}" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                    <input autocomplete="email"
                        class="form-input block w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] py-3 px-4 text-sm placeholder-slate-400"
                        id="email" name="email" placeholder="you@example.com" required type="email" value="{{ old('email') }}" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="password">Password</label>
                    <input autocomplete="new-password"
                        class="form-input block w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] py-3 px-4 text-sm placeholder-slate-400"
                        id="password" name="password" placeholder="••••••••" required type="password" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="password_confirmation">Confirm Password</label>
                    <input autocomplete="new-password"
                        class="form-input block w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] py-3 px-4 text-sm placeholder-slate-400"
                        id="password_confirmation" name="password_confirmation" placeholder="••••••••" required type="password" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="role">Role</label>
                    <select
                        class="form-select block w-full rounded-lg border-slate-300 bg-slate-50 shadow-sm focus:border-[var(--primary-color)] focus:ring-[var(--primary-color)] py-3 px-4 text-sm"
                        id="role" name="role" required>
                        <option value="">Select a role</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div>
                    <button
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-[var(--primary-color)] hover:bg-[var(--primary-color-hover)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary-color)] transition-colors duration-150"
                        type="submit">
                        Create Account
                    </button>
                </div>
            </form>
            <p class="text-center text-sm text-slate-500">
                Already have an account? <a
                    class="font-medium text-[var(--primary-color)] hover:text-[var(--primary-color-hover)]"
                    href="/">Sign in</a>
            </p>
        </div>
    </div>

</body>

</html>
