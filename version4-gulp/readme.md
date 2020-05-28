Commands
gulp
gulp build

Adding includes/partials to an html file
<partial src="*.html"></partial>

Installing the plugins
npm install gulp-include gulp-connect gulp-watch browser-sync gulp-sass gulp-imagemin gulp-minify-css gulp-uglify gulp-rename del gulp-cssimport gulp-html-partial gulp-string-replace merge2 gulp-newer gulp-concat gulp-deleted gulp-path



TO DO:
- Show in which file it gives an error
- If folder is deleted in app folder it needs to be deleted in the _tmp folder
- Create sub folders for js => DONE WITH CONCAT
- Image function too long => ?
- Importing js files in the app.js file => DONE
- when putting pdf in app folder in assests, sync with tmp folder... => DONE
- when putting image in app > assets > img folder when gulp is running, sync it to the tmp folder => DONE
- Adding bootstrap => DONE
- If image is added sync to tmp folder => DONE
- gulp-minify-css => use gulp-clean-css now
- when an image has been deleted => browsersync needs to work...
- Adding video folder in assets => DONE

If CTRL + C to stop the server the following message is given
[15:29:18] The following tasks did not complete: default, run
[15:29:18] Did you forget to signal async completion?