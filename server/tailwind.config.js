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
            colors: {
                brand: {
                    pink: '#FF4D7D',
                    coral: '#FF7A6B',
                    orange: '#FF9A4A',
                    dark: '#3A1930',
                    light: '#FFF7F1',
                    black: '#111111'
                },
                // Map the old names to the new palette to gracefully fall back
                cream: {
                    DEFAULT: '#FFF7F1',
                    50: '#FFFFFF',
                    100: '#FFF7F1',
                    200: '#FFF7F1',
                    300: '#FFF7F1',
                },
                maroon: {
                    700: '#3A1930',
                    800: '#3A1930',
                    900: '#3A1930',
                },
                crimson: {
                    500: '#FF4D7D',
                    600: '#FF4D7D',
                    700: '#3A1930',
                    800: '#3A1930',
                },
                ink: {
                    50: '#FFF7F1',
                    100: '#FFF7F1',
                    800: '#111111',
                    900: '#111111',
                },
            },
            fontFamily: {
                display: ['Noto Serif', 'Noto Serif Devanagari', 'Noto Serif Tamil', 'Noto Serif Malayalam', 'Noto Serif Kannada', 'Noto Serif Telugu', ...defaultTheme.fontFamily.serif],
                serif: ['Noto Serif', 'Noto Serif Devanagari', 'Noto Serif Tamil', 'Noto Serif Malayalam', 'Noto Serif Kannada', 'Noto Serif Telugu', ...defaultTheme.fontFamily.serif],
                body: ['Noto Sans', 'Noto Sans Devanagari', 'Noto Sans Tamil', 'Noto Sans Malayalam', 'Noto Sans Kannada', 'Noto Sans Telugu', ...defaultTheme.fontFamily.sans],
                sans: ['Noto Sans', 'Noto Sans Devanagari', 'Noto Sans Tamil', 'Noto Sans Malayalam', 'Noto Sans Kannada', 'Noto Sans Telugu', ...defaultTheme.fontFamily.sans],
            },
            borderRadius: {
                '4xl': '2rem',
            },
        },
    },

    plugins: [forms],
};
