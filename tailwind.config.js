/** @type {import('tailwindcss').Config} */ 
export default { 
    content: [ 
        "./resources/**/*.blade.php", 
        "./resources/**/*.js", 
        "./resources/**/*.vue", 
    ], 
    theme: { 
        extend: { 
            colors: { 
                primary: '#f8b5d6', 
                secondary: '#d4a5c5', 
                accent: '#a2678a', 
                dark: '#4a314d', 
                light: '#f9f1f6', 
            }, 
            fontFamily: { 
                'poppins': ['Poppins', 'sans-serif'], 
            }, 
            animation: { 
                'fade-in': 'fadeIn 0.5s ease-in-out', 
                'slide-up': 'slideUp 0.5s ease-out', 
            }, 
            keyframes: { 
                fadeIn: { 
                    '0%': { opacity: '0' }, 
                    '100%': { opacity: '1' }, 
                }, 
                slideUp: { 
                    '0%': { transform: 'translateY(20px)', opacity: '0' }, 
                    '100%': { transform: 'translateY(0)', opacity: '1' }, 
                } 
            } 
        }, 
    }, 
    plugins: [], 
} 
