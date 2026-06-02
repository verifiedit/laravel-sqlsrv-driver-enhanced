# CLAUDE.md

Guidance for Claude Code when working in this repository. This file is self-contained — do not rely on `readme.md` for build commands.

## Project

Enhanced version of Laravel's SQL Server database driver — published as `verifiedit/laravel-sqlsrv-driver-enhanced` (`type: library`) and dropped into Verified Laravel apps that need SQL Server with Verified-specific overrides. Auto-registers `Verifiedit\LaravelSqlServerDriverEnhanced\ServiceProvider`.

## Stack

- **Language:** PHP (no explicit constraint in `composer.json` — bound by `illuminate/database ^12.0`)
- **Package manager:** Composer
- **Laravel compatibility:** Illuminate `^12.0` only
- **Tests:** none in repo
- **Static analysis / style:** none configured

## Commands

This is a library — no app to boot, no scripts defined in `composer.json`:

```shell
composer install
composer update <package>
composer dump-autoload
```

Do **not** invent test or lint commands — none exist.

## Before declaring a task complete

There is no automated test or lint gate. Verify changes by:
1. Pulling the package into a downstream Laravel 12 app (e.g. `capture-api`) via a path repository.
2. Exercising the affected SQL Server query path against the upstream Laravel driver behaviour you are extending.

## Layout

```
src/
  ServiceProvider.php                # Registers the enhanced driver with Laravel
  Database/                          # Driver / grammar / connection overrides
composer.json                        # type: library, autoload Verifiedit\LaravelSqlServerDriverEnhanced\
readme.md
```

## Conventions

- **Commits / PRs:** match the prior style — short descriptive subjects, reference Jira tickets (`PH-1766`) where relevant.
- **PR reviewers:** `verifiedit/dev` (no `CODEOWNERS`).
- **Public API stability.** This package overrides core Laravel database internals — every change must be tested against the consumer apps before tagging.
- **Track upstream Laravel changes.** When bumping the `illuminate/database` constraint, re-verify all overridden classes still match the upstream signatures.
- **Type everything** on public methods.

## Releasing

- Tag with semver (`vX.Y.Z`). Consumers pin to a specific tag; coordinate any breaking change with the apps that use it.

## Things to avoid

- Adding tests / tooling without explicit user request — the repo is intentionally minimal.
- Loosening the `illuminate/database` constraint without verifying override compatibility.
- Committing `vendor/` or generated files.

## Skills

- `/code-review`, `/review`, `/security-review`, `/simplify`, `/init`.
