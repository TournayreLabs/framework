# TournayreLabs Framework

Framework and helpers on top of Symfony.

This package is a refactoring of the historical `atournayre/framework` package.
The original package remains the source of truth while the public surface is
transferred to this repository.

## Requirements

- PHP 8.2.22 or higher
- Composer

## Installation

```bash
composer require tournayrelabs/framework
```

## Development

Install dependencies:

```bash
make vendor
```

Run the default quality checks:

```bash
make qa
```

Useful targets:

```bash
make help
make composer c='validate --strict'
make tests
make phpstan
make fix
```

## Compatibility

During the initial transfer, method signatures from the original package must
be preserved exactly. The implementation may change internally, but public
contracts must remain stable for the consuming project.

