<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスクを編集</title>
</head>
<body>
    <h1>タスクを編集</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">タスク名:</label>
        <input type="text" name="name" id="name" value="{{ $task->name }}" required>
        <button type="submit">更新</button>
    </form>
    <a href="{{ route('tasks.index') }}">タスクリストに戻る</a>
</body>
</html>
