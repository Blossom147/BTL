// Thêm tài khoản
$('#formAddAcc button').on('click', function() {
    $un_add_acc = $('#un_add_acc').val();
    $pw_add_acc = $('#pw_add_acc').val();
    $repw_add_acc = $('#repw_add_acc').val();
 
    if ($un_add_acc == '' || $pw_add_acc == '' || $repw_add_acc == '')
    {
        $('#formAddAcc .alert').removeClass('hidden');
        $('#formAddAcc .alert').html('Vui lòng điền đầy đủ thông tin.');
    }
    else
    {
        $.ajax({
            url : $_DOMAIN + 'accounts.php',
            type : 'POST',
            data : {
                un_add_acc: $un_add_acc,
                pw_add_acc : $pw_add_acc,
                repw_add_acc : $repw_add_acc,
                action : 'add_acc'
            }, success : function(data) {
                $('#formAddAcc .alert').html(data);
            }, error : function() {
                $('#formAddAcc .alert').removeClass('hidden');
                $('#formAddAcc .alert').html('Đã có lỗi xảy ra, hãy thử lại.');
            }  
        });
    }
});