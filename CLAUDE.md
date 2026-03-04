# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Corporate website for DIG-UP DATA Inc., a technology company providing AI, data analysis, and DX consulting services. Built with vanilla PHP, CSS, and JavaScript without frameworks.

**Live Domain**: digup-data.co.jp
**Company**: 株式会社DIG-UP DATA (founded 2023-01-04)

## Architecture

### Directory Structure

```
app_hp/
├── config/          # Centralized configuration (all settings here)
│   ├── cfg_app.php       # Mail & security settings
│   ├── cfg_company.php   # Company info constants
│   ├── cfg_security.php  # Security functions (CSRF, rate limiting)
│   ├── cfg_seo.php       # SEO metadata & structured data
│   ├── cfg_pages.php     # Page definitions
│   ├── cfg_messages.php  # UI messages
│   └── cfg_constants.php # General constants
├── public/          # Public-facing pages
│   ├── home.php          # Homepage (recently redesigned)
│   ├── vision.php        # Company vision
│   ├── services.php      # 6 core services
│   ├── company.php       # Company info & timeline
│   ├── careers.php       # Recruitment
│   ├── contact.php       # Contact form
│   └── thanks.php        # Form success page
├── includes/        # Shared templates
│   ├── header.php        # Navigation, SEO meta tags
│   └── footer.php        # Footer with Dify chatbot
├── api/             # Backend endpoints
│   ├── mail.php          # Form submission handler
│   └── token.php         # CSRF token generation
└── vendor/          # PHPMailer library

css/
├── style.css        # Main stylesheet (4,863 lines)
└── variables.css    # CSS custom properties

js/
├── script.js        # Global: navbar, scroll animations
├── home.js          # Homepage: news lists rendering
├── contact.js       # Contact form validation & submission
├── config.js        # JS configuration
├── animation-config.js  # Animation settings
└── company-data.js  # Company data constants

data/                # JSON data files
├── announcements.json   # Company announcements
├── tech_news.json       # Industry news (future: AI-generated)
├── featured.json        # Featured articles
└── news.json            # Legacy news format

img/                 # Images (SVG logo, vision images)
video/               # Background videos for each page
```

### Key Design Patterns

**Configuration-First Approach**: All settings centralized in `app_hp/config/`. To modify company info, mail settings, or security rules, edit the relevant `cfg_*.php` file.

**Shared Templates**: All pages use `includes/header.php` and `includes/footer.php`. Set `$page_key` variable before including header for proper SEO metadata.

**JSON-Driven Content**: News/announcements managed via JSON files in `data/`. Homepage dynamically renders from these using JavaScript.

**Security Functions**: All security logic (CSRF, sanitization, rate limiting) centralized in `cfg_security.php` for reuse across endpoints.

## Common Development Commands

### Local Development

```bash
# Start PHP built-in server (from project root)
php -S localhost:8000

# Access site at:
# http://localhost:8000/app_hp/public/home.php
```

### File Operations

```bash
# Edit company information
# Edit: app_hp/config/cfg_company.php

# Update news/announcements
# Edit: data/announcements.json or data/tech_news.json

# Modify mail settings
# Edit: app_hp/config/cfg_app.php
```

### Testing Contact Form

```bash
# Check error logs after form submission
tail -f app_hp/../logs/error.log

# Test CSRF token generation
curl http://localhost:8000/app_hp/api/token.php
```

## Page Modification Workflow

When adding or modifying pages:

1. **Create PHP file in `app_hp/public/`**
2. **Set page variables before including header**:
   ```php
   <?php
   $page_key = 'your-page-name';  // Used for SEO metadata
   $page_title = 'Your Page Title | 株式会社DIG-UP DATA';
   require_once __DIR__ . '/../includes/header.php';
   ?>
   ```
3. **Add SEO metadata in `cfg_seo.php`**:
   - Add entry to `META_DESCRIPTIONS`, `META_KEYWORDS`, `CANONICAL_URLS`
4. **Include footer**:
   ```php
   <?php require_once __DIR__ . '/../includes/footer.php'; ?>
   ```

## News Data Management

Homepage displays two types of news managed via JSON:

### Files
- `data/announcements.json`: Company announcements (manual updates)
- `data/tech_news.json`: Industry news (manual now, AI-planned for future)

### Structure
```json
// announcements.json
{
  "id": 1,
  "date": "2025-02-02",
  "category": "プレスリリース | お知らせ | 休業日 | メディア掲載",
  "title": "...",
  "link": "...",
  "published": true  // false to hide
}

// tech_news.json
{
  "id": 1,
  "date": "2025-02-02",
  "category": "AI | DX | データ | テクノロジー",
  "title": "...",
  "link": "...",
  "source": "...",
  "auto_generated": false
}
```

