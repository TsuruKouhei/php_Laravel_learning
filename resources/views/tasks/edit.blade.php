<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスクを編集</title>
</head>
<body>
    <h1>タスクを編集</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @include('tasks.partials.form')
        <button type="submit">更新</button>
    </form>
    <a href="{{ route('tasks.index') }}">タスクリストに戻る</a>
</body>
</html>
