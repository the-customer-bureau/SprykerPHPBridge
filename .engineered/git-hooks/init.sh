#!/usr/bin/env bash

set -e

SOURCE="$PWD/.engineered/git-hooks/pre-commit.sh"
TARGET="$PWD/.git/hooks/pre-commit"

if [ "$1" == "make" ]; then
  SOURCE="$PWD/.engineered/git-hooks/pre-commit.make.sh"
fi

function setup_git_hooks()
{
  echo "Initialising git hooks..."
  ln -sf "$SOURCE" "$TARGET"
  chmod +x "$TARGET"
  echo "Done"
}

setup_git_hooks
