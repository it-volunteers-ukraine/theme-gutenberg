// import { src, dest, watch, series, parallel } from "gulp";
import pkg from 'gulp';
import postcss from "gulp-postcss";
import sourcemaps from "gulp-sourcemaps";
import autoprefixer from "autoprefixer";
import yargs from "yargs";
import gulpSass from "gulp-sass";
import * as sass from 'sass'
import cleanCss from "gulp-clean-css";
import gulpif from "gulp-if";
import imagemin from "gulp-imagemin";
import del from "del";
import webpack from "webpack-stream";
import named from "vinyl-named";
import replace from "gulp-replace";
import wpPot from "gulp-wp-pot";
import browserSync from "browser-sync";
import config from "./config.js";
import fs from "fs";
import fonter from "gulp-fonter-fix";
import ttf2woff2 from "gulp-ttf2woff2";
import git from "git-rev-sync";
import exec from "gulp-exec";
import rename from 'gulp-rename';

const { src, dest, watch, series, parallel } = pkg;

const SASS = gulpSass(sass);
const PRODUCTION = yargs.argv.prod;

// BrowserSync settings
export const sync = () => {
  browserSync.init(config.localhost);
};

export const reload = (done) => {
  browserSync.reload();
  return done();
};

// Styles
export const styles = () => {
  const options = {
    continueOnError: false, // default = false, true means don't emit error event
    pipeStdout: false, // default = false, true means stdout is written to file.contents
  };

  const reportOptions = {
    err: true, // default = true, false means don't write err
    stderr: true, // default = true, false means don't write stderr
    stdout: true, // default = true, false means don't write stdout
  };

  return src(["src/scss/*.scss"])
    .pipe(
      exec(
        (file) =>
          `stylelint "src/scss/*.scss" --customSyntax postcss-scss --fix`,
        options
      ).on("error", (err) => {
        console.error("stylelint task failed:", err);
      })
    )
    .pipe(exec.reporter(reportOptions))
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(SASS().on("error", SASS.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: "ie8" })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest("assets/css"))
    .pipe(browserSync.stream());
};

// Fonts
export const otfToTtf = () => {
  // Ищем файлы шрифтов .otf
  return (
    src(`./src/fonts/*.otf`, {})
      // Конвертируем в .ttf
      .pipe(
        fonter({
          formats: ["ttf"],
        })
      )
      // Выгружаем в исходную папку
      .pipe(dest("./assets/fonts/"))
  );
};
export const ttfToWoff = () => {
  // Ищем файлы шрифтов .ttf
  return (
    src(`./src/fonts/*.ttf`, {})
      // Конвертируем в .woff
      .pipe(
        fonter({
          formats: ["woff"],
        })
      )
      // Выгружаем в папку с результатом
      .pipe(dest("./assets/fonts"))
      // Ищем файлы шрифтов .ttf
      .pipe(src("./src/fonts/*.ttf"))
      // Конвертируем в .woff2
      .pipe(ttf2woff2())
      // Выгружаем в папку с результатом
      .pipe(dest("./assets/fonts"))
      // Ищем файлы шрифтов .woff и woff2
      .pipe(src(`./src/fonts/*.{woff,woff2}`))
      // Выгружаем в папку с результатом
      .pipe(dest("./assets/fonts"))
  );
};
export const fontsStyle = () => {
  // Файл стилей подключения шрифтов
  let fontsFile = `./src/scss/fonts.scss`;
  // Проверяем существуют ли файлы шрифтов
  fs.readdir("./assets/fonts", function (err, fontsFiles) {
    if (fontsFiles) {
      // Проверяем существует ли файл стилей для подключения шрифтов
      if (!fs.existsSync(fontsFile)) {
        // Если файла нет, создаем его
        fs.writeFile(fontsFile, "", cb);
        let newFileOnly;
        for (var i = 0; i < fontsFiles.length; i++) {
          // Записываем подключения шрифтов в файл стилей
          let fontFileName = fontsFiles[i].split(".")[0];
          if (newFileOnly !== fontFileName) {
            let fontName = fontFileName.split("-")[0]
              ? fontFileName.split("-")[0]
              : fontFileName;
            let fontWeight = fontFileName.split("-")[1]
              ? fontFileName.split("-")[1]
              : fontFileName;
            if (fontWeight.toLowerCase() === "thin") {
              fontWeight = 100;
            } else if (fontWeight.toLowerCase() === "extralight") {
              fontWeight = 200;
            } else if (fontWeight.toLowerCase() === "light") {
              fontWeight = 300;
            } else if (fontWeight.toLowerCase() === "medium") {
              fontWeight = 500;
            } else if (fontWeight.toLowerCase() === "semibold") {
              fontWeight = 600;
            } else if (fontWeight.toLowerCase() === "bold") {
              fontWeight = 700;
            } else if (
              fontWeight.toLowerCase() === "extrabold" ||
              fontWeight.toLowerCase() === "heavy"
            ) {
              fontWeight = 800;
            } else if (fontWeight.toLowerCase() === "black") {
              fontWeight = 900;
            } else {
              fontWeight = 400;
            }
            fs.appendFile(
              fontsFile,
              `@font-face {\n\tfont-family: ${fontName};\n\tfont-display: swap;\n\tsrc: url("../fonts/${fontFileName}.woff2") format("woff2"), url("../fonts/${fontFileName}.woff") format("woff");\n\tfont-weight: ${fontWeight};\n\tfont-style: normal;\n}\r\n`,
              cb
            );
            newFileOnly = fontFileName;
          }
        }
      } else {
        // Если файл есть, выводим сообщение
        console.log(
          "Файл scss/fonts.scss уже существует. Для обновления файла нужно его удалить!"
        );
      }
    }
  });

  return src(`./src`);
  function cb() {}
};
const fonts = series(otfToTtf, ttfToWoff, fontsStyle);

