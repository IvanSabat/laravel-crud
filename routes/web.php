<?php

use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(StepController::class)->group(function () {
    Route::get('get-books','index')->name('get-books');

    Route::get('books/create-step-one','createStepOne')->name('step.create.step.one');
    Route::post('books/create-step-one','postCreateStepOne')->name('step.create.step.one.post');

    Route::get('books/create-step-two','createStepTwo')->name('step.create.step.two');
    Route::post('books/create-step-two','postCreateStepTwo')->name('step.create.step.two.post');

    Route::get('books/create-step-three','createStepThree')->name('step.create.step.three');
    Route::post('books/create-step-three','postCreateStepThree')->name('step.create.step.three.post');
});
