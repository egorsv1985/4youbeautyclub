/** @type {import('tailwindcss').Config} */
export default {
	content: ['./**/*.html'],
	theme: {
		extend: {
			fontFamily: {
				Manrope: ['Manrope', 'sans-serif'],
			},
		},
		lineHeight: {
			tight: '1.3',
			normal: '1',
		},

		colors: {
			black: '#212121',
			creamy: '#ECD9C5',			
			txt: '#000',
			crumb: '#F2F2F2F2',
			crumb_txt: '#7A7878F2',
			accent: '#B97F41F2',
		
		},
		listStyleType: {
			none: 'none',
			disc: 'disc',
			decimal: 'decimal',
			square: 'square',
		},
		container: {
			center: true,
		},
	},
	plugins: [
		require('flowbite/plugin'),
		function ({ addComponents }) {
			addComponents({
				'.container': {
					maxWidth: '100%',
					'@screen sm': {
						maxWidth: '640px',
					},
					'@screen md': {
						maxWidth: '768px',
					},
					'@screen lg': {
						maxWidth: '1240px',
					},
					'@screen xl': {
						maxWidth: '1240px',
					},
				},
			})
		},
	],
}
