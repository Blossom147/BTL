
<script src="/BTL/js/form.js"></script>
<script src="/BTL/js/jquery.dataTables.min.js"></script>
<script>
function ConfirmDelete(){
    var x = confirm("Bạn chắc chắn muốn xóa ?");
  if (x)
      return true;
  else
    return false;
}
$(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

</body>
</html>