// Images
export const images = () => {
  return src(["src/img/**/*.{jpg,jpeg,png,svg,gif}"])
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest("assets/img"));
};

// Copy files
export const copy = () => {
  // src("src/scss/lib/*").pipe(dest("assets/css"));
  // src("node_modules/owl.carousel/dist/owl.carousel.min.js").pipe(dest('assets/js'));
  // src("node_modules/owl.carousel/dist/assets/ajax-loader.gif").pipe(dest('assets/css'));

  return src([
    "src/**/*",
    "!src/{img,js,scss}",
    "!src/{img,js,scss}/**/*",
    "src/js/jquery.min.js",
    "src/js/swiper.min.js",
    "src/js/lightbox.js",
  ]).pipe(dest("assets"));
};



// Remove assets
export const clean = () => del(["assets", "production"]);

// Compile scripts
export const scripts = () => {
  return src(["src/js/app.js"])
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: [],
                },
              },
            },
          ],
        },
        mode: PRODUCTION ? "production" : "development",
        devtool: !PRODUCTION ? "inline-source-map" : false,
        output: {
          filename: "[name].js",
        },
        externals: {
          jquery: "jQuery",
        },
      })
    )
    .pipe(dest("assets/js"))
    .pipe(browserSync.stream());
};

export const blockScripts = () => {
  return src(["inc/acf/blocks/**/*.js"])
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: [],
                },
              },
            },
          ],
        },
        mode: PRODUCTION ? "production" : "development",
        devtool: !PRODUCTION ? "inline-source-map" : false,
        output: {
          filename: "[name].js",
        },
        externals: {
          jquery: "jQuery",
        },
      })
    )
  .pipe(dest("assets/js"))  // сохраняем файлы в assets с поддержкой структуры подпапок
  .pipe(browserSync.stream());
};

// Translate file
export const pot = () => {
  return src("**/*.php")
    .pipe(
      wpPot({
        domain: "_themedomain",
        package: config.theme.domain,
      })
    )
    .pipe(dest(`languages/${config.theme.domain}.pot`));
};

// Production
export const production = () => {
  const version = (Math.random() * 999) | 0;

  try {
    fs.accessSync("./.git");
    const version = git.short();
  } catch (e) {
    console.warn("GIT is not initialized");
  }

  return src([
    "**/*",
    "!node_modules{,/**}",
    "!src{,/**}",
    "!.babelrc",
    "!.gitignore",
    "!gulpfile.babel.js",
    "!package.json",
    "!package-lock.json",
    "!README.md",
    "!theme.json",
  ])
    .pipe(replace("_themename", config.theme.name))
    .pipe(replace("_themeuri", config.theme.uri))
    .pipe(replace("_themedomain", config.theme.domain))
    .pipe(replace("_themeprefix", config.theme.prefix))
    .pipe(replace("_themeauthor", config.theme.author))
    .pipe(replace("_themeauthoruri", config.theme.authoruri))
    .pipe(replace("_themeversion", version))
    .pipe(replace("_themedescription", config.theme.description))

    .pipe(dest("./production"));
};

// Listen for changes
export const watchForChanges = () => {
  watch("src/scss/**/*.scss", styles);
  watch("src/images/**/*.{jpg,jpeg,png,svg,gif}", images);
  watch(
    ["src/**/*", "!src/{images,js,scss}", "!src/{images,js,scss}/**/*"],
    copy
  );
  watch("src/js/**/*.js", scripts);
  watch("inc/acf/blocks/**/*.js", blockScripts);
  watch("**/*.php", reload);
};

export const dev = series(
  clean,
  parallel(styles, fonts, images, copy, scripts, blockScripts, sync, watchForChanges)
);
export const build = series(
  clean,
  parallel(styles, fonts, images, copy, scripts, blockScripts),
  pot,
  production
);

export default dev;
