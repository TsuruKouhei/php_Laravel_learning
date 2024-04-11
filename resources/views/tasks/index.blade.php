{{-- resources/views/tasks/index.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスクリスト</title>
</head>
<body>
    <h1>タスク</h1>
    <a href="{{ route('tasks.create') }}">タスクを作成</a>
    <a href="{{ route('tasks.index', ['sort' => 'created_at', 'order' => 'asc']) }}">作成日昇順</a>
    <a href="{{ route('tasks.index', ['sort' => 'created_at', 'order' => 'desc']) }}">作成日降順</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->name }}
                {{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d H:i:s') : '未設定' }}
                <a href="{{ route('tasks.edit', $task->id) }}">編集</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
