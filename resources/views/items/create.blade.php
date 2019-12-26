<form action="{{ url('create') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" class="form-control" name="image_file">
  <hr>
  <button class="btn btn-success">登録</button>
</form>