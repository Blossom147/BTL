
<script src="/BTL/js/form.js"></script>
<script src="/BTL/js/jquery.dataTables.min.js"></script>
<script>
function ConfirmDelete(){
    var x = confirm("Are you sure you want to delete?");
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