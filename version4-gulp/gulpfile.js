//+Constants
const {series} 		= require('gulp'						);
const include 		= require('gulp-include'				);


//+Vars
var gulp 			= require('gulp'						),
	connect 		= require('gulp-connect'				),
	watch 			= require('gulp-watch'					),
	browserSync 	= require('browser-sync').create(		),
	sass 			= require('gulp-sass'					),
	imagemin 		= require('gulp-imagemin'				),
	minifyCSS 		= require('gulp-minify-css'				),
	minifyJS 		= require('gulp-uglify'					),
	//+For renaming css files to .min.css when minifying
	rename 			= require('gulp-rename'					),
	//+Deleting folders/files
	del 			= require('del'							),
	path 			= require('path' 						),
	cssimport 		= require('gulp-cssimport'				),
	htmlPartial 	= require('gulp-html-partial'			),
	replace 		= require('gulp-string-replace'			),
	newer 			= require('gulp-newer' 					),
	concat 			= require('gulp-concat' 				),
	//Deleted : https://github.com/joachimprinzbach/gulp-deleted
	//Collate : https://www.npmjs.com/package/gulp-collate
	//Changed : https://www.npmjs.com/package/gulp-changed
	//deleted 		= require('gulp-deleted' 				),
	//collate 		= require('gulp-collate' 				),
	//changed 		= require('gulp-changed' 				),
	//for reducing images (used in imageTmp function)
	image 			= require('gulp-image' 					),
	//creating cusom logs inside the terminal
	log 			= require('fancy-log' 					);


//+Deleting the _build folder
function cleanBuild(cb){
	return del(['_build'], cb);
}


//+Deleting the _tmp folder
function cleanTmp(cb){
	return del(['_tmp'], cb);
}


//+Compiling sass file
function compile() {
	return(gulp.src("app/assets/sass/*.scss")
			.pipe(sass())
			.on("error", sass.logError)
			.pipe(gulp.dest("app/assets/css/")
		)
	);
}


//+Compressing CSS from _tmp folder to _build folder
function css(){
	return(gulp.src('_tmp/assets/css/*.css')
			.pipe(minifyCSS())
			.pipe(rename({
				suffix: '.min'
			}))
			.pipe(gulp.dest('_build/assets/css')
		)
	);
}


//+Compressing JS from _tmp folder to _build folder
function js(){
	return(gulp.src('_tmp/assets/js/*.js')
			.pipe(minifyJS())
			.pipe(rename({
				suffix: '.min'
			}))
			.pipe(gulp.dest('_build/assets/js')
		)
	);
}


//+Moving HTML
function html(){
	return gulp.src([
				'_tmp/*.html', 
				'_tmp/**/*.html'
			]
		)
		.pipe(gulp.dest('_build')
	);
}


//+Moving images to the _tmp folder
function imageTmp(){
	return gulp.src([
				'app/assets/img/*.{png,jpg,jpeg,gif,svg,ico}', 
				'app/assets/img/*.{png,jpg,jpeg,gif,svg,ico}'
			]
		)
		//for reducing images
		//.pipe(image())
		.pipe(gulp.dest('_tmp/assets/img/')
		.on('end', function(){
			log.info('Images task');
		})
	);
}


//+Moving videos to the _tmp folder
function videoTmp(){
	return gulp.src([
				'app/assets/vid/*.{mp4,mov,mkv,avi,ogg}', 
				'app/assets/vid/*.{mp4,mov,mkv,avi,ogg}'
			]
		)
		//for reducing images
		//.pipe(image())
		.pipe(gulp.dest('_tmp/assets/vid/')
		.on('end', function(){
			log.info('Videos task');
		})
	);
}


//+Moving pdfs to the _tmp folder
function pdfTmp(){
	return gulp.src([
				'app/assets/pdf/*.pdf', 
				'app/assets/pdf/*.pdf'
			]
		)
		.pipe(gulp.dest('_tmp/assets/pdf')
	);
}


//+Moving fonts to the _tmp folder
function fontsTmp(){
	return gulp.src(['app/assets/fonts/**/*.{woff,woff2,svg,eot,ttf,otf}'])
		//for reducing images
		//.pipe(image())
		.pipe(gulp.dest('_tmp/assets/fonts/')
		.on('end', function(){ log.info('Fonts task'); })
	);
}


