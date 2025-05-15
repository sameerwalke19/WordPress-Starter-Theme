# WordPress Starter Theme

## Overview

**WordPress Starter Theme** is a clean, well-organized, and minimalist WordPress theme designed to serve as a solid foundation for developing any custom WordPress theme. It provides a sensible directory structure and essential template files, allowing developers to quickly jumpstart their projects without being bogged down by opinionated styling or overly complex features.

The goal of this WordPress starter theme is to provide the necessary boilerplate and organizational patterns to build robust, maintainable, and scalable WordPress themes.

## Features

*   **Modern Directory Structure:** Organized for clarity and scalability.
*   **Essential Template Files:** Includes all standard WordPress templates.
*   **Modular `functions.php`:** Core functionalities are broken down into include files within the `/inc` directory for better organization.
*   **Basic Asset Enqueueing:** A starting point for managing CSS and JavaScript.
*   **Translation Ready:** Includes a `.pot` file and `languages` directory.
*   **Minimal Foundational Styling:** Intentionally unopinionated, providing a clean slate for complete design freedom.
*   **`singular.php`:** Provides a fallback for single posts and pages, promoting DRY principles.

## Directory Structure

Here's a look at the theme's directory structure:

```
/wordpress-starter-theme/
|
|-- /assets/
|   |-- /css/
|   |   |-- main.css             # Main theme stylesheet (can be enqueued)
|   |   `-- editor-style.css     # Styles for the WordPress block editor
|   |-- /js/
|   |   `-- custom-scripts.js    # Your custom JavaScript
|   |-- /images/                 # Theme images (logos, backgrounds, etc.)
|   `-- /fonts/                  # Custom fonts
|
|-- /inc/                        # Include files for theme functionality
|   |-- setup.php                # Theme setup (supports, nav menus, images)
|   |-- enqueue.php              # Enqueuing scripts and styles
|   |-- template-tags.php        # Custom template tags to keep templates clean
|   |-- template-functions.php   # Helper functions used in templates
|   |-- customizer.php           # Theme Customizer options
|   `-- hooks.php                # Custom action and filter hooks
|
|-- /languages/                  # Translation files
|   `-- starter-theme.pot        # Main .pot file for translations
|
|-- /template-parts/             # Reusable template sections 
|   |-- /header/
|   |   `-- site-branding.php
|   |-- /footer/
|   |   `-- site-info.php
|   |-- /navigation/
|   |   `-- navigation-primary.php
|   |-- /pagination/
|   |   |-- pagination.php
|   |   `-- pagination-single.php
|   |-- /post/
|   |   |-- content.php          # Default post content display
|   |   |-- content-archive.php  # Post archive display
|   |   |-- content-author.php   # Post author display
|   |   |-- content-excerpt.php  # Post excerpt display
|   |   |-- content-single.php   # Single post display 
|   |   |-- content-singular.php # Single post fallback for singular.php 
|   |   `-- content-none.php     # When no posts are found
|   |-- /page/
|   |   |-- content-page.php     # Default page content display 
|   |   `-- content-front.php    # For a custom front page template
|   `-- /blocks/                 # Create custom block patterns or styles
|       `-- example-block-pattern.php
|
|-- 404.php                      # 404 error page template
|-- archive.php                  # Archive page template 
|-- author.php                   # Author page template 
|-- attachment.php               # Attachment page template 
|-- comments.php                 # Comments template
|-- footer.php                   # Footer template 
|-- front-page.php               # Home page template 
|-- functions.php                # Main theme functions file 
|-- header.php                   # Header template (wp_head())
|-- index.php                    # Default fallback template
|-- page.php                     # Default page template
|-- README.md                    # This file
|-- screenshot.png               # Theme preview image (1200x900px recommended)
|-- search.php                   # Search results template
|-- sidebar.php                  # Sidebar template
|-- single.php                   # Single post template
|-- singular.php                 # Fallback for single.php and page.php
`-- style.css                    # Main stylesheet 
```


## Getting Started

1.  **Download/Clone:** Get the theme files into your `wp-content/themes/` directory from the GitHub repository.
2.  **Rename:** The directory cloned from GitHub will likely be named `WordPress-Starter-Theme`. It's recommended to rename this to `wordpress-starter-theme` (lowercase, hyphenated for consistency with WordPress standards and the internal naming below) or your own custom theme name (e.g., `my-custom-theme`).
3.  **Update `style.css`:** Open `style.css` and update the theme header information (Theme Name, Author, URI, Description, etc.). Make sure the `Theme Name` here matches "WordPress Starter Theme" or your custom theme name.
4.  **Search & Replace:** It's crucial to personalize the theme's internal identifiers. If you've renamed the theme directory to something other than `wordpress-starter-theme`, you'll need to adjust the "search for" part of these instructions accordingly.
    *   Search for `'wordpress-starter-theme'` (default text domain) and replace it with your theme's unique text domain (e.g., `'my-custom-theme'`).
    *   Search for `WordPress_Starter_Theme` (default PHP namespace/class prefix) and replace it with your theme's unique prefix (e.g., `My_Custom_Theme`).
    *   Search for `wordpress_starter_theme_` (default function prefix) and replace it with your theme's unique function prefix (e.g., `my_custom_theme_`).
    *   Search for `WORDPRESS_STARTER_THEME_` (default constant prefix) and replace it with your theme's unique constant prefix (e.g., `MY_CUSTOM_THEME_`).
5.  **Activate:** Activate the theme through the WordPress admin panel (Appearance > Themes).
6.  **Develop:** Start building your awesome theme!

## Customization

*   **Styling:** Add your custom CSS to `/assets/css/main.css` (or your preferred stylesheet organization). Remember to enqueue it properly via `/inc/enqueue.php`.
*   **JavaScript:** Add your custom JavaScript to `/assets/js/custom-scripts.js` and enqueue it.
*   **Functionality:** Extend theme functionality by adding or modifying files in the `/inc/` directory.
*   **Templates:** Modify existing template files or add new ones according to the WordPress Template Hierarchy.
*   **Template Parts:** Create reusable content blocks in `/template-parts/` and include them using `get_template_part()`.

## Contributing

This project is open source and contributions are welcome! If you have suggestions, find a bug, or want to contribute code, please feel free to:
1. Open an issue on the GitHub repository to discuss changes or report bugs.
2. Fork the repository and submit a pull request with your proposed changes.

## License

WordPress Starter Theme is licensed under the GNU General Public License v2 or later.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see <https://www.gnu.org/licenses/>.

© 2025 Sameer Walke
