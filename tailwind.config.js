import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                coral: {
                  100: '#FFB6A1',  // Coral mais claro
                  200: '#FF8F70',  // Coral médio
                  300: '#FF6F61',  // Coral padrão
                  400: '#FF4A30',  // Coral escuro
                  800: '#E65100', // Laranja mais escuro
                  900: '#BF360C', // Laranja muito escuro, quase queimado
                },
        },

        orange: {
            100: '#FFB84D',  // Laranja claro
            200: '#FFA500',  // Laranja médio
            300: '#FF8C00',  // Laranja padrão
            400: '#E87A00',  // Laranja escuro
          },
    },

    plugins: [forms],
}
}
