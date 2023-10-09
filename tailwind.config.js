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
        'node_modules/daisyui/src/*.js',
    ],

    daisyui: {
        themes: [
          {
            mytheme: {
            
   "primary": "#FFA800",
            
   "secondary": "#1F9A58",
            
   "accent": "#1dcdbc",
            
   "neutral": "#2b3440",
            
   "base-100": "#ffffff",
            
   "info": "#3abff8",
            
   "success": "#36d399",
            
   "warning": "#fbbd23",
            
   "error": "#f87272",
            },
          },
        ],
      },


    plugins: [forms, typography, require("daisyui")],

    daisyui: {
        themes: ["light", "dark", "cupcake"],
      },
};
