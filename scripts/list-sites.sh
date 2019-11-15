#!/usr/bin/env bash
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )"

# Start with an empty array.
DIRS=()

# For each file in /stuff/...
for FILE in $DIR/*; do
    # If the file is a directory add it to the array. ("&&" is shorthand for
    # if/then.)
    [[ -d $FILE ]] && DIRS+=("$FILE")

    # (Normally variable expansions should have double quotes to preserve
    # whitespace; thanks to bash magic we don't them inside double brackets.
    # [[ ]] has special parsing rules.)
done

# Go through the sites and print them out in a list fashion
i=1
for SITE in $DIRS; do
    siteFolder=$(basename $SITE)

    echo " $i) $siteFolder"
    i=$((i+1))
done

# Export this, so it can be used as a source
export DIRS