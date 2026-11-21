# a-mamal.com - Personal Website

[<img alt="Deployed with FTP Deploy Action" src="https://img.shields.io/badge/Deployed With-FTP DEPLOY ACTION-%3CCOLOR%3E?style=for-the-badge&color=0077b6">](https://github.com/SamKirkland/FTP-Deploy-Action)

[![good first issue](https://img.shields.io/badge/good%20first%20issue-available-brightgreen)](https://github.com/a-mamal/a-mamal-com/labels/good%20first%20issue)

## Table of Contents

- [Learning in Public](#learning-in-public)
    - [For Fellow Learners](#for-fellow-learners)
- [Current Status](#current-status)
- [Tech Stack](#tech-stack)
- [Roadmap / Features To Come](#roadmap--features-to-come)
- [Goals](#goals)
- [Database](#database)
    - [users](#table-users)
    - [profiles](#table-profiles)
    - [profile_links](#table-profile_links)
    - [projects](#table-projects)
    - [organizations](#table-organizations)
    - [degrees](#table-degrees)
    - [certificates](#table-certificates)
    - [spoken_languages](#table-spoken_languages)
    - [experiences](#table-experiences)
    - [Seeders](#seeders)
- [Setup](#setup)
- [Contributing](#contributing)
- [Deployment](#deployment)
- [Tooling & Acknowledgments](#tooling--acknowledgments)
- [About This Project](#about-this-project)
- [License](#license)
- [Notes](#notes)


## Overview

A work-in-progress personal website built with Laravel and Blade, designed to showcase my projects, skills, and ideas. Features are evolving as I continue learning and experimenting.

---

## Learning in Public 

💬 I'm building this site as I learn, and your feedback is gold! If you have suggestions, ideas, or improvements — whether about code, design, accessibility or usability — don’t hesitate to share them via [GitHub Issues](https://github.com/a-mamal/a-mamal-com/issues).

### For Fellow Learners 
🤝 I'll make sure to be adding **good first issues** for others beginning their journey.
We all need a safe place to start with something, and I would love for this personal project to make room for that.
Exploration, suggestions, and discussion are always welcome.
Feel free to take your time with these issues. 
I hope they help build confidence to tackle something bigger next!

---

## Current Status

- 🏠 Homepage 
   - Basic layout ✅ 
   - In progress (e.g., add featured projects)
   - Related issues: [page: home](https://github.com/a-mamal/a-mamal-com/issues?q=is%3Aopen%20is%3Aissue%20label%3A%22page%3A%20home%22)

- 🖼️ Project page 
   - Project cards ✅ 
   - In progress 
   - Related issues: [page: projects](https://github.com/a-mamal/a-mamal-com/issues?q=is%3Aopen%20is%3Aissue%20label%3A%22page%3A%20projects%22)

- 📖 About page
   - Structured sections for personal background and project context  
   - Core content implemented ✅
   - In progress (content & UX improvements)
   - Related issues: [page: about](https://github.com/a-mamal/a-mamal-com/issues?q=is%3Aopen%20is%3Aissue%20label%3A%22page%3A%20about%22)
   
- ✉️ Contact page
   - Functional contact form ✅ 
   - Platform links (e.g., GitHub, LinkedIn) displayed ✅
   - In progress (validation, UI/UX improvements, CAPTCHA, etc.)
   - Related issues: [page: contact](https://github.com/a-mamal/a-mamal-com/issues?q=is%3Aopen%20is%3Aissue%20label%3A%22page%3A%20contact%22)

- 📊 **Analytics**
    - Matomo tracking ✅
    - Real-time tracking

[↑ Back to Table of Contents](#table-of-contents)

---

## Tech Stack
  
- 🛠️ Laravel (Blade, Eloquent)
- 🌐 HTML, CSS, JavaScript
- 🗄️ MariaDB

---

## Frontend Architecture

This project uses Vite for frontend asset bundling.

### Entry Point
- JavaScript: `resources/js/app.js`

### UI Layer
- Alpine.js (reactivity system)

### Custom Modules
- theme-switcher (day/night mode + persistence)
- sidebar (navigation behavior)

### Legacy
- `/public/js` has been fully removed after migration to Vite

---

## Roadmap / Features To Come

- 📱 Responsive design for mobile and desktop
- 🖼️ Dynamic project listings and portfolio section
- ✉️ Contact form with backend functionality
- 📝 Blog section for sharing tutorials, notes, and thoughts
- 🌙 Dark/light mode toggle
- 🎨 Fun animations and interactive elements

---

## Goals

- 📚 Learn while building
- 🌱 Evolve the site alongside my skills
- 🎯 Showcase a personal brand that’s both professional and playful, reflecting my belief that learning and growing is more effective when it’s fun!
- 🤝 Make room for fellow learners by offering beginner-friendly, learning-oriented issues

[↑ Back to Table of Contents](#table-of-contents)

---

## Database
**Type:** MariaDB

This section provides an overview of the database structure, tables, and relationships.

Tables in this project:

- [`users`](#table-users)
- [`profiles`](#table-profiles)
- [`profile_links`](#table-profile_links)
- [`projects`](#table-projects)
- [`organizations`](#table-organizations)
- [`degrees`](#table-degrees)
- [`certificates`](#table-certificates)
- [`spoken_languages`](#table-spoken_languages)

Detailed descriptions follow below. See [Seeders](#seeders) for database setup and sample data.

### Table: `users`

| Column             | Type          | Nullable | Notes                                   |
|--------------------|---------------|:--------:|-----------------------------------------|
| `id`               | bigint        | No       | Primary Key, auto-increment             |
| `name`             | varchar(255)  | No       | User’s full name                        |
| `email`            | varchar(255)  | No       | Unique, used for authentication         |
| `email_verified_at`| timestamp     | Yes      | When email was verified                 |
| `password`         | varchar(255)  | No       | Hashed password                         |
| `remember_token`   | varchar(100)  | Yes      | Used for “remember me” functionality    |
| `created_at`       | timestamp     | Yes      | Laravel timestamp                       |
| `updated_at`       | timestamp     | Yes      | Laravel timestamp                       |

**Relationships:**  
- Users can have many profiles

**Seeder / Factory:**

- [UserSeeder](database/seeders/UserSeeder.php)
- [UserFactory](database/factories/UserFactory.php)

[↑ Back to Table of Contents](#table-of-contents)

### Table: `profiles`

| Column        | Type         | Nullable | Notes                                     |
|---------------|--------------|:--------:|--------------------------------------------|
| `id`          | bigint       | No       | Primary key                                |
| `user_id`     | bigint       | No       | Foreign key → users.id                     |
| `display_name`| varchar(255) | No       | Public-facing name                         |
| `bio`         | text         | Yes      | Short profile description                  |
| `created_at`  | timestamp    | Yes      | Laravel timestamp                          |
| `updated_at`  | timestamp    | Yes      | Laravel timestamp                          |

**Relationships:**  
- A profile belongs to one user  
- A profile can have many:
  - certificates  
  - degrees  
  - spoken languages  
  - profile links
  - projects

**Seeder / Factory:**

- [ProfileSeeder](database/seeders/ProfileSeeder.php)
- [ProfileFactory](database/factories/ProfileFactory.php)

[↑ Back to Table of Contents](#table-of-contents)

### Table: `profile_links`

| Column      | Type         | Nullable | Notes                                                      |
|-------------|--------------|:--------:|------------------------------------------------------------|
| `id`        | bigint       | No       | Primary key                                                |
| `profile_id`| bigint       | No       | Foreign key → `profiles.id`, cascade on delete            |
| `platform`  | enum         | No       | Platform type (`codepen`, `freecodecamp`, `github`, `hackthebox`, `leetcode`, `linkedin`, `website`, `other`). Defaults to `other`. |
| `url`       | text         | No       | URL of the profile link                                    |
| `created_at`| timestamp    | Yes      | Laravel timestamp                                          |
| `updated_at`| timestamp    | Yes      | Laravel timestamp                                          |

**Constraints:**  
- Unique constraint: one link per platform per profile (`profile_id` + `platform`)  

**Relationships:**  
- A profile link belongs to one profile  

**Seeder / Factory:**

- [ProfileLinkSeeder](database/seeders/ProfileLinkSeeder.php)
- [ProfileLinkFactory](database/factories/ProfileLinkFactory.php)

[↑ Back to Table of Contents](#table-of-contents)


### Table: `projects`

| Column         | Type          | Nullable | Notes                                                    |
|----------------|---------------|:--------:|----------------------------------------------------------|
| `id`           | bigint        | No       | Primary key                                              |
| `profile_id`   | bigint        |No        | Foreign key → profiles.id, owner of the project          |
| `title`        | varchar(255)  | No       | Name or title of the project                             |
| `type`         | varchar(255)  | Yes      | Optional type/category of the project                    |
| `slug`         | varchar(255)  | No       | Unique slug for the project, used in URLs                |
| `description`  | text          | No       | Detailed description of the project                      |
| `highlights`   | longtext      | Yes      | Key features, technologies, or notes stored as JSON      |
| `project_url`  | varchar(255)  | Yes      | Optional live URL for the project                        |
| `github_url`   | varchar(255)  | Yes      | Optional GitHub repository URL                           |
| `status`       | enum          | No       | `draft` or `published`, defaults to `draft`              |
| `created_at`   | timestamp     | Yes      | Laravel timestamp                                        |
| `updated_at`   | timestamp     | Yes      | Laravel timestamp                                        |

**Constraints / Indexes:**
- `profile_id` → foreign key referencing `profiles.id`
- `slug` is unique

**Relationships:**  
- A project belongs to one profile  

**Seeder / Factory:**

- [ProjectSeeder](database/seeders/ProjectSeeder.php)
- [ProjectFactory](database/factories/ProjectFactory.php)

> Note: Each project may have highlights and URLs for demo or GitHub, which are useful for showcasing a portfolio. The `status` field allows for draft projects or published projects for display. Highlights are stored as JSON (longtext) for flexibility.

[↑ Back to Table of Contents](#table-of-contents)


### Table: `organizations`

| Column         | Type         | Nullable | Notes                                  |
|----------------|--------------|:--------:|----------------------------------------|
| `id`           | bigint       | No       | Primary key                            |
| `name`         | varchar(255) | No       | Name of the issuing organization       |
| `type`         | varchar(255) | No       | Type of organization, e.g., company, platform|
| `website`      | varchar(255) | Yes      | Optional website URL                   |
| `contact_email`| varchar(255) | Yes      | Optional contact email                 |
| `created_at`   | timestamp    | Yes      | Laravel timestamp                      |
| `updated_at`   | timestamp    | Yes      | Laravel timestamp                      |

**Relationships:**  
- An organizations can have many certificates.  
- An organizations can have many degrees.  

**Seeder / Factory:**

- [OrganizationSeeder](database/seeders/OrganizationSeeder.php)
- [OrganizationFactory](database/factories/OrganizationFactory.php)

**History/Decisions**
This table was initially named `issuers` and was  used for `certificates` and `degrees`. While the name made sense initially, going forward and seeking for the need to represent employers for the `experiences` table it was not suitable anymore.

Creating a separate table for companies would have caused redundancy.
Eg.: Since an organization can both issue certifications and employ people they would need to be in both tables.

To simplify and future-proof the schema, the table was renamed to `organizations` to represent `schools`, `companies`, `certifiers`, and other entities in a single unified table.

> **Note:** This decision was made as part of the `epic` [feat(experiences): implement experiences linked to organizations #47](https://github.com/a-mamal/a-mamal-com/issues/47), with the actual change applied in the first sub-issue [#48](https://github.com/a-mamal/a-mamal-com/issues/48).

[↑ Back to Table of Contents](#table-of-contents)

### Table: `degrees`

| Column            | Type         | Nullable | Notes                                     |
|-------------------|--------------|:--------:|-------------------------------------------|
| `id`              | bigint       | No       | Primary key                               |
| `profile_id`      | bigint       | No       | Foreign key → profiles.id                 |
| `organization_id` | bigint       | No       | Foreign key → organizations.id            |
| `title`           | varchar(255) | No       | Name of the degree                        |
| `level`           | varchar(255) | No       | Degree level, e.g., Bachelor, Master      |
| `field`           | varchar(255) | Yes      | Specialization or field of study          |
| `start_date`      | date         | Yes      | When the degree started                   |
| `end_date`        | date         | Yes      | When the degree ended                     |
| `grade`           | varchar(255) | Yes      | Optional grade or GPA                     |
| `image`           | varchar(255) | Yes      | Optional image of the degree certificate  |
| `created_at`      | timestamp    | Yes      | Laravel timestamp                         |
| `updated_at`      | timestamp    | Yes      | Laravel timestamp                         |

**Relationships:**  
- A degree belongs to one profile  
- A degree belongs to one organization  

**Seeder / Factory:**

- [DegreeSeeder](database/seeders/DegreeSeeder.php)
- [DegreeFactory](database/factories/DegreeFactory.php)

[↑ Back to Table of Contents](#table-of-contents)

### Table: `certificates`

| Column               | Type         | Nullable | Notes                                          |
|----------------------|--------------|:--------:|------------------------------------------------|
| `id`                 | bigint       | No       | Primary key                                    |
| `profile_id`         | bigint       | No       | Foreign key → profiles.id                      |
| `organization_id`    | bigint       | No       | Foreign key → organizations.id                 |
| `name`               | varchar(255) | No       | Name of the certificate                        |
| `description`        | text         | Yes      | Optional description of the certificate        |
| `date_awarded`       | date         | No       | When the certificate was issued                |
| `expiration_date`    | date         | Yes      | Expiry date if applicable                      |
| `credential_link`    | varchar(255) | Yes      | Optional URL to verify the certificate         |
| `image`              | varchar(255) | Yes      | Optional certificate image                     |
| `created_at`         | timestamp    | Yes      | Laravel timestamp                              |
| `updated_at`         | timestamp    | Yes      | Laravel timestamp                              |
| `spoken_language_id` | bigint       | Yes      | Optional foreign key → spoken_languages.id         |

**Relationships:**  
- A certificate belongs to one profile  
- A certificate belongs to one organization
- A certificate optionally belongs to one spoken language (links the certificate to a profile's spoken language)

**Seeder / Factory:**

- [CertificateSeeder](database/seeders/CertificateSeeder.php)
- [CertificateFactory](database/factories/CertificateFactory.php)

[↑ Back to Table of Contents](#table-of-contents)

### Table: `spoken_languages`

| Column        | Type         | Nullable | Notes                                         |
|---------------|--------------|:--------:|-----------------------------------------------|
| `id`          | bigint       | No       | Primary key                                   |
| `profile_id`  | bigint       | No       | Foreign key → profiles.id                    |
| `name`        | varchar(255) | No       | Language name (e.g. English, Greek)           |
| `proficiency` | varchar(255) | No       | e.g. Native, Fluent, C2, B2                   |
| `is_native`   | boolean      | No       | Whether this is the user’s native language    |
| `created_at`  | timestamp    | Yes      | Laravel timestamp                             |
| `updated_at`  | timestamp    | Yes      | Laravel timestamp                             |

**Relationships:**  
- A spoken language belongs to one profile  
- A spoken language can have many certificates  

**Seeder / Factory:**

- [SpokenLanguageSeeder](database/seeders/SpokenLanguageSeeder.php)
- [SpokenLanguageFactory](database/factories/SpokenLanguageFactory.php)

[↑ Back to Table of Contents](#table-of-contents)


### Table: `experiences`

| Column             | Type                 | Nullable | Notes                                                     |
|--------------------|----------------------|:--------:|-----------------------------------------------------------|
| `id`               | bigint               | No       | Primary key                                               |
| `profile_id`       | bigint               | No       | Foreign key → profiles.id, cascade on delete              |
| `organization_id`  | bigint               | No       | Foreign key → organizations.id, cascade on delete         |
| `role`             | varchar(255)         | No       | Role or position held                                     |
| `start_date`       | date                 | Yes      | Optional start date                                       |
| `end_date`         | date                 | Yes      | Optional end date                                         |
| `description`      | text                 | Yes      | Optional description of the experience                    |
| `highlights`       | json                 | Yes      | Optional JSON array of key achievements / notes           |
| `is_current`       | boolean (tinyint(1)) | No       | Whether the experience is ongoing (defaults to `false`)   |
| `created_at`       | timestamp            | Yes      | Laravel timestamp                                         |
| `updated_at`       | timestamp            | Yes      | Laravel timestamp                                         |

**Relationships:**  
- An experience belongs to one profile  
- An experience belongs to one organization  

**Constraints:**  
- `is_current = true` implies `end_date IS NULL` (enforced at DB level with a CHECK constraint)  

**Seeder / Factory:**

An experience seeder and factory are planned.

**History / Decisions:**  
This table was added to track user experiences such as jobs, internships, or volunteer positions.  
- The DB-level `CHECK` constraint ensures consistency between `is_current` and `end_date`.  
- `start_date` and `end_date` are nullable because users might not remember exact dates  
- You might argue that `is_current` could be redundant and could be derived from the dates but since people sometimes don’t remember exact dates, having a missing `end_date` doesn’t necessarily mean the experience is current.

> **Note:** Part of the epic [feat(experiences): implement experiences linked to organizations #47](https://github.com/a-mamal/a-mamal-com/issues/47), with the actual migration in sub-issue [#49](https://github.com/a-mamal/a-mamal-com/issues/49).

[↑ Back to Table of Contents](#table-of-contents)

### Seeders

[DatabaseSeeder](database/seeders/DatabaseSeeder.php) selects which seeders to run based on `APP_ENV`.

- **Local (`APP_ENV=local`)** runs the seeders below in the listed order. It loads the bundled data and generates demo records. `UserSeeder` creates demo users, and each demo profile gets its own additional demo user through `ProfileFactory`.
- **Production (`APP_ENV=production`)** delegates to [ProductionDatabaseSeeder](database/seeders/ProductionDatabaseSeeder.php). The shared seeders skip local demo generation. The profile, certificate, degree, and project seeders look for data under the gitignored `database/seeders/production/data/` directory. The production run also calls `ProductionSpokenLanguageSeeder`, whose source is outside the public checkout.
- **Other environments** have no seeding branch in `DatabaseSeeder`.

[UserSeeder](database/seeders/UserSeeder.php) creates or updates the main user in both environments, using `ADMIN_EMAIL` to match the account and `ADMIN_NAME` and `ADMIN_PASSWORD` to set its name and password. Set these values in `.env` using [`.env.example`](.env.example) as a reference. Local demo users are generated by [UserFactory](database/factories/UserFactory.php).

| Seeder | Data it adds or updates | Related factory |
| --- | --- | --- |
| [UserSeeder](database/seeders/UserSeeder.php) | Main user and local demo users | [UserFactory](database/factories/UserFactory.php) |
| [ProfileSeeder](database/seeders/ProfileSeeder.php) | Main profile from JSON when present, plus local demo profiles | [ProfileFactory](database/factories/ProfileFactory.php) |
| [ProfileLinkSeeder](database/seeders/ProfileLinkSeeder.php) | Links from bundled JSON for the first profile in both environments, plus random links for other profiles in local runs | [ProfileLinkFactory](database/factories/ProfileLinkFactory.php) |
| [OrganizationSeeder](database/seeders/OrganizationSeeder.php) | Organizations from bundled JSON | [OrganizationFactory](database/factories/OrganizationFactory.php) |
| [CertificateSeeder](database/seeders/CertificateSeeder.php) | Certificates from JSON when present, plus local demo certificates | [CertificateFactory](database/factories/CertificateFactory.php) |
| [DegreeSeeder](database/seeders/DegreeSeeder.php) | Degrees from JSON when present, plus local demo degrees | [DegreeFactory](database/factories/DegreeFactory.php) |
| [SpokenLanguageSeeder](database/seeders/SpokenLanguageSeeder.php) | Default languages and local demo languages | [SpokenLanguageFactory](database/factories/SpokenLanguageFactory.php) |
| [ProjectSeeder](database/seeders/ProjectSeeder.php) | Projects from JSON when present, plus local demo projects | [ProjectFactory](database/factories/ProjectFactory.php) |

`OrganizationSeeder` uses JSON directly. `OrganizationFactory` has no default attributes. Supply explicit `name` and `type` values when creating an organization with it.

For first-time setup, create an empty, dedicated local MariaDB database. Set `APP_ENV=local`, point the `DB_*` settings to that database, and set the admin variables in `.env`. `ProfileSeeder` uses the first user for the main profile, and `SpokenLanguageSeeder` assumes profile ID 1 exists for the default languages. Apply migrations and seed the database with the following command.

```bash
php artisan migrate --seed
```

> **Warning:** Repeat seeding can update existing records, including the admin password, and can fail partway through. For example, a random profile link can duplicate a platform already used by that profile, violating the unique constraint. `php artisan migrate:fresh` drops all tables on the selected connection. Use it only when you intend to reset a disposable database.

[↑ Back to Table of Contents](#table-of-contents)

> **Note:**  
> The database schema supports multiple profiles per user.  
> The application is not in that state. Remember...it's a skeleton!  
> Support for multiple profiles will be added in the future.

---

## Future Improvements

| Area                    | Planned Enhancements                                                               |
|-------------------------|------------------------------------------------------------------------------------|
| User Profiles           | Support multiple profiles per user; currently only one profile per user            |
| Projects & Portfolio    | Dynamic project listings, filtering, and categorization                            |
| Certificates            | Enhanced management, filtering by organization, and linking to profiles            |
| Blog Section            | Optional blog for tutorials, learning notes, and reflections (under consideration) |
| Accessibility           | Improvements for keyboard navigation, screen readers, and ARIA attributes          |
| Responsive Design       | Refined layouts for mobile, tablet, and desktop screens                            |
| Dark/Light Mode         | Smooth toggle between themes with persistence                                      |
| Interactive Elements    | Animations and UI enhancements to make the site engaging                           |

[↑ Back to Table of Contents](#table-of-contents)

---

## Setup

This project uses Laravel with a simple local development setup, using **Laravel Herd** for local PHP and environment management, and **Laravel Breeze** for basic authentication scaffolding.
The database used is **MariaDB**.

### Requirements
- PHP >=8.2
- Composer
- Node.js / npm
- MariaDB

> The project currently uses Laravel 12.x

### Local Development

1. **Fork the repository**
   
   Go to the repo page and click Fork.
   This creates a copy under your account.
      
2. **Clone your fork**:
   
   ```bash
   git clone https://github.com/<your-username>/a-mamal-com.git
   cd a-mamal-com
   ```
   
3. **Install dependencies:**
   
   ```bash
   composer install
   npm install
   npm run dev
   ```

4. **Copy the example environment file and generate an app key:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   > Notes:
   > - The .env file is intentionally excluded from version control. 
   > - The provided `.env.example` makes it easier to configure your local environment and tweak settings without affecting the repository.
   > - The generated key is updated automatically in `.env`.
   >     If it doesn’t:
   >     - Copy the key manually from the console output:
   >       ```bash
   >       Application key [base64:xxxxxxxxxxxxxxxxxxxxxxxxxx] set successfully.
   >       ```
   >     - Then paste it into `.env` like:
   >       ```env
   >       APP_KEY = base64:xxxxxxxxxxxxxxxxxxxxxxxxxx
   >       ```

5. **Configure `.env`, eg.:**
   ```env
   DB_CONNECTION = mysql
   DB_HOST       = 127.0.0.1
   DB_PORT       = 3306
   DB_DATABASE   = personal_website
   DB_USERNAME   = your_username
   DB_PASSWORD   = your_password
   ```

6. **Run migrations and seed initial data** by following the [local setup instructions in Seeders](#seeders).

7. **Start the development server:**

- If using Laravel Herd:
    - Open the project in Herd.
    - Visit the Herd-provided local URL `http://your-project.test`.
- Standard:
    - Run
      ```bash
      php artisan serve
      ```
    - Visit http://localhost:8000 to view the site.

#### Email Setup (Contact Form)

The contact form uses email functionality. For local testing, Mailtrap is used.  

Update your `.env` file with your mail settings:

```env
MAIL_MAILER=smtp
MAIL_SCHEME=tls
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
# Where contact form emails will go
MAIL_TO_ADDRESS="hello@example.com"
```
💡 Replace these values with your own mail server credentials.

#### Matomo analytics Setup (Production)

For the use of Matomo, environment variables are used in production.
The .env.example has these variables empty while MATOMO_ENABLED is set to false.
To use it for production, update the following values in your production .env file.

```env
MATOMO_ENABLED=true
MATOMO_URL=https://your-matomo-url
MATOMO_SITE_ID=your-matomo-site-id or 1 
```

[↑ Back to Table of Contents](#table-of-contents)

---

## Contributing

I welcome contributions from anyone looking to learn and experiment!

- Pick tasks from the [Project Board](https://github.com/users/a-mamal/projects/4)
- Leave suggestions, report bugs, or share ideas via [GitHub Issues](https://github.com/a-mamal/a-mamal-com/issues).
- Beginner-friendly issues are labeled **good first issue**.
- Don’t worry about messing things up. We’re all learning together!

### 1. Fork & Branching

1. Fork the repository.
2. Clone your fork.
3. Create a new branch for your changes. 
Example:
```bash
git checkout -b feature/your-feature-name
```
Avoid committing directly to `main`.

### 2. Commit Messages
Use descriptive commit messages. 
Example format:
```
type(scope): short description
```

### 3. Pull Requests
When your feature or fix is ready: 
- Push your branch to your fork
- Open a pull request to `main` on the original repo.
- It's always helpful to include a description of what you’ve changed and why.

### 4. Code Style / Guidelines
- Try to follow the existing coding style.
- Keep things consistent with the rest of the project.
- Don’t worry if it’s not perfect. Feedback is part of the process!

[↑ Back to Table of Contents](#table-of-contents)

---

## Deployment

- Live at: https://a-mamal.com/
- Hosting: Hostinger.
- Automation: Deployment handled via GitHub Actions.
   - Laravel application files are deployed using FTP Deploy Action.
   - The `vendor` directory is excluded from FTP deployment.
   - Composer dependencies are installed directly on the Hostinger server using Composer (`composer2`).
   - Laravel caches are optimized after deployment.
   - Hostinger's `public_html` directory is configured via SSH as a symlink to Laravel's `public/` directory.
- Database: Credentials managed via .env and .env.production

---

## Tooling & Acknowledgments

### 🚀 Deployment
- [GitHub Actions](https://github.com/features/actions)
- [FTP-Deploy-Action](https://github.com/SamKirkland/FTP-Deploy-Action)
- [appleboy/ssh-action](https://github.com/appleboy/ssh-action)

### 🛠️ Development  
- [Laravel Herd](https://herd.laravel.com/) (local PHP + MariaDB)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) (auth scaffolding)
- [Mailtrap](https://mailtrap.io/)
- [DB Code](https://dbcode.io/) (VS Code DB extension - local MariaDB)
- **Composer** + **npm** (dependencies)

### 📊 Analytics
- **Matomo** (privacy-first, self-hosted)

[↑ Back to Table of Contents](#table-of-contents)

---

## About This Project

> ⚠️ Note: This is a personal project managed by a single developer.  
> I’m learning, building features, and updating documentation all at the same time.  
> Progress may be gradual, but I appreciate any feedback, suggestions, or contributions!  
> Thank you for your patience and support 🙏.

---

## License
📜 Feel free to look around and get inspired. 
Tweak it, play with it, and make it your own!  
All code is my own work unless otherwise stated.  
This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).

> Note: Since this is a personal project, some information might be… well, **personal** 😄.  
There's nothing to hide, but you might not want it for your own website as-is.
I'm almost done generalizing the repo (for example different seeded data while mirroring production) as part of the cleanup milestone, but I don't promise you won't stumble upon my full name or other personal references in the codebase. 
Use it as inspiration, don’t copy it blindly for your own site 😉

---

## Notes

> ⚠️ This site is a work-in-progress. Features and content may change as I continue building it.

[↑ Back to Table of Contents](#table-of-contents)