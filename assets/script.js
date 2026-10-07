// ===== Site settings — edit these =====

// Your scheduling page link, e.g. "https://calendly.com/thegrowthroom"
// or "https://cal.com/thegrowthroom". Leave empty to show the email fallback.
const BOOKING_URL = "";

// Your contact email.
const CONTACT_EMAIL = "hello@yourdomain.com";

// ======================================

document.getElementById("year").textContent = new Date().getFullYear();

document.querySelectorAll(".contact-email").forEach((link) => {
  link.href = "mailto:" + CONTACT_EMAIL;
  if (link.textContent.includes("@")) link.textContent = CONTACT_EMAIL;
});

// Booking embed
if (BOOKING_URL) {
  const frame = document.getElementById("booking-widget");
  const url = new URL(BOOKING_URL);
  if (url.hostname.endsWith("calendly.com")) {
    url.searchParams.set("hide_gdpr_banner", "1");
    url.searchParams.set("primary_color", "c0674a");
    url.searchParams.set("embed_domain", location.hostname);
    url.searchParams.set("embed_type", "Inline");
  }
  frame.innerHTML = "";
  const iframe = document.createElement("iframe");
  iframe.src = url.toString();
  iframe.title = "Book a session with The Growth Room";
  iframe.loading = "lazy";
  frame.appendChild(iframe);
}

// Mobile menu
const toggle = document.querySelector(".nav-toggle");
const links = document.getElementById("nav-links");
toggle.addEventListener("click", () => {
  const open = links.classList.toggle("open");
  toggle.setAttribute("aria-expanded", open);
});
links.addEventListener("click", (e) => {
  if (e.target.tagName === "A") {
    links.classList.remove("open");
    toggle.setAttribute("aria-expanded", "false");
  }
});

// Header shadow on scroll
const header = document.querySelector(".site-header");
const onScroll = () => header.classList.toggle("scrolled", window.scrollY > 8);
window.addEventListener("scroll", onScroll, { passive: true });
onScroll();

// Fade-in on scroll
if ("IntersectionObserver" in window) {
  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          io.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );
  document.querySelectorAll(".reveal").forEach((el) => io.observe(el));
} else {
  document.querySelectorAll(".reveal").forEach((el) => el.classList.add("visible"));
}
