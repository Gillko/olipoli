module.exports = function(grunt){
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
					'src/assets/css/main.css': 'src/assets/sass/main.scss'
				}
			}
		},
		cssmin: {
			target: {
				files: [{
					expand: true,
					cwd: 'src/assets/css',
					src: ['*.css', '!*.min.css'],
					dest: 'build/assets/css',
					ext: '.min.css'
				}]
			}
		},
		uglify: {
			my_target: {
				files: {
					'build/assets/js/main.min.js': 'src/assets/js/main.js'
				}
			}
		},
		includes: {
			build: {
				cwd: 'src',
				src: ['*.html'],
				dest: 'build',
				options: {
					flatten: true,
					includePath: 'src/includes'
				}
			}
		},
		/*tags: {
			buildScriptsBuild: {
				options: {
					scriptTemplate: '<script type="text/javascript" src="assets/js/main.min.js"></script>',
					openTag: '<!-- start custom js -->',
					closeTag: '<!-- end custom js -->'
				},
				src: [
					'src/assets/js/*.js'
				],
				dest: 'build/index.html'
			},
			buildLinksBuild: {
				options: {
					linkTemplate: '<link rel="stylesheet" type="text/css" href="assets/css/main.min.css">',
					openTag: '<!-- start custom css -->',
					closeTag: '<!-- end custom css -->'
				},
				src: [
					'src/assets/css/*.css'
				],
				dest: 'build/index.html'
			}
		},*/
		connect: {
			server: {
				options: {
					hostname: "localhost",
					port: 3000,
					base: 'build/',
					livereload: true
				}
			}
		},
		watch: {
			options: {
				livereload: true,
			},
			css: {
				files: ['src/assets/sass/*.scss'],
				tasks: ['sass', 'cssmin']
			},
			js: {
				files: ['src/assets/js/*.js'],
				tasks: ['uglify']
			},
			html: {
				files: ['src/index.html', 'src/includes/*.html'],
				tasks: ['includes']
			},
			/*html_export: {
				files: ['src/index.html'],
				tasks: ['tags']
			}*/
		}
	});
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-includes');
	grunt.loadNpmTasks('grunt-script-link-tags');
	grunt.loadNpmTasks('grunt-contrib-connect');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['connect', 'watch']);
};