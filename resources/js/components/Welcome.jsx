import { useState } from 'react';

export default function Welcome() {
  const [currentSlide, setCurrentSlide] = useState(0);

  const slides = [
    {
      image: '/assets/img/home/keyv_01.png',
      title: 'ボランティア募集',
      description: '広島空港リミナルパーク',
    },
    {
      image: '/assets/img/home/keyv_02.png',
      title: '施設紹介',
      description: 'ご協力お願いします',
    },
    {
      image: '/assets/img/home/keyv_03.png',
      title: 'イベント情報',
      description: 'キャンペーン実施中',
    },
  ];

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % slides.length);
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + slides.length) % slides.length);
  };

  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <header className="bg-blue-600 text-white py-4 px-6">
        <div className="max-w-7xl mx-auto flex items-center justify-between">
          <div className="flex items-center space-x-2">
            <img src="/assets/img/common/logo.svg" alt="Logo" className="h-8" />
            <span className="font-bold">広島空港リミナルパーク</span>
          </div>
          <nav className="hidden md:flex space-x-6">
            <a href="#" className="hover:text-blue-200">
              施設紹介
            </a>
            <a href="#" className="hover:text-blue-200">
              ボランティア募集
            </a>
            <a href="#" className="hover:text-blue-200">
              イベント情報
            </a>
            <a href="#" className="hover:text-blue-200">
              お問い合わせ
            </a>
          </nav>
        </div>
      </header>

      {/* Main Carousel */}
      <section className="relative bg-gradient-to-b from-blue-50 to-white py-8">
        <div className="max-w-6xl mx-auto px-6">
          <div className="relative rounded-2xl overflow-hidden bg-blue-100 h-96">
            <img
              src={slides[currentSlide].image}
              alt={slides[currentSlide].title}
              className="w-full h-full object-cover"
            />
            <button
              onClick={prevSlide}
              className="absolute left-4 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-100"
            >
              <img src="/assets/img/common/icon_prev.svg" alt="Previous" className="w-5 h-5" />
            </button>
            <button
              onClick={nextSlide}
              className="absolute right-4 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-100"
            >
              <img src="/assets/img/common/icon_next.svg" alt="Next" className="w-5 h-5" />
            </button>
          </div>

          {/* Slide Indicators */}
          <div className="flex justify-center space-x-2 mt-4">
            {slides.map((_, idx) => (
              <button
                key={idx}
                onClick={() => setCurrentSlide(idx)}
                className={`w-2 h-2 rounded-full transition-all ${
                  idx === currentSlide ? 'bg-blue-600 w-6' : 'bg-gray-300'
                }`}
              />
            ))}
          </div>
        </div>
      </section>

      {/* Introduction Section */}
      <section className="py-16 px-6 bg-gradient-to-b from-white to-blue-50">
        <div className="max-w-6xl mx-auto">
          <div className="flex flex-col lg:flex-row items-center gap-12">
            <div className="flex-1">
              <h2 className="text-4xl font-bold text-gray-800 mb-4">広島空港リミナルパーク</h2>
              <p className="text-gray-600 leading-relaxed mb-6">
                広島空港のスポットで、子どもから大人まで楽しめるエリアです。
                飛行機の見学やさまざまな体験学習ができます。
              </p>
              <button className="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">
                詳しく見る
              </button>
            </div>
            <div className="flex-1 flex justify-center">
              <img
                src="/assets/img/home/img_introduce_bird.svg"
                alt="Mascot"
                className="w-64 h-64"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Learning Sections */}
      <section className="py-16 px-6 bg-white">
        <div className="max-w-6xl mx-auto">
          <h2 className="text-3xl font-bold text-center mb-12">学習コーナー</h2>

          {/* Video Learning */}
          <div className="mb-16 bg-blue-50 rounded-2xl p-8">
            <div className="flex flex-col lg:flex-row items-center gap-8">
              <div className="flex-1">
                <h3 className="text-2xl font-bold text-blue-600 mb-4">動画で学ぶコーナー</h3>
                <p className="text-gray-600 mb-6">
                  飛行機や空港について学べる動画を配信しています。
                </p>
                <button className="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                  動画を見る
                </button>
              </div>
              <div className="flex-1">
                <img src="/assets/img/home/img_video.svg" alt="Video" className="w-full h-auto" />
              </div>
            </div>
          </div>

          {/* Learning & Download Corners */}
          <div className="grid lg:grid-cols-2 gap-8">
            {/* Learning Corner */}
            <div className="bg-gradient-to-b from-green-50 to-white rounded-2xl p-8 border border-green-100">
              <h3 className="text-2xl font-bold text-green-700 mb-4">学びのコーナー</h3>
              <p className="text-gray-600 mb-6">楽しく学べる教材や資料をご用意しています。</p>
              <img
                src="/assets/img/home/img_learn01.png"
                alt="Learning"
                className="w-full h-48 object-cover rounded-lg mb-4"
              />
              <button className="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 w-full">
                教材を見る
              </button>
            </div>

            {/* Download Corner */}
            <div className="bg-gradient-to-b from-purple-50 to-white rounded-2xl p-8 border border-purple-100">
              <h3 className="text-2xl font-bold text-purple-700 mb-4">ダウンロードコーナー</h3>
              <p className="text-gray-600 mb-6">ぬり絵やワークシートをダウンロードできます。</p>
              <img
                src="/assets/img/home/img_learn02.png"
                alt="Download"
                className="w-full h-48 object-cover rounded-lg mb-4"
              />
              <button className="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 w-full">
                ダウンロード
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* Safety Section */}
      <section className="py-16 px-6 bg-blue-600 text-white">
        <div className="max-w-6xl mx-auto text-center">
          <h2 className="text-3xl font-bold mb-4">安心・安全の広島港</h2>
          <p className="text-blue-100 mb-8 max-w-2xl mx-auto">
            安全で快適な施設環境のため、様々な工夫をしています。
          </p>
          <button className="bg-white text-blue-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100">
            詳しく見る
          </button>
        </div>
      </section>

      {/* Instagram Section */}
      <section className="py-16 px-6 bg-white">
        <div className="max-w-6xl mx-auto">
          <h2 className="text-3xl font-bold text-center mb-4">Instagram</h2>
          <p className="text-center text-gray-600 mb-12">最新情報をチェック</p>
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            {[1, 2, 3, 4, 5].map((idx) => (
              <div key={idx} className="aspect-square bg-gray-200 rounded-lg overflow-hidden">
                <img
                  src={`/assets/img/home/img_instagram0${idx}.svg`}
                  alt={`Instagram ${idx}`}
                  className="w-full h-full object-cover"
                />
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-slate-900 text-white py-12 px-6">
        <div className="max-w-6xl mx-auto">
          <div className="grid md:grid-cols-3 gap-8 mb-8">
            <div>
              <img src="/assets/img/common/flogo.png" alt="Logo" className="h-8 mb-4" />
              <p className="text-gray-400 text-sm">広島空港リミナルパーク</p>
            </div>
            <div>
              <h4 className="font-bold mb-4">リンク</h4>
              <ul className="space-y-2 text-gray-400">
                <li>
                  <a href="#" className="hover:text-white">
                    施設紹介
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white">
                    ボランティア募集
                  </a>
                </li>
                <li>
                  <a href="#" className="hover:text-white">
                    お問い合わせ
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold mb-4">フォロー</h4>
              <div className="flex space-x-4">
                <a href="#" className="hover:text-blue-400">
                  <img src="/assets/img/common/icon_fb.png" alt="Facebook" className="w-6" />
                </a>
                <a href="#" className="hover:text-red-400">
                  <img src="/assets/img/common/icon_yt.png" alt="YouTube" className="w-6" />
                </a>
              </div>
            </div>
          </div>
          <div className="border-t border-gray-700 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; 2024 広島空港リミナルパーク. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}
