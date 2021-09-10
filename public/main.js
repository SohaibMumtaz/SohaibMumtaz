
setTimeout(()=>{ 
    let flash = document.getElementById('my-alert');
    flash.classList.add("hidden");
}, 4000);

$(function () {
   $("#title").keyup(function (e) { 
       let slug = convertToSlug($(this).val());
       $("#slug").val(slug);
   });
});

function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}