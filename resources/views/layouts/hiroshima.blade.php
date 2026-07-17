<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'hiroshima') }}</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="py-4 px-6 bg-white">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo & Title -->
                <div class="flex items-center space-x-3">
                    <img src="/assets/img/common/logo.svg" alt="Logo" class="h-10 w-auto">
                    <div>
                        <div class="font-bold text-blue-900 text-lg">広島空港</div>
                        <div class="font-semibold text-blue-600 text-sm">リミナルパーク</div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="#" class="text-gray-700 font-medium hover:text-blue-600 transition">施設紹介</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-blue-600 transition">ボランティア募集</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-blue-600 transition">イベント情報</a>
                    <a href="#" class="text-gray-700 font-medium hover:text-blue-600 transition">お問い合わせ</a>
                </nav>

                <!-- CTA Button -->
                <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition hidden lg:inline-block">
                    ご予約
                </button>

                <!-- Mobile Menu Toggle -->
                <button class="lg:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-12 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <img src="/assets/img/common/flogo.png" alt="Logo" class="h-8 mb-4">
                    <p class="text-gray-400 text-sm">広島空港リミナルパーク</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">リンク</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">施設紹介</a></li>
                        <li><a href="#" class="hover:text-white">ボランティア募集</a></li>
                        <li><a href="#" class="hover:text-white">お問い合わせ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">フォロー</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-blue-400">
                            <img src="/assets/img/common/icon_fb.png" alt="Facebook" class="w-6">
                        </a>
                        <a href="#" class="hover:text-red-400">
                            <img src="/assets/img/common/icon_yt.png" alt="YouTube" class="w-6">
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 広島空港リミナルパーク. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
