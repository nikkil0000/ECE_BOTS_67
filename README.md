````markdown
# Smart Planner — Project Overview

This repository contains the **Smart Planner frontend files** for a small learning hub web app created for **Hackathon 2025**.  
The app is a **static site built using plain HTML, CSS, and JavaScript**, along with a lightweight PHP logging endpoint for optional tracking.

---

## Files in this repository

- `homepage.html` — Main landing page. Contains the hero section, grade/exam selection form, AI assistant, features, and footer.  
  The site name displayed in the navbar and footer is **"Smart Planner"**, and the page title is `Smart Planner`.

- `class9.html` — Resources and materials page for **Class 9 Board Exam** with subject-wise cards for Kannada, English, Hindi, Science, Social Science, and Mathematics.

- `class10.html` — Resources and materials page for **Class 10 Board Exam**, including subject links and access to the Kannada Notes & Quiz page.

- `class11.html` — Resources page for **Class 11 Board Exams**, featuring interactive subject cards and study resource links.

- `class12.html` — Resources and materials page for **Class 12 Board Exams**, organized with PDFs, YouTube lessons, and previous-year papers.

- `class12neet.html` — Dedicated **Class 12 NEET preparation page**, featuring downloadable NEET past papers, video lectures, and key topic tips.

- `competitive_ntse.html` — A comprehensive **competitive exam resource page** focused on NTSE. Includes aptitude sections, weightage breakdowns, and topic-wise quizzes.

- `kannada_notes.html` — Kannada notes and quiz page for SSLC students, offering **PDF downloads** and **interactive quizzes** in the Kannada language.

- `studyplan.html` — AI-powered **Study Planner** that generates personalized study schedules, day-wise sessions, and progress tracking.

- `log.php` — Minimal PHP endpoint for basic log handling (optional).  
  ⚠️ Keep this file off public/static hosting unless inputs are sanitized and the server supports PHP.

---

## Quick preview

To preview the site locally, open `homepage.html` in your browser (double-click the file or use **File → Open**).  
For development, you can also use a local server.

### Windows (PowerShell)
```powershell
cd C:\Users\nikhi\Downloads\hack_sjb
# Start Python’s built-in HTTP server on port 8000
python -m http.server 8000

# Then open this link in your browser:
# http://localhost:8000/homepage.html
````

---

## Git / Deployment notes

* GitHub repository: [https://github.com/nikkil0000/ECE_BOTS_67](https://github.com/nikkil0000/ECE_BOTS_67)
* Page title and branding have been updated to **"Edu Planner"** across all files.
* If deploying using **GitHub Pages** or similar static hosts, remove or disable any PHP-based endpoints (`log.php`).
* Directory structure:

  ```
  /EduPlanner/
  ├── homepage.html
  ├── class9.html
  ├── class10.html
  ├── class11.html
  ├── class12.html
  ├── class12neet.html
  ├── competitive_ntse.html
  ├── kannada_notes.html
  ├── studyplan.html
  └── log.php
  ```

---

## Next steps (suggested)

* Add a `.gitignore` file to exclude OS/system and IDE-specific files.
* Extend functionality by adding more pages, e.g., `class11neet.html`, `class12jee.html`, or `class12commerce.html`.
* Optimize for **mobile responsiveness** and **accessibility compliance (WCAG 2.1)**.
* Add lightweight analytics or user feedback options.

---

## License & Author

This project was created for **Hackathon 2025** by **Team SmartLearn**, now renamed to **Edu Planner**.
You may add a `LICENSE` file (e.g., MIT or Apache 2.0) if you plan to publish this under an open-source license.

---

If you’d like a more detailed README (with **screenshots, deployment steps, or feature breakdowns**), let me know — I can extend it for documentation or GitHub Pages publishing.

# ECE_BOTS_67

```
```
