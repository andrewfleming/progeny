// See: http://24ways.org/2013/grunt-is-not-weird-and-hard/
module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		clean: {
			build: {
				src: ['build/*']
			}
		},

		copy: {
			main: {
				files: [
					// includes files within path
					{expand: true, src: ['fonts/*'], dest: 'build/fonts', filter: 'isFile'},
				],
			},
		},

		csscomb: {
			options: {
				config: 'sass/csscomb.json'
			},
			build: {
				expand: true,
				cwd: 'sass/',
				src: ['**/*.scss'],
				dest: 'sass/'
			}
		},

		sass: {
			options: {
				compass: true,
				style: 'expanded',
				precision: 3,
				require: [ 'sass-globbing', 'susy', 'breakpoint' ]
			},
			build: {
				files: {
					'build/css/style.css': 'sass/style.scss',
					'build/css/editor-style.css': 'sass/editor-style.scss',
				}
			}
		},

		jshint: {
			options: {
				globals: {
					jQuery: true
				}
			},
			build: {
				files: {
					src: ['js/**/*.js']
				}
			}
		},

		concat: {
			build: {
				src: [
					'js/libs/packery.pkgd.js',
					'js/libs/isotope.pkgd.js',
					'js/libs/imagesloaded.pkgd.js',
					'js/libs/jquery.sticky-kit.js',
					'js/libs/jquery.flexslider.js',
					'js/biotext.js'
				],
				dest: 'build/js/scripts.js',
				nonull: true
			}
		},

		uglify: {
			options: {
				preserveComments: 'some',
			},
			build: {
				files: {
					'build/js/scripts.min.js': 'build/js/scripts.js',
					'build/js/admin.min.js': 'build/js/admin.js'
				}
			}
		},

		postcss: {
			options: {
			map: true, // inline sourcemaps

			processors: [
					require('autoprefixer-core')({browsers: 'last 2 versions'}), // add vendor prefixes
				]
			},
			dist: {
				src: 'build/css/*.css'
			}
		},

		csso: {
			options: {
				report: 'min'
			},
			build: {
				files: {
					'build/css/style.min.css': ['build/css/style.css'],
					'build/css/editor-style.min.css': ['build/css/editor-style.css']
				}
			}
		},

		imagemin: {
			options: {
				cache: false // Bug: https://github.com/gruntjs/grunt-contrib-imagemin/issues/140
			},
			build: {
				files: [{
					expand: true,
					cwd: 'images/',
					src: ['**/*.{png,jpg,gif,svg}'],
					dest: 'build/images/'
				}]
			}
		},

		watch: {

			options: {
				livereload: true
			},

			js: {
				files: ['js/**/*.js'],
				tasks: ['concat'],
				options: {
					spawn: false,
					livereload: true,
				}
			},

			css: {
				files: ['sass/**/*.scss'],
				tasks: ['sass', 'postcss' ],
				options: {
					livereload: true,
					spawn: false
				}
			},

			images: {
				files: ['images/**/*'],
				tasks: ['newer:imagemin'],
				options: {
					spawn: false
				}
			},
		}

	});

	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-csscomb');
	grunt.loadNpmTasks('grunt-csso');
	grunt.loadNpmTasks('grunt-newer');
	grunt.loadNpmTasks('grunt-notify');

	// grunt.registerTask('default', ['sass', 'postcss', 'imagemin', 'watch']);
	grunt.registerTask('default', ['clean', 'copy', 'sass', 'postcss', 'concat', 'imagemin', 'watch']);
	grunt.registerTask('build', ['clean', 'csscomb', 'sass', 'postcss', 'jshint', 'concat', 'uglify', 'imagemin', 'csso']);

};
