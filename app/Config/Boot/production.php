<?php

/*
 |--------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------
 | Enable error display temporarily for debugging on Render.
 | In production, set display_errors to '0' after debugging.
 */
error_reporting(E_ALL); // Show all errors
ini_set('display_errors', '1'); // Enable error display

/*
 |--------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------
 | Enabling CI_DEBUG gives you full stack traces and detailed logs.
 | Turn this OFF (false) when your app goes live.
 */
defined('CI_DEBUG') || define('CI_DEBUG', true);
