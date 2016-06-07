<?php

	function redirectTo($route, $detail = null) {
		return redirect()->route($route, $detail);
	}

	function numberFormat($number) {
		return number_format($number, 2, ',', '.');
	}