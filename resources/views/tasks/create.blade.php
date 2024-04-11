<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスクを作成</title>
</head>
<body>
    <h1>新しいタスクを作成</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="name">タスク名:</label>
        <input type="text" name="name" id="name" required>
        <label for="deadline">期限:</label>
        <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline', $task->deadline ?? '') }}">
        <button type="submit">タスクを作成</button>
    </form>
    <a href="{{ route('tasks.index') }}">タスクリストに戻る</a>
</body>
</html>
