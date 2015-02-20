module.exports = function(grunt) {

	grunt.initConfig({

		sass: {
			dist: {
				options: {
					sourcemap: 'none',
					style: 'expanded'
				},
				files: {
					'style-bootstrap.css': '_bootstrap-sass/bootstrap-styles.scss',
					'style-bootstrap-reduced.css': '_bootstrap-sass/bootstrap-reduced-styles.scss'
				}
			}
		},

		fixindent: {
			scripts: {
				src: [
					'style-bootstrap.css',
				],
				dest: 'style-bootstrap.css',
				src: [
					'style-bootstrap-reduced.css'
				],
				dest: 'style-bootstrap-reduced.css',
				options: {
					style: 'tab',
					size: 1
				}
			}
		},

		cssmin: {
			combine: {
				files: {
					'style-bootstrap.css': ['style-bootstrap.css'],
					'style-bootstrap-reduced.css': ['style-bootstrap-reduced.css']
				}
			}
		},

		uglify: {
			my_target: {
				files: {
					'scripts.min.js': ['scripts/bootstrap.js', 'scripts/bootstrap-classes.js', 'scripts/jquery.fitvids.js'],
					'scripts-reduced.min.js': ['scripts/bootstrap-reduced.js', 'scripts/bootstrap-classes.js', 'scripts/jquery.fitvids.js']
				}
			}
		}

	});

grunt.loadNpmTasks('grunt-contrib-sass');
grunt.loadNpmTasks('grunt-fixindent');
grunt.loadNpmTasks('grunt-contrib-cssmin');
grunt.loadNpmTasks('grunt-contrib-uglify');

grunt.registerTask('default', ['sass','fixindent','cssmin', 'uglify']);
grunt.registerTask('css', ['sass','fixindent','cssmin']);
grunt.registerTask('js', ['uglify']);
};