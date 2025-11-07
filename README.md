# Edu Planner — Project Overview

This repository contains the Edu Planner frontend files for a small learning hub web app created for Hackathon 2025. The app is a static site built with plain HTML/CSS/JS and a tiny PHP logging endpoint.

## Files in this repository

- `homepage.html` — Main landing page. Contains the hero section, grade/exam selection form, features, and footer. The site name shown in the navbar and footer is "Edu Planner" and the page title is `Edu Planner`.
- `class9.html` — Resources and materials page for Class 9 (Board exam layout).
- `class10.html` — Resources and materials page for Class 10 (Board exam layout).
- `class11.html` — Resources and materials page for Class 11 (general board resources).
- `class12.html` — Resources and materials page for Class 12 (board resources).
- `class12neet.html` — Class 12 NEET-specific resources page.
- `competitive_ntse.html` — A sample competitive exam resource page (NTSE example).
- `kannada_notes_quiz.html` — Kannada notes and quiz page (local language resources and quiz UI).
- `log.php` — Minimal PHP endpoint used by the site for simple logging (if used). Keep this off public servers unless you harden and validate inputs.

## Quick preview

To preview the site locally, open `homepage.html` in your browser (double-click the file or use your browser's File → Open). For development you can also use a local server:

Windows (PowerShell):
```powershell
cd C:\Users\nikhi\Downloads\hack_sjb
# Python 3 built-in server on port 8000
python -m http.server 8000

# Then open http://localhost:8000/homepage.html in your browser
```

## Git / Deployment notes

- The repository is on GitHub at: https://github.com/nikkil0000/ECE_BOTS_67
- I updated the page title and site name to "Edu Planner" across the site.
- If you host this repository as a static site (e.g., GitHub Pages), make sure any PHP endpoints (`log.php`) are removed or hosted on a server that supports PHP.

## Next steps (suggested)

- Add a `.gitignore` to exclude system files and credentials.
- Add more exam pages (e.g., `class11neet.html`, `class12jee.html`) if required.
- Improve accessibility and mobile testing.

## License & Author

This project was prepared for Hackathon 2025 by Team SmartLearn (now renamed to Edu Planner). Place a license file here if you want to publish under an open-source license.

---
If anything should be clarified or you want a more detailed README (examples, screenshots, deployment steps), tell me which details to add and I'll update it.
# ECE_BOTS_67