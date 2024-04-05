<?php

blocksy_output_background_css([
	'selector' => '.ct-desktop-view iframe[name="editor-canvas"], .ct-desktop-view .edit-post-visual-editor__content-area > div',
	'css' => $css,
	'value' => $background_source['desktop'],
	'responsive' => false,
	'important' => true
]);

blocksy_output_background_css([
	'selector' => '.ct-tablet-view iframe[name="editor-canvas"]',
	'css' => $css,
	'value' => $background_source['tablet'],
	'responsive' => false,
	'important' => true
]);

blocksy_output_background_css([
	'selector' => '.ct-mobile-view iframe[name="editor-canvas"]',
	'css' => $css,
	'value' => $background_source['mobile'],
	'responsive' => false,
	'important' => true
]);

