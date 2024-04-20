import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './vendor/laravel/jetstream/**/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/views/**/*.blade.php',
		 './app/Http/Livewire/**/*Table.php',
		 './vendor/power-components/livewire-powergrid/resources/views/**/*.php',
		 './vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
         "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
         './vendor/usamamuneerchaudhary/commentify/resources/views/**/*.php',
         "./node_modules/flowbite/**/*.js"
	],
    presets: [
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
		forms,
		typography,
        require('flowbite/plugin')
	],
};
