module.exports = {
	env: {
		browser: true,
		jquery: true,
	},
	extends: ['eslint:recommended', 'plugin:jquery/deprecated'],
	plugins: ['jquery'],
	rules: {
		// Example custom rules
		'no-unused-vars': 'error', // Report unused variables as errors
		'no-undef': 'error', // Report undefined variables as errors
		'jquery/no-ajax': 'warn', // Example rule from jQuery plugin (you may need to customize or add more rules as needed)

		// Enforce rules for coding style
		semi: ['error', 'always'], // Require semicolons
		quotes: ['error', 'single'], // Enforce single quotes
		indent: ['error', 2], // Enforce 2-space indentation

		// Add more rules as needed
	},
};
