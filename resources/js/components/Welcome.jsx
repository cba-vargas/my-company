const services = [
  ['Laravel', '12'],
  ['React', '19'],
  ['Tailwind CSS', '4'],
  ['PHP', '8.3'],
  ['Node.js', '22'],
  ['MySQL + Redis', 'Ready'],
];

export default function Welcome() {
  return (
    <main className="min-h-screen px-6 py-12 sm:px-10 lg:px-16">
      <div className="mx-auto max-w-6xl">
        <div className="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm sm:p-12">
          <div className="inline-flex rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">
            Infrastructure first · AI feature focused
          </div>

          <h1 className="mt-6 max-w-4xl text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">
            Laravel Starter Template
          </h1>

          <p className="mt-5 max-w-3xl text-lg leading-8 text-slate-600">
            Môi trường Docker chuẩn hóa một lần để Copilot, Claude Code và Codex tập trung vào
            phát triển tính năng thay vì tự đoán cấu hình hạ tầng.
          </p>

          <div className="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            {services.map(([name, version]) => (
              <div key={name} className="rounded-2xl border border-slate-200 p-5">
                <div className="text-sm font-medium text-slate-500">{name}</div>
                <div className="mt-1 text-2xl font-bold text-slate-900">{version}</div>
              </div>
            ))}
          </div>

          <div className="mt-10 rounded-2xl bg-slate-950 p-6 font-mono text-sm text-slate-100">
            <div>$ make quality</div>
            <div className="mt-2 text-slate-400">Pint · ESLint · Prettier · Vite build · Pest</div>
          </div>
        </div>
      </div>
    </main>
  );
}
