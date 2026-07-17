@extends('layouts.hiroshima')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Main Carousel Banner -->
    <section class="relative bg-white py-6">
        <div class="max-w-7xl mx-auto px-6">
            <div class="relative rounded-3xl overflow-hidden bg-blue-100 h-80" id="carousel">
                <img id="carouselImage" src="/assets/img/home/keyv_01.png" alt="Carousel" class="w-full h-full object-cover">

                <!-- Navigation Buttons -->
                <button onclick="prevSlide(); return false;" class="absolute left-6 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 z-20 cursor-pointer">
                    <img src="/assets/img/common/icon_prev.svg" alt="Previous" class="w-6 h-6">
                </button>
                <button onclick="nextSlide(); return false;" class="absolute right-6 top-1/2 -translate-y-1/2 bg-white rounded-full p-3 shadow-lg hover:bg-gray-100 z-20 cursor-pointer">
                    <img src="/assets/img/common/icon_next.svg" alt="Next" class="w-6 h-6">
                </button>
            </div>

            <!-- Slide Indicators -->
            <div class="flex justify-center space-x-3 mt-6" id="indicators">
                <button onclick="setGroup(0); return false;" class="w-3 h-3 rounded-full bg-blue-600 transition-all"></button>
                <button onclick="setGroup(1); return false;" class="w-2 h-2 rounded-full bg-gray-400 transition-all"></button>
                <button onclick="setGroup(2); return false;" class="w-2 h-2 rounded-full bg-gray-400 transition-all"></button>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-12 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="flex-1 text-center lg:text-left mb-8 lg:mb-0">
                    <h2 class="text-3xl lg:text-4xl font-bold text-blue-900 mb-2">広島空港</h2>
                    <h3 class="text-2xl lg:text-3xl font-bold text-blue-600 mb-4">リミナルパーク</h3>
                    <p class="text-gray-700 leading-relaxed max-w-lg">
                        広島空港のスポットで、子どもから大人まで楽しめるエリアです。飛行機の見学やさまざまな体験学習ができます。
                    </p>
                </div>
                <div class="flex-1 flex justify-center lg:justify-end">
                    <img src="/assets/img/home/img_introduce_bird.svg" alt="Mascot" class="w-56 h-56 lg:w-72 lg:h-72">
                </div>
            </div>
        </div>
    </section>

    <!-- Q&A Section -->
    <section class="py-16 px-6 bg-gradient-to-r from-blue-50 to-transparent">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">よくあるご質問</h2>
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <div class="flex-1">
                    <div class="bg-blue-600 text-white rounded-3xl p-8 text-center">
                        <div class="text-6xl font-bold mb-4">Q1</div>
                        <p class="text-lg">何について知りたいですか？</p>
                        <button class="mt-6 bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100">
                            質問をする
                        </button>
                    </div>
                </div>
                <div class="flex-1">
                    <img src="/assets/img/home/img_introduce.png" alt="Airport" class="w-full rounded-2xl shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Learning Sections -->
    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">学習コーナー</h2>

            <!-- Video Learning -->
            <div class="mb-12 bg-blue-50 rounded-3xl p-8 lg:p-12">
                <div class="flex flex-col lg:flex-row items-center gap-8">
                    <div class="flex-1">
                        <h3 class="text-2xl lg:text-3xl font-bold text-blue-700 mb-6">動画で学ぶコーナー</h3>
                        <p class="text-gray-700 text-lg mb-8">
                            飛行機や空港について学べる動画を配信しています。
                        </p>
                        <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">
                            動画を見る
                        </button>
                    </div>
                    <div class="flex-1 flex justify-center">
                        <img src="/assets/img/home/img_video.svg" alt="Video" class="w-full max-w-xs">
                    </div>
                </div>
            </div>

            <!-- Learning & Download Corners -->
            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                <!-- Learning Corner -->
                <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-8 border-2 border-green-100 shadow-sm">
                    <h3 class="text-2xl font-bold text-green-700 mb-6">学びのコーナー</h3>
                    <img src="/assets/img/home/img_learn01.png" alt="Learning" class="w-full h-56 object-cover rounded-2xl mb-6">
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        楽しく学べる教材や資料をご用意しています。
                    </p>
                    <button class="w-full bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700">
                        教材を見る
                    </button>
                </div>

                <!-- Download Corner -->
                <div class="bg-gradient-to-br from-purple-50 to-white rounded-3xl p-8 border-2 border-purple-100 shadow-sm">
                    <h3 class="text-2xl font-bold text-purple-700 mb-6">ダウンロードコーナー</h3>
                    <img src="/assets/img/home/img_learn02.png" alt="Download" class="w-full h-56 object-cover rounded-2xl mb-6">
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        ぬり絵やワークシートをダウンロードできます。
                    </p>
                    <button class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700">
                        ダウンロード
                    </button>
                </div>
            </div>

            <!-- Info Section -->
            <div class="bg-gradient-to-r from-blue-100 to-cyan-100 rounded-3xl p-8 lg:p-12 text-center">
                <h3 class="text-2xl font-bold text-blue-900 mb-4">安心・安全の広島港</h3>
                <p class="text-gray-800 text-lg mb-8 max-w-2xl mx-auto">
                    安全で快適な施設環境のため、様々な工夫をしています。
                </p>
                <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700">
                    詳しく見る
                </button>
            </div>
        </div>
    </section>

    <!-- Support Section -->
    <section class="py-16 px-6 bg-blue-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12">お役立ち情報</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100 hover:shadow-lg transition">
                    <img src="/assets/img/home/img_airport01.svg" alt="Info" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="font-bold text-blue-900 mb-2">空港情報</h3>
                    <p class="text-gray-600 text-sm">最新の空港情報をチェック</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100 hover:shadow-lg transition">
                    <img src="/assets/img/home/img_airport02.svg" alt="Info" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="font-bold text-blue-900 mb-2">アクセス</h3>
                    <p class="text-gray-600 text-sm">交通アクセス情報</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-blue-100 hover:shadow-lg transition">
                    <img src="/assets/img/home/img_airport03.svg" alt="Info" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="font-bold text-blue-900 mb-2">施設案内</h3>
                    <p class="text-gray-600 text-sm">施設のご案内</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Section -->
    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-2">Instagram</h2>
            <p class="text-center text-gray-600 text-lg mb-12">最新情報をチェック</p>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @for($i = 1; $i <= 5; $i++)
                    <div class="aspect-square bg-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
                        <img src="/assets/img/home/img_instagram0{{ $i }}.svg" alt="Instagram {{ $i }}" class="w-full h-full object-cover hover:scale-110 transition">
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="py-16 px-6 bg-gradient-to-r from-blue-600 to-blue-500 text-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="flex-1 text-center lg:text-left">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">空港スタッフのご予約</h2>
                    <p class="text-blue-100 text-lg mb-6">
                        今すぐお気軽にお問い合わせください
                    </p>
                    <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100">
                        ご予約・お問い合わせ
                    </button>
                </div>
                <div class="flex-1 flex justify-center">
                    <img src="/assets/img/common/icon_bird01.png" alt="Booking" class="w-40 h-40 opacity-90">
                </div>
            </div>
        </div>
    </section>
