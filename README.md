Paperless Checks
======

Generates PDF of a check

## Getting started

- Git clone this repo <br />`git clone https://github.com/austinginder/checks`
- Copy `config_sample.json` to `config.json`
- Modify `config.json` with bank details, routing number, account number and etc.
- Run PHP server `php -S localhost:8000` then visit [http://localhost:8000](http://localhost:8000)

This generator was originally forked from [https://github.com/aaronpk/checks](https://github.com/aaronpk/checks) which was created for printing purposes. It's been adapted to generate the front and back of a check which can be used on screen for mobile deposits for paperless checks.

![Screenshot](screenshot.webp?raw=true)

## FAQs

**Question:** Can I use this to print checks?<br />
**Answer:** Maybe, I never tried. I personally only use it to generate checks and then remote deposit from my screen.

**Question:** How do signatures work?<br />
**Answer:** Add a `.png` image with either a transparent or white background to this directory. Then modify configurations `signature_front` or `signature_back` with the `.png` filename.

## Changelog

### [1.0] - 2024-03-04
### Added
- Documentation for getting started
- Load configurations from `config.json`
- Back of check with rotated signature

### Changed
- Forked from https://github.com/aaronpk/checks
- PHP 8 compatiblity
- Upgrade FPDF library to v1.86
- Organized font files