//+Moving htaccess to the _tmp folder
function htaccessTmp(){
	return gulp.src([
				'app/.htaccess', 
				'app/.htaccess'
			]
		)
		.pipe(gulp.dest('_tmp/')
	);
}


//+Moving fonts to the _build folder
function fontsBuild(){
	return gulp.src(['_tmp/assets/fonts/*.{woff,woff2}'])
		.pipe(gulp.dest('_build/assets/fonts')
	);
}


//+Moving images to the _build folder
function imageBuild(){
	return gulp.src([
				'_tmp/assets/img/*.{png,jpg,jpeg,gif,svg,ico}',
				'_tmp/assets/img/*.{png,jpg,jpeg,gif,svg,ico}'
			]
		)
		.pipe(gulp.dest('_build/assets/img')
	);
}


//+Moving videos to the _build folder
function videoBuild(){
	return gulp.src([
				'_tmp/assets/vid/*.{mp4,mov,mkv,avi,ogg,webm}', 
				'_tmp/assets/vid/*.{mp4,mov,mkv,avi,ogg,webm}'
				]
			)
		//for reducing images
		//.pipe(image())
		.pipe(gulp.dest('_build/assets/vid')
	);
}


//+Moving pdfs to the _build folder
function pdfBuild(){
	return gulp.src([
				'_tmp/assets/pdf/*.pdf', 
				'_tmp/assets/pdf/*.pdf'
			]
		)
		.pipe(gulp.dest('_build/assets/pdf')
	);
}


//+Moving htaccess to the _build folder
function htaccessBuild(){
	return gulp.src([
				'_tmp/.htaccess', 
				'_tmp/.htaccess'
			]
		)
		.pipe(gulp.dest('_build/')
	);
}


//+Import css
function importCSS(){
	return gulp.src('app/assets/css/app.css')
		.pipe(cssimport())
		.pipe(gulp.dest('_tmp/assets/css')
	);
}


//+Import js
function importJS(){
	return gulp.src('app/assets/js/*.js')
		.pipe(include('app/assets/js/libraries/*.js'))
		.on('error', console.log)
		.pipe(gulp.dest('_tmp/assets/js/')
	);
}


//+Import html
function importHTML(){
	return gulp.src([
				'app/*.html', 
				'app/**/*.html', 
				'!app/includes/*.html', 
				'!app/includes/**/*.html'
			]
		)
		.pipe(htmlPartial({
			basePath: 'app/includes/'
		}))
		.pipe(gulp.dest('_tmp')
	);
}


//+Replace css/js files
function changePaths(){
	return gulp.src([
				'_tmp/*.html', 
				'_tmp/**/*.html'
			]
		)
		.pipe(replace('app.css', 'app.min.css'))
		.pipe(replace('app.js', 'app.min.js'))
		.pipe(gulp.dest('_build/')
	)
}


//+Combining javascript files
function combiningScriptFiles() {
	return gulp.src([
				'app/assets/js/libraries/jquery/**/*.js',
				'app/assets/js/libraries/bootstrap/**/*.js',
				'app/assets/js/libraries/modernizr/**/*.js',
				'app/assets/js/libraries/lightwidget/*.js',
				'app/assets/js/*.js'
			]
		)
		.pipe(concat('app.js'))
		.pipe(gulp.dest('_tmp/assets/js/')
	);
}


//+Delete matching files in the _tmp folder when deleting them from the app folder
// function deleteMatchingFiles() {
// 	const src = 'app/assets/img/';
// 	const dest = '_tmp/assets/img/';
// 	gulp.src(src)
// 		.pipe(deleted({
// 			src,
// 			dest,
// 			patterns: [
// 			'*.{png,jpg,jpeg,gif,svg,ico}',
// 			//'*.jpg',
// 			//'!app/includes/',
// 			//'!index.html',
// 			],
// 		})
// 	)
// 	.pipe(gulp.dest('_tmp/assets/img/'));
// }

// function deleteMatchingFiles() {
// 	var srcPaths = ['app/assets/img'];
// 	var destPath = '_tmp/assets/img';
// 	gulp.src(srcPaths)
// 		.pipe(collate('test'))
// 		.pipe(deleted( destPath , [
// 				//"**/*",
// 				'app/assets/img/gilko.jpg',
// 				'!index.html'
// 			]))
// 		.pipe( changed(destPath))
// 		.pipe( gulp.dest(destPath));
// }


