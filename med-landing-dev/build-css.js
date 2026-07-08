const fs = require('fs');

const header = `/*
Theme Name: Dr. Edgar E. Hernández - Nefrología
Author: Developer
Description: Tema WordPress para el Dr. Edgar Eduardo Hernández Enríquez, nefrólogo en Xalapa y Boca del Río, Veracruz.
Version: 1.5.4
Requires at least: 6.0
Tested up to: 7.0
Requires PHP: 8.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: med-landing-dev
*/

`;

const tailwindCSS = fs.readFileSync('./assets/css/tailwind-output.css', 'utf8');
fs.writeFileSync('./style.css', header + tailwindCSS, 'utf8');
console.log('style.css generated with WP header');
