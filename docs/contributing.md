# Psr2 Code Generator Contributing Guide

## Workflow

1. Fork, clone and apply your patches.
2. Run the test suite `composer test` and fix all red tests.
3. Run static analysis tool (by now, we use [Psalm](https://psalm.dev/)) `composer analytics` and fix all errors and issues.
4. Fix the coding standard `composer cs-fix`.

!!! note "Tip"
    We provide a __check__ command to run all the tests and analytics, required for a pull request.
    Run `composer check`

## Running the Test Suite

While developing, the test part is very important: if you apply a patch to the existing code, the test suite must run without
errors or failures and if you add a new functionality, no one will consider it without tests.

Our test tool is [PhpUnit](https://phpunit.de/) and we provide a script to launch it:

```bash
composer test
```
Since our command runs phpunit binary under the hood, you can pass all phpunit options to it via the `--` operator, i.e.:
```bash
composer test -- --stop-on-failure
```
You can also use phpunit directly:
```
vendor/bin/phpunit
```

## Code Coverage

We provides two commands to generate a code coverage report in _html_ or _xml_ format.

`composer coverage:html` command generates a code coverage report in _html_ format, into the directory `coverage/` while
`composer coverage:clover` generates the report in _xml_ format, into `clover.xml` file.

## Static Analysis Tool

To prevent as many bugs as possible, we use a static analysis tool called [Psalm](https://psalm.dev/).
To launch it, run the following command from the root directory of psr2-code-generator project:

```bash
composer analytics
```

After its analysis, Psalm outputs errors and issues with its suggestions on how to fix them. Errors are more important
and generally more dangerous than issues, anyway you should fix both.

## Coding Standard

We ship our script to easily fix coding standard errors, via [php-cs-fixer](https://cs.symfony.com/) tool.
To fix coding standard errors just run:

```bash
composer cs-fix
```
and to show the errors without fixing them, run:
```bash
composer cs
```
If you want to learn more about our code style, see [https://github.com/susina/coding-standard](https://github.com/susina/coding-standard).

## Documentation Contributing

psr2-code-generator documentation resides into the directory `docs/`. It's written in [markdown](https://daringfireball.net/projects/markdown/)
and it's generated by [MkDocs](https://www.mkdocs.org).

### Install the Tools

If you want to contribute to the documentation, you should install the following tools, to generate it locally:

1. [Install MkDocs](https://www.mkdocs.org/#installation)
2. Install [Material theme](https://squidfunk.github.io/mkdocs-material/) by running: `pip install mkdocs-material`
   
### Markdown flavour

MkDocs uses [Python-Markdown](https://python-markdown.github.io/) with some extensions active by default. It supports the
standard markdown, markdown-extra and some of the Github-flavoured markdown features. You can find detailed information on
[https://www.mkdocs.org/user-guide/writing-your-docs/#writing-with-markdown](https://www.mkdocs.org/user-guide/writing-your-docs/#writing-with-markdown).

### Admonition

[admonition](https://python-markdown.github.io/extensions/admonition/) extension helps to write beautiful notes or
warnings or other (see the official documentation) with a syntax like the following:

```bash
!!! Danger
    Very dangerous operation!
```

which translates into the following:

!!! Danger
    Very dangerous operation!