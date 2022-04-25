function delete_menu(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='gest_menu.php?delgetid='+id;

     }
}

