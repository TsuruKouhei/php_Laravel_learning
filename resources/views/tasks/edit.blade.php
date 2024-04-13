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
        <label for="deadline">期限:</label>
        <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline', $task->deadline ?? '') }}">
        <label for="status">ステータス:</label>
        <select name="status" id="status" class="form-control">
            <option value="未着" {{ $task->status == '未着' ? 'selected' : '' }}>未着</option>
            <option value="進行中" {{ $task->status == '進行中' ? 'selected' : '' }}>進行中</option>
            <option value="完了" {{ $task->status == '完了' ? 'selected' : '' }}>完了</option>
        </select>
        <button type="submit">更新</button>
    </form>
    <a href="{{ route('tasks.index') }}">タスクリストに戻る</a>
</body>
</html>