</div>
</div>

<script>
    const slides = [
        '/assets/img/home/keyv_01.png',
        '/assets/img/home/keyv_02.png',
        '/assets/img/home/keyv_03.png',
        '/assets/img/home/keyv_04.png',
        '/assets/img/home/keyv_05.png',
        '/assets/img/home/keyv_06.png'
    ];

    // Group slides: each group has 2 slides
    const slideGroups = [
        [0, 1],      // Group 0: keyv_01, keyv_02
        [2, 3],      // Group 1: keyv_03, keyv_04
        [4, 5]       // Group 2: keyv_05, keyv_06
    ];

    let currentGroup = 0;
    let currentSlide = 0;

    function updateCarousel() {
        const img = document.getElementById('carouselImage');
        if (img) {
            img.src = slides[currentSlide];
        }

        // Update indicators - only 3 buttons
        const indicators = document.querySelectorAll('#indicators button');
        indicators.forEach((btn, idx) => {
            if (idx === currentGroup) {
                btn.className = 'w-3 h-3 rounded-full bg-blue-600 transition-all';
            } else {
                btn.className = 'w-2 h-2 rounded-full bg-gray-400 transition-all';
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        // Update current group based on slide
        currentGroup = Math.floor(currentSlide / 2);
        updateCarousel();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        // Update current group based on slide
        currentGroup = Math.floor(currentSlide / 2);
        updateCarousel();
    }

    function setGroup(groupIndex) {
        currentGroup = groupIndex;
        currentSlide = slideGroups[groupIndex][0]; // Start from first slide of group
        updateCarousel();
    }

    // Initialize carousel
    document.addEventListener('DOMContentLoaded', function() {
        updateCarousel();
    });

    // Fallback initialization
    if (document.readyState === 'loading') {
        // Still loading
    } else {
        // Already loaded
        updateCarousel();
    }
</script>
@endsection
