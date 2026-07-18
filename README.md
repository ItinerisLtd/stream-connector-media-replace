# Stream Connector Media Replace

Tracks in-place media file replacement — not covered by core Stream's Media connector, which only logs add/edit/delete — for two plugins, each registering independently only if active:

- [Enable Media Replace](https://wordpress.org/plugins/enable-media-replace/)
- [WP Media Folder](https://github.com/ItinerisLtd/wp-media-folder) (its built-in file replace feature)

[![GitHub License](https://img.shields.io/github/license/itinerisltd/stream-connector-media-replace.svg?style=flat-square)](https://github.com/ItinerisLtd/stream-connector-media-replace/blob/main/LICENSE)
[![Hire Itineris](https://img.shields.io/badge/Hire-Itineris-ff69b4.svg?style=flat-square)](https://www.itineris.co.uk/contact/)
[![Twitter Follow @itineris_ltd](https://img.shields.io/twitter/follow/itineris_ltd?style=flat-square&color=1da1f2)](https://twitter.com/itineris_ltd)

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->

- [Minimum Requirements](#minimum-requirements)
- [Installation](#installation)
- [Credits](#credits)
- [License](#license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Minimum Requirements

- PHP v8.4
- WordPress v6.1
- Either [Enable Media Replace](https://wordpress.org/plugins/enable-media-replace/) v4.1+, or [WP Media Folder](https://github.com/ItinerisLtd/wp-media-folder), or both

## Installation

WP Media Folder is a privately distributed plugin and isn't published on Packagist, so this package doesn't declare it as a dependency — install it separately. Enable Media Replace is free and available via wpackagist.

```bash
composer require itinerisltd/stream-connector-media-replace
```

## Credits

[Stream Connector Media Replace](https://github.com/ItinerisLtd/stream-connector-media-replace) is a [Itineris Limited](https://www.itineris.co.uk/) project created by [Lee Hanbury-Pickett](https://github.com/codepuncher).

Full list of contributors can be found [here](https://github.com/ItinerisLtd/stream-connector-media-replace/graphs/contributors).

## License

[Stream Connector Media Replace](https://github.com/ItinerisLtd/stream-connector-media-replace) is released under the [MIT License](https://opensource.org/licenses/MIT).
