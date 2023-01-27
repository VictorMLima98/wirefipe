/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./resources/**/*.blade.php",
		"./resources/**/*.js",
		'./vendor/wireui/wireui/resources/**/*.blade.php',
		'./vendor/wireui/wireui/ts/**/*.ts',
		'./vendor/wireui/wireui/src/View/**/*.php'
	],
	theme: {
		extend: {
			fontFamily: {
				sans: ['Lato', 'sans-serif']
			},
			colors: {
				primary: {
					'50': '#f7feeb',
					'100': '#ecfdce',
					'200': '#d5f9a1',
					'300': '#aff164',
					'400': '#83e027',
					'500': '#5ec702',
					'600': '#4aa200',
					'700': '#398200',
					'800': '#2b6600',
					'900': '#0a1900',
				},
				secondary: {
					'50': '#f7f7f7',
					'100': '#e3e3e3',
					'200': '#c8c8c8',
					'300': '#a4a4a4',
					'400': '#818181',
					'500': '#666666',
					'600': '#515151',
					'700': '#434343',
					'800': '#383838',
					'900': '#313131',
				}
			}
		},
	},
	presets: [
		require('./vendor/wireui/wireui/tailwind.config.js')
	],
	plugins: [
		require('@tailwindcss/forms'),
		require('@tailwindcss/typography'),
		require('@tailwindcss/aspect-ratio')
	],
}
