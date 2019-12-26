@extends('layouts.app') @section('content') <div class="panel-body">
  <!-- --> @include('common.errors')
  <!-- タスク登録フォーム-->
  <form action="{{ route('tasks.store') }}" method="POST" class="form-
horizontal">
    @csrf
    <div class="form-group">
      <!-- -->
      <div class="col-sm-6">
        <label for="task" class="col-sm-3 control-label">Task</label>
        <input type="text" name="task" id="task" class="form-control"> </div>
    </div>
    <div class="col-sm-6">
      <label for="task" class="col-sm-3 control-label">Deadline</label>
      <input type="date" name="deadline" id="deadline" class="form-control"> </div>
</div>
<div class="col-sm-6">
  <label for="task" class="col-sm-3 control-label">Comment</label>
  <input type="text" name="comment" id="comment" class="form-control"> </div>
</div>
<!-- -->
<div class="form-group">
  <div class="col-sm-offset-3 col-sm-6">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</div>
</form>
<!-- -->
<!--表示領域 -->
@if (count($tasks) > 0)

{{$tasks}}
<div class="panel panel-default">
  <div class="panel-heading"> </div>
  <div class="panel-body">
    <table class="table table-striped task-table">
      <!--               テーブルヘッダー -->
      <thead>
        <th>タスク</th>
        <th>コメント</th>
        <th>締め切り</th>
      </thead>
      <!--                   テーブル本体 -->
      <tbody>
        @foreach ($tasks as $task)
        <!--  -->
        <tr>
          <td class="table-text">
            <!-- {{$task}} -->
            <div>{{ $task->task }}</div>
          </td>
          <td class="table-text">
            <div>{{ $task->comment }}</div>
          </td>
          <td class="table-text">
            <div>{{ $task->deadline }}</div>
          </td>
          <td>
            <!--                                   更新ボタン -->
            <form action="{{ route('tasks.edit',$task->id) }}" method="GET"> @csrf
              <button type="submit" class="btn btn-primary">更新</form>
          </td>
          <td>
            <!--                                   削除ボタン -->
            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
              <!-- destroy関数に$taskのidに該当のidを削除して下さい。 -->
              @method('delete')
              <!-- @method('delete')で削除アクションの指定ができる -->
              @csrf
              <!-- @csrfでセキュリティをあげる -->
              <button type="submit" class="btn btn-danger"> 削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div> @endif
<!--            ココまでがタスクリストの表示 -->
</div>
<!-- @end hogehogeがつくとhogeの処理が終わる -->
@endsection