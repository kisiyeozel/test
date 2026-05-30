import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

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
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', 'Georgia', 'serif'],
                script: ['Dancing Script', 'cursive'],
            },
            colors: {
                gold: {
                    50: '#fdf8ed',
                    100: '#f9edcc',
                    200: '#f2d999',
                    300: '#e8c566',
                    400: '#deb53f',
                    500: '#d4a853',
                    600: '#b8912a',
                    700: '#8a6d1f',
                    800: '#5c4915',
                    900: '#2e240a',
                },
                cream: {
                    50: '#fefcf7',
                    100: '#fcf6e8',
                    200: '#f8edd0',
                    300: '#f2dfb0',
                    400: '#e8c98a',
                    500: '#d4a853',
                },
                dark: {
                    50: '#f6f5f3',
                    100: '#e8e5df',
                    200: '#d1ccc0',
                    300: '#b3ab99',
                    400: '#958a73',
                    500: '#7a6f5a',
                    600: '#5f5645',
                    700: '#453e31',
                    800: '#2b2620',
                    900: '#1a1713',
                    950: '#0d0b09',
                },
            },
            transitionDuration: {
                400: '400ms',
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'float-slow': 'float 8s ease-in-out infinite',
                'pulse-soft': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'slide-up': 'slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                'fade-in': 'fadeIn 1s ease-out',
                'scale-in': 'scaleIn 0.5s cubic-bezier(0.16, 1, 0.3, 1)',
                'shimmer': 'shimmer 2.5s linear infinite',
                'spin-slow': 'spin 12s linear infinite',
                'bounce-gentle': 'bounceGentle 3s ease-in-out infinite',
                'glow': 'glow 3s ease-in-out infinite alternate',
                'reveal': 'reveal 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(40px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                scaleIn: {
                    '0%': { transform: 'scale(0.9)', opacity: '0' },
                    '100%': { transform: 'scale(1)', opacity: '1' },
                },
                shimmer: {
                    '0%': { backgroundPosition: '200% 0' },
                    '100%': { backgroundPosition: '-200% 0' },
                },
                bounceGentle: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-6px)' },
                },
                glow: {
                    '0%': { boxShadow: '0 0 20px rgba(212, 168, 83, 0.1)' },
                    '100%': { boxShadow: '0 0 40px rgba(212, 168, 83, 0.3)' },
                },
                reveal: {
                    '0%': { opacity: '0', transform: 'translateY(40px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
        },
    },

    plugins: [forms, typography],
};
