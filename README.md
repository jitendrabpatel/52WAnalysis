# 📈 52WAnalyzer: AI & Quantitative Stock Screener & Trading Terminal

> **Production-Grade Momentum, 52-Week High & Volume Gainer Terminal with Multi-Model Forward Strategy Simulator, Date Matrix, Trade Journal, and Admin Monetization Panel.**

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.5-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)

---

## 🚀 Key Modules & Capabilities

### 1. 📅 Date-Wise Multi-Tab Matrix
- **52-Week High Matrix**: Historical grid of 52W High breakouts with streak badges (`🔥 Super Streak`, `★ Active Streak`, `🚀 Day 1 Breakout`).
- **Volume Gainers Matrix**: Spurt multipliers (`💥 10x+ Mega Spurt`, `🔥 5x-10x Surge`, `⚡ 2x-5x Surge`).
- **Combined Dual Overlap Matrix**: Real-time confluence scoring for dual breakouts.
- **Stock Lifetime Journey Pop-Up**: Deep modal showing complete historical occurrences, cumulative price gain % since first breakout, peak streaks, and 1-click Journal logging.

### 2. 🔄 Multi-Session Re-Emergence Scanner
- **>5 Sessions Re-Emergence**: Stocks reappearing after a 5+ session consolidation.
- **>10 Sessions Re-Emergence**: Medium-term setup re-entries.
- **>15 Sessions Re-Emergence**: High-conviction swing institutional re-breakouts.

### 3. 🔬 Quantitative Strategy Forward Simulator
- **6 Configurable Holding Models**:
  - `Model A: BTST` (Buy Today, Sell Tomorrow)
  - `Model B: 5-Session Hold`
  - `Model C: 10-Session Hold`
  - `Model D: 15-Session Hold`
  - `Model E: 30-Session Hold`
  - `Model F: Smart Trailing ATR Dynamic Stop`
- **Universe Selection**: `52-Week Highs`, `Volume Gainers`, or `Both (Confluence)`.
- **Filters**: Minimum turnover, price range, volume surge multiplier, streak thresholds, SME exclusion, and circuit guards.
- **1-Click Batch Journal Logging**: Instant conversion of simulated setups into live journal entries.

### 4. 🛡️ Trading Holiday & Weekend Calendar Guard
- Native Indian Stock Market (NSE/BSE) holiday schedule (2025–2027).
- Automatic weekend suppression (Saturdays & Sundays) preventing duplicate/spurious entries.

### 5. ⚡ Centralized Daily NSE Sync
- Single global daily sync executed once per trading day for all users on first login or post-market batch run.
- Real-time market status indicator (`🟢 Market Live` / `🔴 Market Closed`).

### 6. 💎 User Monetization & Admin Analytics Panel
- **Tier Packages**: Starter (₹999/mo), Pro (₹2,499/mo), Elite (₹4,999/mo), 7-Day Free Trial.
- **Admin Control Hub** (`/admin`): MRR/ARR analytics, tier distribution, renewal pipeline, and 1-click tier override management.

---

## 👥 Demo Accounts (Password: `admin@123`)

| Role / Tier | Email | Password | Included Facilities |
| :--- | :--- | :--- | :--- |
| **Super Admin** | `admin@algodhara.com` | `admin@123` | Full Access + Admin Subscription Analytics & User Management |
| **Elite Algo** | `elite@algodhara.com` | `admin@123` | Complete 6-Model Strategy Simulator, Batch Journaling, Confluence Engine |
| **Pro Swing** | `pro@algodhara.com` | `admin@123` | Date Matrix, Re-Emergence (>5, >10, >15 sessions), 23 Pattern Scanners |
| **Starter** | `starter@algodhara.com` | `admin@123` | Daily 52W Highs, Volume Gainers, 7-Day Matrix |
| **Free Trial** | `trial@algodhara.com` | `admin@123` | 7-Day Active Pro Trial |

---

## 💻 Installation & Setup

```bash
# 1. Clone repository
git clone https://github.com/jitendrabpatel/52WAnalysis.git
cd 52WAnalysis/52WAnalyzer

# 2. Install PHP dependencies
composer install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Run database migrations & seed demo accounts
php artisan migrate
php artisan db:seed --class=DemoUsersSeeder

# 5. Start development server
php artisan serve
```

---

## 📄 License
Proprietary — Developed for AlgoDhara Quantitative Trading Systems.
