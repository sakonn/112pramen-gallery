<?php

function getPageURL() {
  return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") ."://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

function getBaseURL() {
  return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") ."://{$_SERVER['HTTP_HOST']}";
}