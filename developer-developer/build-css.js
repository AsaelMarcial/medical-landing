const fs = require('fs');

const header = `/*
Theme Name: Developer Developer
Theme URI: https://medical-landing.local
Author: Developer
Description: Custom WordPress theme for nephrologist - Xalapa & Veracruz
Version: 1.0.0
Requires at least: 6.0
Tested up to: 7.0
Requires PHP: 8.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: developer-developer
*/

`;

const tailwindCSS = fs.readFileSync('./assets/css/tailwind-output.css', 'utf8');
fs.writeFileSync('./style.css', header + tailwindCSS);
console.log('style.css generated with WP header');
