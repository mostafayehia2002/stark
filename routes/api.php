<?php

require __DIR__.'/api/v1.php';



Route::fallback(fn() =>response()->json(['success'=>false,'message' => 'APi not found.'], 404));
