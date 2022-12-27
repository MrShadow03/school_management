<form action="{{ route('test.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="file">
    <button type="submit">Submit</button>
</form>