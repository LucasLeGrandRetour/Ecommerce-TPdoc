<div id="formVirement" >
    <h2> Informations relatives au virement souhaité</h2>
        <form  action='index.php?controleur=comptesClients&action=faireVirement' method='POST'>        
            <table>
                <tr><th>Compte source : </th>         <td> <input type='text' name='compteSource' size="40"/> </td></tr>
                <tr><th>Compte destination : </th>    <td> <input type='text' name='compteDestination' size="40"/> </td></tr>
                <tr><th>Montant à transférer : </th>  <td> <input type='text' name='montant' size="40"/> </td></tr>
                <tr> <td colspan="2"> <input type='submit' value='Transférer'/></td></tr>         
            </table>
        </form>
</div>

   
