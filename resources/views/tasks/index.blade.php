<body>
    <div class="container">
        <h1>タスク一覧</h1>
        <a href="{{ route('tasks.create') }}" class="button">タスクを作成</a>
        <table style="width: auto; margin-top: 20px;">
            <thead>
                <tr>
                    <th>タスク名</th>
                    <th>期限</th>
                    <th>ステータス</th>
                    <th>カテゴリ</th>
                    <th>作成日</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '未設定' }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->category ? $task->category->name : '未分類' }}</td>
                        <td>{{ $task->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="button button-small">編集</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button button-small button-danger">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