### Rendering Flow
1. PHP loads JSON: `home.php` reads files via `file_get_contents()`
2. Data passed to JS: `<script>const announcements = <?php echo $json; ?>;</script>`
3. JS renders: `home.js` generates HTML and injects into DOM

### Maintenance Mode
See `NEWS_MAINTENANCE_GUIDE.md` for how to temporarily hide news section (3 steps: comment out JSON loading, replace HTML with maintenance message, comment out JS data).

## Contact Form Flow

**Frontend** (contact.php):
1. User fills form → client-side validation (contact.js)
2. Show confirmation screen (data in sessionStorage)
3. Fetch CSRF token from `/api/token.php`
4. POST to `/api/mail.php` with token

**Backend** (api/mail.php):
1. Verify CSRF token
2. Check honeypot (spam prevention)
3. Check rate limit (5 min/IP)
4. Sanitize & validate
5. Send via `mb_send_mail()` or SMTP (PHPMailer)
6. Return JSON response
7. Frontend redirects to thanks.php

### Security Features
- **CSRF Protection**: Session-based tokens
- **XSS Prevention**: `htmlspecialchars()` on all output
- **Rate Limiting**: IP-based (5 min cooldown)
- **Honeypot**: Hidden field to catch bots
- **Email Header Injection Prevention**: Strip newlines from headers
- **Referer Check**: Only allowed domains

## CSS Architecture & Known Issues

**Current State**: `css/style.css` is 4,863 lines with technical debt:
- 302 uses of `!important`
- Duplicate selectors (e.g., `.section-title-large` defined 19 times)
- 79+ hardcoded colors (should use CSS variables)
- 39 scattered media queries

**Do NOT attempt large-scale CSS refactoring without reading `CSS_REFACTORING_PLAN.md`**.

Key lessons from previous refactoring attempts:
- Complete dependency mapping required before any deletions
- Button styles have complex 3-layer overrides
- Always backup and test screenshots after each change
- Estimated 6-8 weeks for complete refactor

**Safe CSS edits**: Adding new styles at the end, modifying colors via CSS variables in `variables.css`.

## SEO Implementation

All SEO is handled in `cfg_seo.php` which provides:
- Meta descriptions & keywords per page
- OGP (Open Graph) tags
- Twitter Card metadata
- Canonical URLs
- Structured data (breadcrumbs, organization, local business)

To update SEO for a page, edit the arrays in `cfg_seo.php` and ensure `$page_key` matches.

## Branch Strategy

- **main**: Production branch
- **renewal_1**: Current development branch (recent homepage redesign)

When making changes, create feature branches off `renewal_1`.

## Important Files to Never Modify Directly

- `app_hp/vendor/PHPMailer/`: External library (update via Composer or manual download)
- `css/style.css.backup`: Backup from previous refactor attempt

## Security Configuration

**Production Checklist**:
1. Set `ALLOWED_REFERERS` in `cfg_app.php` to production domain
2. Verify `RATE_LIMIT_ENABLED: true`
3. Ensure `HONEYPOT_ENABLED: true`
4. Update `MAIL_TO` to actual inquiry email
5. If using SMTP, configure `SMTP_*` constants in `cfg_app.php`
6. Set error log path: `ERROR_LOG_FILE`
7. Enable HTTPS for secure cookies

**Do NOT commit**: SMTP credentials, API keys, production email addresses.

## Testing Checklist

Before deploying changes:
- [ ] Test all pages on desktop (1920x1080)
- [ ] Test all pages on tablet (768x1024)
- [ ] Test all pages on mobile (375x667)
- [ ] Submit contact form and verify email receipt
- [ ] Check CSRF token generation
- [ ] Verify news data renders correctly on homepage
- [ ] Test rate limiting (submit form twice quickly)
- [ ] Check browser console for JS errors

## Future Roadmap Notes

**Phase 2 (Planned)**: CMS admin panel for news management (currently manual JSON editing)

**Phase 3 (Planned)**: AI-powered news aggregation (external APIs + OpenAI summarization + daily cron job)

**CSS Refactor**: Large project requiring dedicated test environment, screenshot comparison tools, and 6-8 week timeline. See `CSS_REFACTORING_PLAN.md`.

## Additional Documentation

- `README.md`: Comprehensive project overview & feature documentation
- `CSS_REFACTORING_PLAN.md`: Detailed CSS technical debt analysis
- `NEWS_MAINTENANCE_GUIDE.md`: How to toggle news section maintenance mode
- `GOOGLE_SEARCH_CONSOLE_GUIDE.md`: SEO & search console setup
- `data/README_DATA_MANAGEMENT.md`: News data management detailed guide
