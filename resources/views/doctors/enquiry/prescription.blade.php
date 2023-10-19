<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>


<style type="text/css">

    .ck-editor__editable_inline
    {
        height:450px;
    }

</style>



</head>
<body>

<h1>Prescription</h1>
<form action="{{route('Enquiry/storePrescription')}}" method="post">
    @csrf
    <input type="hidden" name="enquiry_id" value="{{$id}}">
    <div>
        <label for="">title</label>
        <input type="text" name="title" placeholder="title here">
    </div>
    <div>
        <label for="description">description</label>
    <textarea name="description" id="editor" rows="100" cols="100"></textarea>
    </div>
    <div>
        <input type="submit" value="sent">
    </div>
</form>

<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ) )
		.catch( error => {
			console.error( error );
		} );
</script>


</body>
</html>