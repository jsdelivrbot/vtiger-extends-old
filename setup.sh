#!/bin/bash

## Clone repository
git clone https://github.com/javanile/vtiger-extends extends
cd extends

## Run composer
composer install

## Run first time extends
php extends.php
