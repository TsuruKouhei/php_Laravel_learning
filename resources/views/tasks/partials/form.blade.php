@csrf
<label for="name">タスク名:</label>
<input type="text" name="name" id="name" value="{{ old('name', $task->name ?? '') }}" required>

<label for="deadline">期限:</label>
<input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline', $task->deadline ?? '') }}">

<label for="status">ステータス:</label>
<select name="status" id="status" class="form-control">
    <option value="未着" {{ (isset($task) && $task->status == '未着') ? 'selected' : '' }}>未着</option>
    <option value="進行中" {{ (isset($task) && $task->status == '進行中') ? 'selected' : '' }}>進行中</option>
    <option value="完了" {{ (isset($task) && $task->status == '完了') ? 'selected' : '' }}>完了</option>
</select>

<label for="category_id">カテゴリ:</label>
<select name="category_id" id="category_id" class="form-control">
    <option value="">選択してください</option>
    @foreach (\App\Models\Category::all() as $category)
        <option value="{{ $category->id }}" {{ (isset($task) && $task->category_id == $category->id) ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>
