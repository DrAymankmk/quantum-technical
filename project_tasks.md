# Project Development Roadmap: CMS & Frontend Integration

This document outlines the 6-day development plan for the CMS project. The goal is to build a fully functional website where all content (menus, pages, sections, items) is manageable via the backend and displayed dynamically on a Blade-based frontend.

## Schedule Overview

- **Day 1 (Thursday):** Foundation & Basic Management
- **Day 2 (Sunday):** Content Structure (Sections & Items)
- **Day 3 (Monday):** Menus, Media & Backend Refinement
- **Day 4 (Tuesday):** Frontend Template Setup (Blade)
- **Day 5 (Wednesday):** Connecting Data to Frontend
- **Day 6 (Thursday):** SEO, Testing & Launch

---

## Detailed Task List

### Day 1: Thursday - Foundation & Basic Management
**Goal:** Get the system running and allow management of languages and basic pages.

- [x] **System Setup**
    - [x] Install and configure the core framework.
    - [x] Set up the database connection.
    - [x] Set up the administrator login system.
- [x] **Multi-Language Support**
    - [x] Enable support for multiple languages (e.g., English, Arabic).
    - [x] **Languages Manager:** Create a screen to add/edit/hide supported languages.
- [x] **Page Management**
    - [x] **Pages Module:** Create a screen to manage main pages (Home, About, Contact).
    - [x] Ensure pages have titles and slugs (URL friendly names) for each language.

### Day 2: Sunday - Content Structure (Sections & Items)
**Goal:** Build the flexible content blocks that will make up the pages.

- [x] **Section Management**
    - [x] **Sections Module:** Create a screen to manage sections within pages (e.g., "Hero Slider", "Our Services", "Testimonials").
    - [x] Allow sections to be active/inactive.
    - [x] Add ability to order/sort sections.
- [x] **Item Management**
    - [x] **Items Module:** Create a screen to manage individual items within a section (e.g., a single slide, a specific service card, one testimonial).
    - [x] Add fields for Title, Subtitle, and Description for each item.
    - [x] Add status control (Show/Hide) for items.

### Day 3: Monday - Menus, Media & Backend Refinement
**Goal:** Manage website navigation and handle image uploads.

- [x] **Menu & Link Management**
    - [x] **Links Module:** Create a screen to manage Header and Footer menu links.
    - [x] Allow setting the link label and the destination URL.
    - [x] Add option to open links in a new tab.
- [ ] **Image & Media Handling**
    - [ ] Add "Upload Image" capability to the **Items** form.
    - [ ] Add "Upload Background" capability to the **Sections** form (if needed).
    - [ ] Ensure images are saved correctly and can be viewed in the backend.
- [ ] **Backend Experience Improvements**
    - [ ] Organize the Sidebar menu for easier navigation.
    - [ ] Ensure "Rich Text Editors" are available for long descriptions.

### Day 4: Tuesday - Frontend Template Setup (Blade)
**Goal:** Convert the HTML design into the system's theme engine.

- [ ] **Template Preparation**
    - [ ] Choose the HTML template to be used.
    - [ ] Copy all design assets (CSS, JS, Images, Fonts) to the public folder.
- [ ] **Layout Creation**
    - [ ] **Master Layout:** Create the main shell file (`master.blade.php`) that includes the `<head>`, styles, and scripts.
    - [ ] **Header Partial:** Separate the navigation bar into its own file.
    - [ ] **Footer Partial:** Separate the footer area into its own file.
- [ ] **Home Page View**
    - [ ] Create a `home.blade.php` file that extends the Master Layout.
    - [ ] Paste the static HTML of the homepage into this view to verify it loads correctly.

### Day 5: Wednesday - Connecting Data to Frontend
**Goal:** Replace static HTML with real data from the CMS.

- [ ] **Global Data (Header & Footer)**
    - [ ] **Language Switcher:** Make the language icons/dropdown switch the site's language.
    - [ ] **Dynamic Menus:** Replace static menu links with the "Links" managed in the backend.
- [ ] **Home Page Dynamic Content**
    - [ ] **Fetch Data:** Retrieve the "Home" page and all its active Sections and Items from the database.
    - [ ] **Loop Sections:** Create a loop in the view to go through each Section.
    - [ ] **Dynamic Components:**
        - Create a Blade file for each section type (e.g., `hero.blade.php`, `services.blade.php`).
        - Automatically load the correct design based on the Section being displayed.
    - [ ] **Bind Data:**
        - Replace static titles with `{{ $section->title }}`.
        - Replace static images with real uploaded images.
        - Replace static descriptions with real content.

### Day 6: Thursday - SEO, Testing & Launch
**Goal:** Ensure the site is visible to search engines and works perfectly.

- [ ] **SEO Optimization**
    - [ ] **Meta Tags:** Add fields for "Meta Title" and "Meta Description" to the Pages management.
    - [ ] **Dynamic Output:** Ensure these tags appear correctly in the browser's `<head>` section.
- [ ] **Final Testing**
    - [ ] **Link Check:** Click every menu item to ensure it goes to the right place.
    - [ ] **Mobile Check:** Open the site on a phone to ensure the design is responsive.
    - [ ] **Content Check:** Verify that changing text in the Backend updates the Frontend immediately.
- [ ] **Deployment Prep**
    - [ ] Clean up any test data.
    - [ ] Optimize the application for speed (cache configurations).
