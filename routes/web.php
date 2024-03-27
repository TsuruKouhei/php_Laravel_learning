<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// ルート定義の開始
Route::get('/', function () {
    return view('welcome');
});

// タスクの一覧表示
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

// タスク作成ページを表示
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

// タスクを保存
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// タスク編集ページを表示
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

// タスクを更新
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

// タスクを削除
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
