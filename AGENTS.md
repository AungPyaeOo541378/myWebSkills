<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

## Foundational Context

This application is a Laravel application running on PHP 8.4. Always use the APIs that match the installed major version of each package — do not assume a version.

Before relying on a package's API, confirm its installed version:
- PHP packages: run `composer show --direct` to list direct dependencies with versions, or `composer show <vendor/package>` for a single package.
- JS packages: check `package.json` for the installed versions.

## Conventions

- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods.
- Check for existing components to reuse before writing a new one.

## Frontend Bundling

- If a frontend change doesn't show in the UI or you get a "Unable to locate file in Vite manifest" error, run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.

## Documentation Files

- You must only create documentation files if explicitly requested by the user.

=== php rules ===

# PHP

- Always use curly braces for control structures, even for single-line bodies.
- Use PHP 8 constructor property promotion.
- Use explicit return type declarations and type hints for all method parameters.
- Use TitleCase for Enum keys.
- Prefer PHPDoc blocks over inline comments.

=== laravel/core rules ===

# Do Things the Laravel Way

- Use `php artisan make:` commands to create new files. Pass `--no-interaction` to all Artisan commands.
- When generating links to other pages, prefer named routes and the `route()` function.

=== pint/core rules ===

# Laravel Pint Code Formatter

- If you have modified any PHP files, run `vendor/bin/pint --dirty --format agent` before finalizing changes.

</laravel-boost-guidelines>

