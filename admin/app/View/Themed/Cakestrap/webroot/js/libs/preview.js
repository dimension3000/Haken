
function readURL(input,id) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
    $('#blah'+id).attr('src', e.target.result);
    document.getElementById('blah'+id).style.display = 'block';
    }

reader.readAsDataURL(input.files[0]);
}
}

