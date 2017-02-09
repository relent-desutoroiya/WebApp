</php
  require('anyco_ui.inc');
  
$conn=oci_connect('hr','hr','//localhost/XE');

  ui_print_header('Department')
  do_query($conn,'SELECT * FROM DEPARTMENTS');
  ui_print_footer('date('Y-m-d H:i:s'));
    
function do_query($conn,$query){
  $stid=oc1_parse($conn,$query);
  $r=oci_execute($stid, OCI_DEFAULT);
   
  print '<table border="1">';
  while ($row=oci_fetch_array(stid, OCI_ASSOC+OCI_RETURN_NULLS))
{
  print'<tr>';
  foreach ($row as $item){
    print'<td>'
      ($item? htmlentities($item): '&nbsp;').'<td>';
    }
    print'</tr>'
}
print'</table>';
}
?>
