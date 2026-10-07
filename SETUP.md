# The Growth Room — Setup Guide

Everything you need to get the site live on your own domain, with bookings and payments.

---

## 1. Add your logo and headshot

Upload these two files into the `images/` folder (on GitHub: open `images/` → **Add file → Upload files**):

| File | Name it exactly | Tips |
|---|---|---|
| Logo | `images/logo.png` | Transparent background PNG works best, ~600px wide |
| Headshot | `images/headshot.jpg` | Portrait (4:5 ratio), at least 800×1000px, under 500 KB |

The site shows a placeholder until these exist. If your files are a different type (e.g. `logo.svg`), either rename them or update the filenames in `index.html`.

## 2. Fill in your details

In `index.html`, search for `[` to find every placeholder:

- `[Your Name]`, your story, and credentials in the **About Me** section
- `$[XX]` / `$[XXX]` prices in the **Pricing** section

In `assets/script.js`, set at the top:

```js
const BOOKING_URL = "https://calendly.com/your-link";   // see step 4
const CONTACT_EMAIL = "you@yourdomain.com";
```

## 3. Turn on GitHub Pages

1. The repository must be **public** (free GitHub Pages requires it on a free plan).
2. Merge this branch into `main`.
3. Go to the repo → **Settings → Pages**.
4. Under **Build and deployment**, choose **Source: Deploy from a branch**, **Branch: `main`**, folder **`/ (root)`**, then **Save**.
5. After a minute the site is live at `https://tomnado-tom.github.io/TheGrowthRoom/`.

## 4. Connect thegrowthroom.coach (registered through WordPress.com)

**a) GitHub side (already done)**

The repo contains a `CNAME` file with `thegrowthroom.coach`, which tells GitHub Pages to serve the site on that domain. Check **Settings → Pages → Custom domain** shows `thegrowthroom.coach`; if it's empty, type it in and **Save**.

**b) DNS records in WordPress.com**

Go to **wordpress.com → Upgrades → Domains → thegrowthroom.coach → DNS records**. The domain must be using **WordPress.com name servers** (the default). If it's attached to a WordPress site, first set it to point elsewhere / use custom DNS records.

1. **Delete** any existing `A` / `AAAA` records for `@` and any `CNAME` record for `www` that point at WordPress.
2. **Add these records:**

   | Type | Name / Host | Value |
   |---|---|---|
   | A | `@` (or blank) | `185.199.108.153` |
   | A | `@` (or blank) | `185.199.109.153` |
   | A | `@` (or blank) | `185.199.110.153` |
   | A | `@` (or blank) | `185.199.111.153` |
   | CNAME | `www` | `tomnado-tom.github.io` |

   Optional (IPv6) — `AAAA` records for `@`: `2606:50c0:8000::153`, `2606:50c0:8001::153`, `2606:50c0:8002::153`, `2606:50c0:8003::153`.

3. Leave any `MX` / email `TXT` records alone.

**c) Turn on HTTPS**

DNS can take 10 minutes to 24 hours. When **Settings → Pages** shows "DNS check successful", tick **Enforce HTTPS** (the certificate can take up to an hour to appear). `www.thegrowthroom.coach` will redirect to `thegrowthroom.coach` automatically.

**d) Optional — verify the domain**

Your GitHub profile → **Settings → Pages → Add a domain** → `thegrowthroom.coach`, then add the `TXT` record it shows in WordPress DNS. This stops anyone else using your domain on GitHub.

## 5. Bookings and payments

Building payments yourself on a static site isn't worth it — a scheduling tool handles the calendar, reminders, payment, and confirmation emails, and you just paste its link into `BOOKING_URL`. All of these sync to your Google/Outlook calendar and email you when someone books.

| Option | Cost (approx.) | Payments | Best for |
|---|---|---|---|
| **Calendly** *(recommended)* | Standard plan ~$10–12/mo | Stripe or PayPal | Easiest setup, polished embed, familiar to clients |
| **Cal.com** | Free plan | Stripe (via app) | Free option, similar to Calendly |
| **Acuity Scheduling** (Squarespace) | from ~$16–20/mo | Stripe, Square, PayPal | Selling session **packages**, gift certificates, intake forms |
| **Square Appointments** | Free for 1 person + card fees | Square | If you also take in-person card payments |

Prices change, so check each provider's site.

**Suggested Calendly setup**

1. Sign up at calendly.com and connect your calendar (Google/Outlook).
2. Create event types: *Discovery Call* (free, 20 min) and *Coaching Session* (60 min).
3. On the paid event → **Booking page options → Collect payments** → connect **Stripe** (cards, Apple Pay, Google Pay) or PayPal, and set the price.
4. Add a Zoom or Google Meet location so the video link is sent automatically.
5. Copy your scheduling page link (e.g. `https://calendly.com/thegrowthroom`) into `BOOKING_URL` in `assets/script.js`.

The site embeds it automatically in the **Book a Session** section. Cal.com links work the same way.

For the **Growth Package**, Acuity's packages feature is the smoothest; with Calendly, you can sell the package via a Stripe Payment Link and give clients a private booking link.