function run() {
	const server = connect.server({
		hostname	: 	'localhost'	,
		port		: 	'3000'		,
		root		: 	'_tmp'		,
		livereload 	: 	true
	})

	browserSync.init({
		server: "_tmp"
	});

	gulp.watch(
		[
			'app/*.html' 							,
			'app/**/*.html'							,
			'app/**/**/*.html'						,
			'_tmp/**/*.html'						,
			'_tmp/*/**/*.html'						,
			'_tmp/*.html'							,
			'app/assets/sass/*.scss'				,
			'app/assets/js/*.js'					,
			'_tmp/assets/css/*.css'					,
			//'app/assets/img/*.{png,jpg,jpeg,gif,svg,ico}'	,
			//'_tmp/assets/img/*.{png,jpg,jpeg,gif,svg,ico}'
		]
	).on('change', browserSync.reload);

	//+Running the compile function for the scss files in the assets/sass folder/
	//+gulp.watch('app/assets/sass/*.scss', series(compile, cssApp));
	gulp.watch('app/assets/sass/*.scss', series(compile));

	gulp.watch(['app/*.html', 'app/**/*.html'], series(importHTML));

	//+Here we are wathing when the app.css file is saved in the app folder, after saving the importCSS function is activated
	//+The importCSS function will look the the app.css file in the app folder and will look to the @imports in the file and will import the css files into the app.css file
	//+The app.css file is saved inside the tmp folder under assets/css
	gulp.watch('app/assets/css/app.css', series(importCSS));

	gulp.watch('app/assets/js/*.js', series(combiningScriptFiles));

	//+Syncing the images files to _tmp folder
	gulp.watch('app/assets/img/*', series(imageTmp));

	//+Syncing the videos files to _tmp folder
	gulp.watch('app/assets/vid/*', series(videoTmp));

	//+Syncing the pdf files to _tmp folder
	gulp.watch('app/assets/pdf/*', series(pdfTmp));

	//+Syncing the fonts files to _tmp folder
	gulp.watch('app/assets/fonts/*', series(fontsTmp));

	//gulp.watch('app/assets/img/*.{png,jpg,jpeg,gif,svg,ico}', deleteMatchingFiles);

	//+If html files are deleted, delete them in the _tmp folder also
	//+Delete event on watch : https://github.com/gulpjs/gulp/blob/master/docs/recipes/handling-the-delete-event-on-watch.md
	gulp.watch(
		[
			'app/*.html' 									,
			'app/**/*.html'									,
			'app/**/**/*.html'								,
			'app/assets/img/*.{png,jpg,jpeg,gif,svg,ico}'	,
			'app/assets/vid/*.{mp4,mov,mkv,avi,ogg,webm}'	,
			'app/assets/pdf/*.pdf' 							,
			'app/assets/fonts/*.{woff,woff2}' 				,
		]
	).on('unlink', function (filepath) {
		var filePathFromSrc = path.relative(path.resolve('app/*.html'), filepath);
		// Concatenating the 'build' absolute path used by gulp.dest in the scripts task
		var destFilePath = path.resolve('_tmp/*.html', filePathFromSrc);
		del.sync(destFilePath);
	});
}

//+The 'gulp' default and 'gulp build' task
//+Keep in mind that the order is important for the series
//+If you for instance do run, compile, ... the compile function wil not render after the run function
exports.default		=	series(
							cleanBuild						,
							cleanTmp						,
							imageTmp 						,
							videoTmp						,
							pdfTmp							,
							fontsTmp 						,
							htaccessTmp						,
							importHTML						,
							compile 						,
							importCSS						,
							combiningScriptFiles			,
							run 							,
						);

exports.build 		= 	series(
							cleanBuild						,
							imageTmp 						,
							videoTmp						,
							pdfTmp							,
							fontsTmp 						,
							htaccessTmp						,
							importHTML						,
							compile 						,
							importCSS						,
							html 							,
							css 							, 
							js 								,
							compile 						, 
							imageBuild 						,
							videoBuild						,
							pdfBuild						,
							fontsBuild 						,
							htaccessBuild					,
							changePaths 					,
							cleanTmp	 
						);