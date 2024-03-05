# Laravel SQL Server Enhanced Driver

This package was born out of a need to fix a SQL Server issue that breaks when using Laravel with SQL Server and getting
the correct last insert id.

The code in this package is directly from the changes in a pull request to the original Laravel SQL Server driver. The
pull request was merged but later reverted as it conflicted with the freeTDS driver. This package is a direct copy of
the changes made in the pull request which you can find here - https://github.com/laravel/framework/pull/33430 and the
reverted pull request here - https://github.com/laravel/framework/pull/33496. The original bug report for this can be
found here - https://github.com/laravel/framework/issues/32883.

## Installation

You can install the package via composer:

```bash
composer require verifiedit/laravel-sqlsrv-driver-enhanced
```

## Usage

Once installed, the package will automatically override the default SQL Server driver with the enhanced driver. You do
not need to do anything else as the package will automatically register itself in your Laravel application.

## Kudos

All credit goes to the original author of the pull request, [@rodrigopedra](https://github.com/rodrigopedra). I have
simply taken the changes and put them in an installable package that we can use in our applications.