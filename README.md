# New Theme
This repository is a starter for creating a new theme in Concrete5.

# Directory Structure
```js
theme_name/
├── css/ // theme styles
│   ├── build/
│   │   ├── add-ons/ // LESS files that override styles for each c5 mkt place add-on
│   │   │   ├── (example: calendar.less)
│   │   │   └── ...
│   │   ├── blocks/ // styles for each type of block that you can add to the page
│   │   │   ├── (example: feature.less)
│   │   │   └── ...
│   │   ├── bootstrap-0.0.0/ // only necessary bootstrap source files
│   │   │   ├── mixins/ // reusable classes to group CSS instructions
│   │   │   │   ├── grid-framework.less // generates grid classes from variable @grid-columns
│   │   │   │   ├── grid.less // generates semantic styling based on variable @grid-columns
│   │   │   │   ├── vendor-prefixes.less // no autoprefixer so this generates CSS prefixes
│   │   │   │   └── ... // extend bootstrap functionality as needed
│   │   │   ├── bootstrap.less // required to import/consolidate all bootstrap LESS files
│   │   │   ├── grid.less // generates grid styles utilizing mixins
│   │   │   ├── mixins.less // required to import all files in the mixin directory
│   │   │   ├── variables.less // commonly used values (cols) controlled from a single file
│   │   │   └── ... // extend bootstrap functionality as needed
│   │   ├── fonts/
│   │   │   └── defaults.less // LESS file for each color scheme in a theme
│   │   ├── mobile/ // mobile specific LESS files
│   │   │   ├── navigation.less
│   │   │   └── ...
│   │   ├── global.less // styles for tags: html/body/header/footer
│   │   ├── content.less // global styles for the content
│   │   ├── mixins.less // global reusable classes to group CSS instructions
│   │   └── ...
│   ├── presents/ // c5 color schemes
│   │   └── defaults.less  // general location for theme customizations
│   ├── bootstrap-modified.css // bootstrap styles + normalize.css
│   ├── main.less // imports all LESS files for the theme
│   ├── (Optional: styles.xml defines c5 style customizer panel)
├── elements // global page template partials
│   ├── footer.php
│   ├── footer_bottom.php
│   ├── header.php
│   └── header_top.php
├── images/
│   ├── background.png
│   └── ...
├── blank.php // SOMETHING TO DO WITH THE BLOG????
├── default.php // specifies which page layout should be used when none is specified
├── full.php // page layout: full width
├── left_sidebar.php // page layout: two column
├── page_forbidden.php // default single page: access denied
├── page_not_found.php // default single page: 404 page not found
├── page_theme.php // manages CSS/JS assets, define layout presets, customize WYSIWYG
├── right_sidebar.php // page layout: two column
├── thumbnail.png // image that displays next to the theme in c5
├── view.php // this empty view wraps around single pages and has header/footer
└── (add your own single page: https://documentation.concrete5.org/developers/working-with-pages/single-pages/overview)
```
