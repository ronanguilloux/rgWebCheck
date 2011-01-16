#!/bin/bash
# @copyright Copyright (C) 2011 Ronan Guilloux. All rights reserved.
# @author Ronan Guilloux - coolforest.net
# @license http://www.gnu.org/licenses/agpl.html GNU AFFERO GPL v3

echo "Generating phpDoc output as HTML..."
rm -rf output/*
# see phpdoc -h
phpdoc -ric -s -d ../ -t output
echo "Viewing output : type 'firefox output/index.html &'"
