# hiroshima

Hiroshima là một starter template Laravel có thể tái sử dụng cho các dự án, với môi trường Docker được chuẩn hóa và bộ quy tắc dành cho AI coding agents.

## Stack

- Laravel 12, PHP 8.3, Composer
- React 19, Tailwind CSS 4, Vite, Node.js 22
- MySQL 8.4, Redis 7, Nginx
- Mailpit, phpMyAdmin
- ESLint, Prettier, EditorConfig, Laravel Pint
- Pest
- GitHub Actions
- GitHub Copilot, Claude Code, Codex instructions
- `.ai/` project context
- MCP-ready configuration examples

## Nguyên tắc quan trọng

Docker là **source of truth** của môi trường phát triển. Copilot, Claude Code và Codex được phép đọc cấu hình hạ tầng nhưng không được tự ý thiết kế lại hoặc chỉnh sửa các file Docker, Nginx, CI và MCP nếu task không yêu cầu trực tiếp.

Mục tiêu là xây dựng infrastructure chuẩn một lần, sau đó để AI tập trung vào tính năng, test, refactor và tài liệu.

## Yêu cầu máy phát triển

- Git
- Docker Engine hoặc Docker Desktop có Docker Compose v2
- Make là tùy chọn; có thể chạy trực tiếp `docker compose`

Không cần cài PHP, Composer, Node.js, MySQL hoặc Redis trên máy host.

Trên Windows, nên chạy repository trong WSL2 để các script Bash và cơ chế UID/GID hoạt động nhất quán.

## Khởi tạo nhanh

```bash
cp .env.example .env
make setup
```

Không có `make`:

```bash
bash scripts/setup.sh
```

Sau khi hoàn tất:

| Dịch vụ         | URL / cổng            |
| --------------- | --------------------- |
| Ứng dụng        | http://localhost:8080 |
| Vite HMR        | http://localhost:5173 |
| Mailpit         | http://localhost:8025 |
| phpMyAdmin      | http://localhost:8081 |
| MySQL host port | `33060`               |
| Redis host port | `63790`               |

Thông tin database mặc định nằm trong `.env`.

## Lệnh thường dùng

```bash
make up                 # Khởi động dịch vụ
make down               # Dừng dịch vụ
make logs               # Xem log
make shell              # Mở shell trong PHP container
make artisan cmd="route:list"
make composer cmd="require vendor/package"
make npm cmd="install package-name"
make test               # Chạy Pest
make lint               # Pint + ESLint + Prettier check
make format             # Tự động format PHP và frontend
make build-assets       # Build frontend production
make quality            # Toàn bộ quality gate
make fresh              # migrate:fresh --seed
make destroy            # Xóa container và volume dữ liệu
```

## Luồng khởi động

1. `scripts/setup.sh` tạo `.env` nếu chưa tồn tại và điền UID/GID của host.
2. Docker build PHP 8.3 và khởi động MySQL, Redis, Mailpit, phpMyAdmin, PHP-FPM, Nginx và Node 22.
3. PHP entrypoint chạy `composer install` khi dependency thay đổi.
4. PHP entrypoint tạo `APP_KEY`, chờ database sẵn sàng và chạy migration.
5. Node entrypoint chạy `npm install` khi dependency thay đổi, sau đó chạy Vite HMR.
6. Nginx phục vụ Laravel tại cổng `8080`.

`composer.lock` và `package-lock.json` sẽ được tạo trong lần cài đầu tiên. Hãy commit hai file lock sau khi kiểm tra để các lần cài tiếp theo có tính quyết định.

## Cấu trúc chính

```text
.ai/                         Kiến trúc, coding rules, Docker rules, test rules
.github/copilot-instructions.md
.github/workflows/ci.yml
.mcp/                        Policy và cấu hình MCP mẫu
app/                         Laravel application
bootstrap/                   Laravel bootstrap
config/                      Laravel configuration
database/                    Migrations, factories, seeders
docker/php/                  PHP 8.3 image và entrypoint
docker/nginx/                Nginx configuration
docker/node/                 Node 22 entrypoint
resources/js/                React 19
resources/css/               Tailwind CSS 4
routes/                      Web và console routes
tests/                       Pest tests
AGENTS.md                    Codex instructions
CLAUDE.md                    Claude Code instructions
compose.yaml                 Docker Compose source of truth
Makefile                     Developer commands
```

## Testing và quality gates

```bash
make quality
```

Quality gate gồm:

- `composer validate --strict`
- Laravel Pint ở chế độ kiểm tra
- ESLint
- Prettier check
- Vite production build
- Pest test suite
- `docker compose config`

GitHub Actions chạy cùng các bước này trên PHP 8.3 và Node.js 22.

## AI workflow

Trước khi sửa code, agent phải đọc:

1. `AGENTS.md`, `CLAUDE.md` hoặc `.github/copilot-instructions.md`
2. `.ai/architecture.md`
3. `.ai/coding-standards.md`
4. `.ai/testing-rules.md`
5. `.ai/docker-rules.md`

Các file hạ tầng được xem là protected:

- `compose.yaml`
- `docker/**`
- `.github/workflows/**`
- `.mcp/**`
- `.env.example`

Agent chỉ chỉnh sửa các file này khi task yêu cầu trực tiếp và phải giải thích ảnh hưởng, rollback plan và validation đã chạy.

## MCP Ready

Thư mục `.mcp/` chứa policy và cấu hình mẫu. Copy file mẫu phù hợp với client đang sử dụng; không commit token hoặc secret.

```bash
cp .mcp/mcp.json.example .mcp.json
```

Sau đó thay placeholder bằng biến môi trường hoặc secret store của máy phát triển.

## Lưu ý production

Template này tối ưu cho local development và CI. Không triển khai nguyên trạng lên production vì Mailpit, phpMyAdmin và các port phát triển đang được công khai trên host. Production cần image bất biến, secret manager, TLS, backup, observability và hardening riêng.

## License

MIT.
