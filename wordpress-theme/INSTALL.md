# Installing The Growth Room WordPress theme

The theme is a WordPress "block theme". Every word, image, colour and button on the home page can be edited in the WordPress Site Editor — no code needed.

**Download:** [`the-growth-room-theme.zip`](the-growth-room-theme.zip) (on GitHub, open the file and click the download button).

## 1. Check your plan

On **WordPress.com**, uploading your own theme needs the **Business** plan or higher (Upgrades → Plans). On lower plans the "Upload theme" button isn't available.

## 2. Upload and activate

1. WordPress dashboard → **Appearance → Themes → Add New Theme → Upload Theme**.
2. Choose `the-growth-room-theme.zip` → **Install Now** → **Activate**.

The theme includes its own home page template, so your home page changes straight away.

## 3. Logo and headshot

Both are already built in. The Growth Room logo shows on the live site straight away, and the headshot is in the About Me section.

Inside the editor the logo spots may show an empty "Site Logo" box until a logo is uploaded there. To make it show in the editor too (and to swap it later), click the **Site Logo** block in the header → **Add a site logo** → upload the logo file.

## 4. Edit the home page

**Appearance → Editor → Pages/Templates → Homepage** (the "Front Page" template). Click any text to change it. Things to update:

- **Pricing:** change `£[XX]` and `£[XXX]`, and check the session lengths (20 min / 60 min).
- **Photo:** to change it later, click the headshot → **Replace**.
- **Email address:** the booking and contact sections use `hello@thegrowthroom.coach`. Select the link/button and change it if your address is different. (That mailbox must exist — see email note below.)
- Click **Save** (top right) when done.

Sections are listed in the **List View** (the ☰ icon top left) as *About Me*, *What is Transformative Coaching?*, *What to Expect*, *Pricing*, *Booking* and *Contact*, so they're easy to find, reorder or delete.

## 5. Booking (Calendly)

The Booking section already shows the Calendly calendar for `calendly.com/cecily_therese`, and the theme loads Calendly's script itself.

If you've already saved your own version of the home page in the editor, the update won't replace your saved Booking section. Either reset the template (Appearance → Editor → Templates → Front Page → ⋮ → **Reset**; this also clears any other edits on that page), or add it by hand:

1. Select the white card in the Booking section, delete what's inside it, click **+** and add a **Custom HTML** block.
2. Paste just this one line (no `<script>` needed, the theme adds it):

   ```html
   <div class="calendly-inline-widget" data-url="https://calendly.com/cecily_therese?hide_gdpr_banner=1&primary_color=004aad" data-resize="true" style="min-width:300px;height:700px;"></div>
   ```

3. Save, then check the live page (the calendar only appears on the live site and in Preview, not inside the editor).

Free Calendly doesn't take payments; the Standard plan adds Stripe/PayPal.

## 6. Extra pages

Create a page normally (Pages → Add New). For a full-width page that uses the same section designs, pick the **Landing page (full width, no title)** template in the page settings, then click **+ → Patterns → The Growth Room** to drop in any section.

## Colours and fonts

**Appearance → Editor → Styles** lets you tweak the palette (Cream, Terracotta, Sage, Forest…) and fonts (Fraunces for headings, DM Sans for text) site-wide.

## Email note

There's currently no MX record on thegrowthroom.coach, so no address on the domain receives mail yet. In WordPress.com go to **Upgrades → Emails** to add Professional Email or free **email forwarding** (e.g. hello@thegrowthroom.coach → your personal inbox).
