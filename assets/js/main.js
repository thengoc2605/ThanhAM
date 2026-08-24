/**
 * main.js — dùng chung cho các trang của Thanh Âm
 * 1) Chuyển tab (data-tab-btn / data-tab-panel) không tải lại trang
 * 2) Accordion cho các "info-card" (Tổng quan)
 */
document.addEventListener("DOMContentLoaded", function () {
  /* ---------- 1) TAB SWITCHING ---------- */
  var tabButtons = document.querySelectorAll("[data-tab-btn]");
  var tabPanels = document.querySelectorAll("[data-tab-panel]");

  function activateTab(tabKey, updateUrl) {
    tabButtons.forEach(function (btn) {
      btn.classList.toggle(
        "active",
        btn.getAttribute("data-tab-btn") === tabKey,
      );
    });
    tabPanels.forEach(function (panel) {
      panel.classList.toggle(
        "active",
        panel.getAttribute("data-tab-panel") === tabKey,
      );
    });

    if (updateUrl && window.history && window.history.pushState) {
      var url = new URL(window.location.href);
      url.searchParams.set("tab", tabKey);
      window.history.pushState({ tab: tabKey }, "", url);
    }
  }

  tabButtons.forEach(function (btn) {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      activateTab(btn.getAttribute("data-tab-btn"), true);
      // Cuộn nhẹ lên đầu khu vực nội dung khi đổi tab trên di động
      var wrap = document.querySelector(".tabs-wrap");
      if (wrap && window.innerWidth < 720) {
        wrap.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });

  // Cho phép back/forward của trình duyệt hoạt động đúng với tab
  window.addEventListener("popstate", function () {
    var params = new URLSearchParams(window.location.search);
    var tabKey = params.get("tab");
    if (tabKey && document.querySelector('[data-tab-btn="' + tabKey + '"]')) {
      activateTab(tabKey, false);
    }
  });

  /* ---------- 2) ACCORDION CHO INFO-CARD ---------- */
  var infoCardHeads = document.querySelectorAll(".info-card-head");
  infoCardHeads.forEach(function (head) {
    head.addEventListener("click", function () {
      var card = head.closest(".info-card");
      if (!card) return;
      var wasExpanded = card.classList.contains("expanded");

      // Nếu muốn chỉ mở 1 card tại 1 thời điểm trong cùng nhóm, bật đoạn dưới:
      // card.parentElement.querySelectorAll('.info-card.expanded').forEach(function (c) {
      //   if (c !== card) c.classList.remove('expanded');
      // });

      card.classList.toggle("expanded", !wasExpanded);
      head.setAttribute("aria-expanded", String(!wasExpanded));
    });

    head.setAttribute("role", "button");
    head.setAttribute("tabindex", "0");
    head.setAttribute("aria-expanded", "false");
    head.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        head.click();
      }
    });
  });

  /* ---------- 3) PHÓNG TO ẢNH GIẢI THƯỞNG ---------- */
  var lightbox = document.querySelector("[data-lightbox]");
  var lightboxImage = document.querySelector("[data-lightbox-image]");
  var lightboxClose = document.querySelector("[data-lightbox-close]");

  function closeLightbox() {
    if (!lightbox) return;
    lightbox.classList.remove("open");
    lightbox.setAttribute("aria-hidden", "true");
    document.body.classList.remove("lightbox-open");
  }

  document.querySelectorAll("[data-lightbox-src]").forEach(function (button) {
    button.addEventListener("click", function () {
      if (!lightbox || !lightboxImage) return;
      lightboxImage.src = button.getAttribute("data-lightbox-src");
      lightboxImage.alt = button.getAttribute("data-lightbox-alt") || "";
      lightbox.classList.add("open");
      lightbox.setAttribute("aria-hidden", "false");
      document.body.classList.add("lightbox-open");
    });
  });

  if (lightboxClose) lightboxClose.addEventListener("click", closeLightbox);
  if (lightbox) {
    lightbox.addEventListener("click", function (event) {
      if (event.target === lightbox) closeLightbox();
    });
  }
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") closeLightbox();
  });
});
