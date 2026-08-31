#!/usr/bin/env bash
#
# Compile the theme's SCSS and JS. Replaces CodeKit.
#
#   bin/build.sh            build everything once
#   bin/build.sh --watch    rebuild SCSS whenever a .scss file changes
#   bin/build.sh --check    build to a temp dir and fail if css/ or js/ is out of date
#
# CSS is compressed with no source map; JS is minified with terser. Run this after
# editing anything under sass/ or js/, and commit the built files alongside the source.
#
# Requires:  brew install sass/sass/sass
#            npm install -g terser
#
set -euo pipefail

cd "$( dirname "${BASH_SOURCE[0]}" )/.."

for tool in sass terser; do
	if ! command -v "$tool" >/dev/null 2>&1; then
		echo "error: the '$tool' command was not found." >&2
		echo "       sass:   brew install sass/sass/sass" >&2
		echo "       terser: npm install -g terser" >&2
		exit 1
	fi
done

# Bootstrap 4 is built on Sass syntax that Dart Sass now warns about on every compile.
# The warnings are about vendored code we do not maintain, so silence them here rather
# than let them bury a real error in our own SCSS.
SILENCE="import,if-function,global-builtin,color-functions,slash-div,abs-percent"

# source : output
STYLES=(
	"sass/theme.scss:css/theme.min.css"
	"sass/custom-editor-style.scss:css/custom-editor-style.min.css"
)
SCRIPTS=(
	"js/gravityform.js:js/gravityform-min.js"
)

build_style() { sass --style=compressed --no-source-map --silence-deprecation="$SILENCE" "$1" "$2"; }
build_script() { terser "$1" --compress --mangle --output "$2"; }

mode="${1:---once}"

case "$mode" in
	--watch )
		args=()
		for bundle in "${STYLES[@]}"; do
			args+=( "${bundle%%:*}:${bundle##*:}" )
		done
		echo "watching sass/ — ctrl-c to stop"
		exec sass --watch --style=compressed --no-source-map --silence-deprecation="$SILENCE" "${args[@]}"
		;;

	--check )
		tmp="$( mktemp -d )"
		trap 'rm -rf "$tmp"' EXIT
		stale=0
		for bundle in "${STYLES[@]}" "${SCRIPTS[@]}"; do
			src="${bundle%%:*}"
			out="${bundle##*:}"
			if [ "${src##*.}" = "scss" ]; then
				build_style "$src" "$tmp/$( basename "$out" )"
			else
				build_script "$src" "$tmp/$( basename "$out" )"
			fi
			if ! cmp -s "$out" "$tmp/$( basename "$out" )"; then
				echo "stale: $out does not match a fresh build of $src"
				stale=1
			fi
		done
		if [ "$stale" -eq 0 ]; then
			echo "css/ and js/ are up to date"
		fi
		exit "$stale"
		;;

	--once | "" )
		for bundle in "${STYLES[@]}"; do
			src="${bundle%%:*}"; out="${bundle##*:}"
			build_style "$src" "$out"
			echo "built $out  ($( wc -c < "$out" | tr -d ' ' ) bytes)"
		done
		for bundle in "${SCRIPTS[@]}"; do
			src="${bundle%%:*}"; out="${bundle##*:}"
			build_script "$src" "$out"
			echo "built $out  ($( wc -c < "$out" | tr -d ' ' ) bytes)"
		done
		;;

	* )
		echo "usage: bin/build.sh [--watch|--check]" >&2
		exit 1
		;;
esac
