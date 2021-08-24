
function hapus_alternatif(id){
    $.ajax({
        url :  `${base_url}alternatif/delete/${id}`,
        type : "POST",
        dataType : "JSON",
        success : function(data){
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
        }
    });
}
