# AgriLife LiveWhale WordPress Plugin

This WordPress plugin provides functionality and visual styles for LiveWhale content to display on AgriLife affiliated websites.

## WordPress Requirements

1. Gutenberg plugin
2. PHP 5.6+, tested with PHP 7.2

## Installation

1. [Download the latest release](https://github.com/agrilife/agrilife-livewhale/releases/latest)
2. Upload the plugin to your site

## Features

* LiveWhale Gutenberg block

## Development Installation

1. Copy this repo to the desired location.
2. In your terminal, navigate to the plugin location 'cd /path/to/the/plugin'.
3. Run "npm start" to configure your local copy of the repo, install dependencies, and build files for a production environment.
4. Or, run "npm start -- develop" to configure your local copy of the repo, install dependencies, and build files for a development environment.

## Development Notes

When you stage changes to this repository and initiate a commit, they must pass PHP and Sass linting tasks before they will complete the commit step. Release tasks can only be used by the repository's owners.

## Development Tasks

1. Run "grunt develop" to compile the css when developing the plugin.
2. Run "grunt watch" to automatically compile the css after saving a *.scss file.
3. Run "grunt" to compile the css when publishing the plugin.
4. Run "npm run checkwp" to check PHP files against WordPress coding standards.

## Development Requirements

* Node: http://nodejs.org/
* NPM: https://npmjs.org/
