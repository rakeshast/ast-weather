=== Ast Weather ===
Contributors: @aryanbokde
Tags: Ast weather, Weather, location
Requires at least: 4.7
Tested up to: 6.2.2
Stable tag: 4.3
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
The WordPress Ast Weather Plugin is a powerful tool that allows you to display weather information on your WordPress website. With this plugin, you can easily add weather widgets, shortcodes, and other features to enhance the user experience.

# WordPress Ast Weather Plugin Documentation

## Introduction
The WordPress Ast Weather Plugin is a powerful tool that allows you to display weather information on your WordPress website. With this plugin, you can easily add weather widgets, shortcodes, and other features to enhance the user experience.

This documentation will guide you through the installation, configuration, and usage of the WordPress Ast Weather Plugin, helping you make the most of its features.

## Table of Contents
1. Installation
   - Prerequisites
   - Plugin Installation
   
2. Configuration
   - API Key Setup
   - General Settings
   - Widget Settings
   
3. Usage
   - Shortcodes
   - Widget Placement
   
4. Troubleshooting
   - Common Issues
   - Support Options
   
5. Frequently Asked Questions (FAQ)
   - Q1: How to obtain an API key?
   - Q2: Can I customize the weather display?
   - Q3: How often is the weather data updated?
   - Q4: Can I use multiple weather widgets on the same page?

## 1. Installation

### Prerequisites
Before installing the WordPress Ast Weather Plugin, ensure that you meet the following requirements:
- A self-hosted WordPress website (WordPress.org)
- Administrator access to your WordPress dashboard
- Active internet connection

### Plugin Installation
To install the WordPress Weather Plugin, follow these steps:
1. Log in to your WordPress dashboard.
2. Navigate to "Plugins" -> "Add New".
3. In the search bar, type "Ast Weather" and press Enter.
4. Locate the plugin in the search results and click "Install Now".
5. After the installation is complete, click "Activate" to activate the plugin.

## 2. Configuration

### API Key Setup
To retrieve weather data, you need to set up an API key. Follow these steps to obtain an API key:
1. Visit a weather data provider's website (e.g., https://rapidapi.com/weatherapi/api/weatherapi-com).
2. Sign up for an account or log in if you already have one.
3. Locate the API key section in your account settings.
4. Generate a new API key if necessary.
5. Copy the API key.

### General Settings
To configure the general settings of the WordPress Ast Weather Plugin, follow these steps:
1. In your WordPress dashboard, go to "Tools" -> "Ast Weather".
2. Enter the API key you obtained in the "API Key" field.
3. Adjust other settings as needed, such as temperature units, language, etc.
4. Save the changes.

### Widget Settings
To configure the weather widget settings, follow these steps:
1. In your WordPress dashboard, go to "Appearance" -> "Widgets".
2. Locate the "Shortcode" and drag it to your desired widget area.
3. Configure the widget options, such as title, location, display format, etc.
4. Save the changes.

## 3. Usage

### Shortcodes
The WordPress Ast Weather Plugin provides shortcodes that allow you to embed weather information in your posts, pages, or any other content. Use the following shortcode format to display weather information:

```
[ast-weather location="London" ast_pressure='true' ast_wind='true' ast_humidity='true' ast_sunrise='true' ast_sunset='true']
```

Replace "City" with the desired location (e.g., "London") and "days". You can customize the days using various placeholders such as {location}, {days} etc.

### Widget Placement
To display the weather widget on your website, follow these steps:
1. In your WordPress dashboard, go to "Appearance" -> "Widgets".
2. Select shorcode widget and paste shortcode like : [ast-weather]